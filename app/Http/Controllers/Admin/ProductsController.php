<?php

namespace App\Http\Controllers\Admin;

use File;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Category, Currency, Product};
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\Products\{CreateProductRequest, UpdateProductRequest};

class ProductsController extends Controller
{
    public function index(){
    	
    	$products = Product::with('category')->get();
    	$currency = Currency::where('active', '=', 1)->pluck('symbol')->first();
    	return view('admin/products/index', compact('products', 'currency'));
    }
	
    public function create(){
    	
        $categories = Category::pluck('name', 'id')->toArray();
        $currency = Currency::where('active', '=', 1)->pluck('symbol')->first();

    	return view('admin/products/create', compact('categories', 'currency'));
    }
	
    public function store(CreateProductRequest $request){
    	$image = $this->updateImageIfNecessary($request);

    	$newProduct = new Product();
        $newProduct->name = strip_tags($request->get('name'));
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

        return redirect()->route('admin.products.index')->with('success', trans('products.success.created'));
    }

	public function show(Product $product){
    	$currency = Currency::where('active', '=', 1)->pluck('symbol')->first();
        
    	return view('admin/products/show', compact('product', 'currency'));
    }

	public function edit(Product $product){
    	
        $categories = Category::pluck('name', 'id')->toArray();
        $currency = Currency::where('active', '=', 1)->pluck('symbol')->first();

    	return view('admin/products/edit', compact('product', 'categories', 'currency'));
    }

	public function update(UpdateProductRequest $request, Product $product){
    	$image = $this->updateImageIfNecessary($request);

        $product->name = strip_tags($request->get('name'));
        $newProduct->short_description = strip_tags($request->get('short_description'));
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

        return redirect()->route('admin.products.index')->with('success', 'products.success.updated');
    }

	public function delete(Product $product){
    	
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
            File::makeDirectory($paths->original, $mode = 0755, true, true);
            File::makeDirectory($paths->thumbnail, $mode = 0755, true, true);
            File::makeDirectory($paths->medium, $mode = 0755, true, true);
            $image->move($paths->original, $imageName);
            $findimage = $paths->original . $imageName;
            $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagethumb->save($paths->thumbnail . $imageName);
            $imagemedium->save($paths->medium . $imageName);
            return $imageName;
        }elseif($product && $product->image){
            return $product->image;
        }
        return null;
    }

    public function makePaths(){
        
        $original = public_path() . '/images/products/originals/';;
        $thumbnail = public_path() . '/images/products/thumbnails/';
        $medium = public_path() . '/images/products/medium/';
        $paths = (object) compact('original', 'thumbnail', 'medium');
        return $paths;
    }
}
