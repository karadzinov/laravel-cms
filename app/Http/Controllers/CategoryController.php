<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Kalnoy\Nestedset\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PostCategoryRequest;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all()->where('parent_id','=',NULL);

        return view('categories.index', compact('categories'));
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

        return view('categories.create', compact('data', 'categories'));
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
        $image = $this->updateImageIfNecessary($request);
        $image ? $input['image'] = $image : null;

        ($input['parent_id'] == 0) ? $input['parent_id'] = null : null;

        $category = Category::create($input);

        return redirect('/node/category');
    
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

        return view('categories.show', compact('tree','category'));
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

        return view('categories.edit', compact('category', 'categories','id'));
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
        $image = $this->updateImageIfNecessary($request, $category);
        if($image){
            $input['image'] = $image;
        }
       
        $category->update($input);

        return redirect('/node/category');
    }

    public function deleteImageIfNecessary($category){
        if($category->image){
            @unlink(public_path()."/images/categories/originals/".$category->image);
            @unlink(public_path()."/images/categories/thumbnails/".$category->image);
            @unlink(public_path()."/images/categories/medium/".$category->image);

            return true;
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
            $path = public_path() . '/images/categories/originals/';
            $pathThumb = public_path() . '/images/categories/thumbnails/';
            $pathMedium = public_path() . '/images/categories/medium/';
            $ext = $image->getClientOriginalExtension();

            $imageName = $slugname . '.' . $ext;

            $image->move($path, $imageName);

            $findimage = public_path() . '/images/categories/originals/' . $imageName;
            $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagethumb->save($pathThumb . $imageName);
            $imagemedium->save($pathMedium . $imageName);

            return $imageName;
        }

        return null;
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

        return redirect('/node/category');
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