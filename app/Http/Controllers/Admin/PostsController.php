<?php
namespace App\Http\Controllers\Admin;

use File;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\HasTags;
use App\Models\{Category, Post, Tag, User};
use App\Http\Requests\Posts\StorePostRequest;
use Intervention\Image\ImageManagerStatic as Image;
class PostsController extends Controller
{
    use HasTags;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin/posts/index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();
        $users = User::pluck('name', 'id')->toArray();
        $tags = Tag::pluck('name', 'id')->toArray();

        return view('admin/posts/create', compact('categories', 'users', 'tags'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $image = $this->updateImageIfNecessary($request);
        $input = $request->all();
        $input['language'] = App::getLocale();

        $slug = Str::slug(strip_tags($request->get('title')));

        if($this->slugExists($slug)){
            return redirect()->back()->with('error', trans('posts.name-taken'));
        }
        $input['slug'] = $slug;
        
        if($request->has('assigned_users')){
            $assignedUsers = $input['assigned_users'];
            unset($input['assigned_users']);
        }

        if($request->has('tags')){
           $tags = $input['tags'];
           unset($input['tags']);
        }

        $input['image'] = $image;
        $post = Post::create($input);

        if(isset($assignedUsers)){
            $post->users()->attach($assignedUsers);
        }

        if(isset($tags)){
            $this->updateTags($post, $tags);
        }

        return redirect()->route('admin.posts.index')
                ->with('success', trans('posts.success.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $post = Post::findOrFail($post);

        return view('admin.posts/show', compact('post'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        $post = Post::findOrFail($post);

        $categories = Category::pluck('name', 'id')->toArray();
        $users = User::pluck('name', 'id')->toArray();
        $tags = Tag::pluck('name', 'id')->toArray();
        
        $assignedUsers = $this->assignedUsers($post);
        $assignedTags = $this->assignedTags($post);

        return view('admin/posts/edit', 
                compact('post', 'categories', 'users', 'assignedUsers', 'tags', 'assignedTags')
            );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $post)
    {
        $post = Post::findOrFail($post);
        $image = $this->updateImageIfNecessary($request, $post);
        $input = $request->all();
        $input['language'] = App::getLocale();
        
        $slug = Str::slug(strip_tags($request->get('title')));

        if($this->slugExists($slug, $post->id)){
            return redirect()->back()->with('error', trans('posts.name-taken'));
        }

        $input['slug'] = $slug;
        $input['image'] = $image;

        if($request->get('assigned_users')){
            $users = $request->get('assigned_users');
            unset($input['assigned_users']);
        }

        if($request->has('tags')){
            $tags = $input['tags'];
            unset($input['tags']);
            $this->updateTags($post, $tags);
        }

        $post->update($input);

        if(isset($users)){
            $alreadyAssignedUsers = $this->assignedUsers($post);

            $post->users()->detach();
            $post->users()->attach($users);
        }else{
            $post->users()->detach();
        }

        return redirect()->route('admin.posts.index')
                ->with('success', trans('posts.success.updated'));
    }

    public function slugExists($slug, $id=null){
        
        return Post::where('slug', '=', $slug)
                    ->where('id', '!=', $id)
                    ->first();
    }
    
    /**
     * Finds assignedUsers ids.
     */
    public function assignedUsers(Post $post){
        if($post->users->isNotEmpty()){
            $assignedUsers = $post->users()->get()->pluck('id')->toArray();

            return $assignedUsers;
        }else{

            return false;
        }    
    }

    /**
     * Finds assignedTags ids.
     */
    public function assignedTags(Post $post){
        if($post->tags->isNotEmpty()){
            $assignedTags = $post->tags()->get()->pluck('id')->toArray();

            return $assignedTags;
        }else{

            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($post)
    {
        $post = Post::findOrFail($post);

        $this->deleteImages($post);
        $post->delete();

        return redirect()->route('admin.posts.index')
                ->with('success', trans('posts.success.deleted'));
    }
    /**
     * Uploads the logo if there is any, and deletes previous one.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return string or null
     */
    public function updateImageIfNecessary(Request $request, Post $post=null){
        if ($request->hasFile('image')) {
            if($post && $post->image){
               $this->deleteImages($post);
            }
            $image = $request->file('image');
            $slugname = Str::slug(strip_tags($request->title));
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
        }elseif($post && $post->image){
            return $post->image;
        }
        return null;
    }
    /**
     * Deletes images.
     *
     * @param  Settings  $settings
     * @return bool
     */
    public function deleteImages(Post $post){
        $paths = $this->makePaths();
        $image = $post->image;
        try {
            @unlink($paths->original.$image);
            @unlink($paths->thumbnail.$image);
            @unlink($paths->medium.$image);
            return true;
        } catch (Exception $e) {
            
            return false;
        }
    }
    /**
     * Make paths for storing images.
     *
     * @return object
     */
    public function makePaths(){
        
        $original = public_path() . '/images/posts/originals/';;
        $thumbnail = public_path() . '/images/posts/thumbnails/';
        $medium = public_path() . '/images/posts/medium/';
        $paths = (object) compact('original', 'thumbnail', 'medium');
        return $paths;
    }
}
