<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\Category;
use Illuminate\Http\Request;
use Kalnoy\Nestedset\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PostCategoryRequest;

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
        $input = $this->updateImageIfNecessary($request);

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
        $input = $this->updateImageIfNecessary($request);
        /** @var Category $category */
        $category = Category::findOrFail($id);
        if(isset($input['image'])){
            $this->deleteImageIfNecessary($category);
         }
        $category->update($input);

        return redirect('/node/category');
    }

    public function deleteImageIfNecessary($category){
        if($category->image){
            @unlink(public_path()."/images/categories/".$category->image);

            return true;
        }        
    }

    public function updateImageIfNecessary(Request $request){
        $input = $request->all();

        $file = $request->image;
        if (!is_null($file) ){
            $name = now()->format('d-m-y-h-i-s-u') .'-'.$file->getClientOriginalName();
            $file->move('images/categories', $name);
            $input['image']=$name;
        }

        return $input;
        
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


