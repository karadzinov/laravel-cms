<?php

namespace App\Http\Controllers;

use File;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\StorePostRequest;
use Intervention\Image\ImageManagerStatic as Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts/index', compact('posts'));
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

        return view('posts/create', compact('categories', 'users'));
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
        
        if($request->has('assigned_users')){
            $assignedUsers = $request->get('assigned_users');
            unset($input['assigned_users']);
        }else{
            $assignedUsers = false;
        }

        $input['image'] = $image;
        $post = Post::create($input);

        if($assignedUsers){
            $post->users()->attach($assignedUsers);
        }

        return redirect()->route('posts.index')
            ->with('success', 'Post Successfully Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts/show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id')->toArray();
        $users = User::pluck('name', 'id')->toArray();
        
        $assignedUsers = $this->assignedUsers($post);

        return view('posts/edit', compact('post', 'categories', 'users', 'assignedUsers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $image = $this->updateImageIfNecessary($request, $post);
        $input = $request->all();
        $input['image'] = $image;

        if($request->get('assigned_users')){
            $users = $request->get('assigned_users');
            unset($input['assigned_users']);
        }

        $post->update($input);

        if(isset($users)){
            $alreadyAssignedUsers = $this->assignedUsers($post);

            $post->users()->detach();
            $post->users()->attach($users);
        }else{
            $post->users()->detach();
        }

        return redirect()->route('posts.show', $post->id)->with('success', 'Post Successfully Updated.');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Post $post)
    {
        $this->deleteImages($post);
        $post->delete();

        return redirect()->route('posts.index');
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
            if($post){
               $this->deleteImages($post);
            }
            $image = $request->file('image');
            $slugname = Str::slug($request->title);
            $imageName = $slugname . '.' . $image->getClientOriginalExtension();;

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
