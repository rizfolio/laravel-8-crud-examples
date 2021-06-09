<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //$posts = Post::all();


        $posts = Post::paginate(1);
       

        return view('admin.post.index')->with('posts',$posts);
        
        // or 
        // return view('admin.posts.index' , compact('posts'));

       // return view('admin.posts.index' , compact('posts'))->with('posts',$posts);;



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
        $categories = Category::pluck('title','id');
        return view('admin.post.create')
                    ->with('users',$users)
                    ->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //

       // dd($request->all());

        $post = Post::create($request->all());

        $category_ids = $request->input('category_id');

        $post->categories()->attach($category_ids);

        return redirect(route('post.index'))->with('success','Post created successfully');
      

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        ///dd($post);
        $users = User::pluck('name','id');
        $categories = Category::pluck('title','id');
        $selectedCategories = $post->categories->pluck('id');

        //dd($selectedCategories);

        return view('admin.post.edit')
                    ->with('post',$post)
                    ->with('users', $users)
                    ->with('selectedCategories',$selectedCategories)
                    ->with('categories',$categories);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        //

        // $input = [
        //     'title' => $request->title,
        //     'excerpt' => $request->excerpt,
        //     'content' => $request->content
        // ];

        // $post->update($input);

        $post->update($request->all());

        $category_ids = $request->input('category_id');
        
        $post->categories()->sync($category_ids);

        return redirect(route('post.index'))->with('success','Post updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //

        $post->delete();

        return redirect(route('post.index'))->with('success','Post deleted successfully.');

    }
}
