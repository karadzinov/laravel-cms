<?php

namespace App\Http\Controllers\Admin;

use File;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Taggable;
use App\Http\Controllers\Helpers\UsesSlider;
use App\Models\{Category, Currency, Product, Tag};
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\Products\{CreateProductRequest, UpdateProductRequest};

class ProductsController extends UsesSlider
{
    use Taggable;

    /**
     * Parent classs method for creating strage path.
     *
     * @return string
     */
    public function getTable(){
        
        return 'products';
    }

    public function index(){
    	
    	$products = Product::with('category')->latest()->paginate(25);
    	$currency = Currency::where('active', '=', 1)->pluck('symbol')->first();
    	return view('admin/products/index', compact('products', 'currency'));
    }
	
    public function create(){
    	
        $postsCateory = Category::with('children')->where('name', '=', 'products')->first();
        $categories = $this->getTree($postsCateory);

        $currency = Currency::where('active', '=', 1)->pluck('symbol')->first();
        $tags = Tag::pluck('name', 'id')->toArray();

    	return view('admin/products/create', compact('categories', 'currency', 'tags'));
    }

    public function getTree($node, $tree=[]){
        if($node->hasChildren()){
            
            foreach($node->children as $child){
                $tree[$child->id] = $child->name;
                
                if($child->hasChildren()){
                    $tree = $this->getTree($child, $tree);
                }
            }
        }

        return $tree;
    }
	
    public function store(CreateProductRequest $request){
    	$image = $this->updateImageIfNecessary($request);
        $name = strip_tags($request->get('name'));
        $slug = str_slug($name, '-');

    	$newProduct = new Product();
        $newProduct->language = App::getLocale();
        $newProduct->name = $name;
        $newProduct->slug = $slug;
    	$newProduct->short_description = strip_tags($request->get('short_description'));
    	$newProduct->description = $request->get('description');
    	$newProduct->main_image = $image;
    	$newProduct->video = $request->get('video');
    	$newProduct->category_id = $request->get('category_id');
    	$newProduct->price = $request->get('price');
    	$newProduct->reduction = $request->get('reduction');
    	$newProduct->reduction = $request->get('reduction');
    	$newProduct->quantity = $request->get('quantity');
    	$newProduct->active = $request->has('active');
    	$newProduct->delivery = $request->has('delivery');
    	$newProduct->user_id = auth()->user()->id;
    	$newProduct->save();

        $images = $this->updateImages($newProduct, $request, $slug);

        if($tags = $request->get('tags')){
            $this->updateTags($newProduct, $tags);
        }

        return redirect()->route('admin.products.index')->with('success', trans('products.success.created'));
    }

	public function show(Product $product){
    	$currency = Currency::where('active', '=', 1)->pluck('symbol')->first();
        
    	return view('admin/products/show', compact('product', 'currency'));
    }

	public function edit(Product $product){
    	
        $postsCateory = Category::with('children')->where('name', '=', 'products')->first();
        $categories = $this->getTree($postsCateory);
        
        $currency = Currency::where('active', '=', 1)->pluck('symbol')->first();
        $tags = Tag::pluck('name', 'id')->toArray();
        $assignedTags = $this->assignedTags($product);

    	return view('admin/products/edit', compact('product', 'categories', 'currency', 'tags', 'assignedTags'));
    }

	public function update(UpdateProductRequest $request, $product){
        $product = Product::findOrFail($product);
    	$image = $this->updateImageIfNecessary($request);
        $product->language = App::getLocale();
        $name = strip_tags($request->get('name'));
        if($name !== $product->name){
            $slug = str_slug($name, '-');
            $product->name = $name;
            $product->slug = $slug;

        }

        $product->short_description = strip_tags($request->get('short_description'));
        $product->description = $request->get('description');
        $image ? $product->main_image = $image : null;
        $product->video = $request->get('video');
        $product->category_id = $request->get('category_id');
        $product->price = $request->get('price');
        $product->reduction = $request->get('reduction');
        $product->reduction = $request->get('reduction');
        $product->quantity = $request->get('quantity');
        $product->active = $request->has('active');
        $product->delivery = $request->has('delivery');
        $product->user_id = auth()->user()->id;
        $product->save();

        $images = $this->updateImages($product, $request, $product->slug);

        if($tags = $request->get('tags')){
            $this->updateTags($product, $tags);
        }

        return redirect()->route('admin.products.index')->with('success', 'products.success.updated');
    }

	public function delete($product){
    	
        $product = Product::findOrFail($product);
        $this->deleteImages($product);
        $product->delete();

        return redirect()->route('admin.products.index')
                ->with('success', trans('products.success.deleted'));
    }

    public function deleteImages(Product $product){
        $paths = $this->makePaths();
        $image = $product->main_image;
        try {
            @unlink($paths->original.$image);
            @unlink($paths->thumbnail.$image);
            @unlink($paths->medium.$image);
            return true;
        } catch (Exception $e) {
            
            return false;
        }
    }

    public function updateImageIfNecessary(Request $request, Product $product=null){
        if ($request->hasFile('main_image')) {
            if($product && $product->main_image){
               $this->deleteImages($product);
            }
            $image = $request->file('main_image');
            $slugname = Str::slug(strip_tags($request->name));
            $imageName = $slugname . '.' . $image->getClientOriginalExtension();
            $paths = $this->makePaths();
            File::makeDirectory($paths->originals, $mode = 0755, true, true);
            File::makeDirectory($paths->thumbnails, $mode = 0755, true, true);
            File::makeDirectory($paths->medium, $mode = 0755, true, true);
            $image->move($paths->originals, $imageName);
            $findimage = $paths->originals . $imageName;
            $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagethumb->save($paths->thumbnails . $imageName);
            $imagemedium->save($paths->medium . $imageName);
            return $imageName;
        }elseif($product && $product->image){
            return $product->image;
        }
        return null;
    }
}
