<?php

namespace App\Http\Controllers\Admin;

use Auth;
use File;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\{Category, Page};
use Kalnoy\Nestedset\Collection;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PostCategoryRequest;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all()->where('parent_id','=',NULL);

        return view('admin.categories.index', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $input)
    {
        $data = $input->only('parent_id');
        $categories = $this->getCategoryOptions();

        return view('admin.categories.create', compact('data', 'categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param PostCategoryRequest $input
     *
     * @return Response
     */
    public function store(PostCategoryRequest $request)
    {
        $input = $request->all();
        $slug = Str::slug(strip_tags($request->get('name')));

        if($this->slugExists($slug)){
            return redirect()->back()->with('error', trans('admin.same-name'));
        }
        
        $input['slug'] = $slug;
        $input['language'] = App::getLocale();
        $image = $this->updateImageIfNecessary($request);
        $image ? $input['image'] = $image : null;

        ($input['parent_id'] == 0) ? $input['parent_id'] = null : null;

        $category = Category::create($input);

        return redirect()->route('admin.category.index')
                ->with('success', trans('categories.success.created'));
    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $tree = $category->children;

        return view('admin.categories.show', compact('tree','category'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        /** @var Category $category */
        $category = Category::findOrFail($id);
        $categories = $this->getCategoryOptions($category);

        return view('admin.categories.edit', compact('category', 'categories','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
 
    public function update(PostCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $input = $request->all();
        $slug = Str::slug(strip_tags($request->get('name')));

        if($this->slugExists($slug, $category->id)){
            return redirect()->back()->with('error', trans('admin.same-name'));
        }

        $input['slug'] = $slug;
        $image = $this->updateImageIfNecessary($request, $category);
        
        if($image){
            $input['image'] = $image;
        }
       
        $category->update($input);

        return redirect()->route('admin.category.index')
                ->with('success', trans('categories.success.updated'));
    }

    public function slugExists($slug, $id=null){
        
        $category = Category::where('slug', '=', $slug)
                    ->where('id', '!=', $id)
                    ->first();
        $page = Page::where('slug', '=', $slug)
                    ->where('id', '!=', $id)
                    ->first();

        if($category || $page){
            return true;
        }

        return false;
    }

    public function deleteImageIfNecessary($category){
        try {
               if($category->image){
                   $paths = $this->makePaths();
                   $image = $category->image;
                   @unlink($paths->original . $image);
                   @unlink($paths->thumbnail . $image);
                   @unlink($paths->medium . $image);

                   return true;
               }     
           } catch (Exception $e) {
               
               return false;
           }   
    }

    /**
     * Update image if uploaded.
     *
     * @param  Request  $request
     * @return bool
     */

    public function updateImageIfNecessary(Request $request, Category $category=null){
        
        $slugname = Str::slug($request->name);
        if ($request->hasFile('image')) {
            if($category){
                $this->deleteImageIfNecessary($category);
            }

            $image = $request->file('image');
            $paths = $this->makePaths();
            
            $ext = $image->getClientOriginalExtension();
            $imageName = $slugname . '.' . $ext;

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
            
        }elseif($category && $category->image){

            return $category->image;
        }

        return null;
    }


    /**
     * Make paths for storing images.
     *
     * @return object
     */

    public function makePaths(){
        
        $original = public_path() . '/images/categories/originals/';
        $thumbnail = public_path() . '/images/categories/thumbnails/';
        $medium = public_path() . '/images/categories/medium/';

        $paths = (object) compact('original', 'thumbnail', 'medium');

        return $paths;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Category::findOrFail($id);
        $tree = $category->children;

        foreach ($tree as  $child){
            if($child->children->isNotEmpty()){
                $this->destroy($child->id);
            }
            $this->deleteImageIfNecessary($child);
            $child->delete();
        }

        $this->deleteImageIfNecessary($category);
        $category->delete();

        return redirect()->route('admin.category.index')
                ->with('success', trans('categories.success.deleted'));
    }
    
    protected function makeOptions(Collection $items)
    {
        $options = [ '0' => 'Root' ];
        foreach ($items as $item)
        {
            $options[$item->getKey()] = str_repeat('- ', $item->depth + 1).' '.$item->name;
        }
        
        return $options;
    }
    /**
     * @param Category $except
     *
     * @return CategoriesController
     */
    protected function getCategoryOptions($except = null)
    {
        /** @var \Kalnoy\Nestedset\QueryBuilder $query */
        $query = Category::select('id', 'name')->withDepth()->defaultOrder();
        if ($except)
        {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }
       
        return $this->makeOptions($query->get());
    }
}