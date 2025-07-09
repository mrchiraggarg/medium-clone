<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // \DB::listen(function($query) {
        //     \Log::info($query->sql);
        // });

        $user = auth()->user();
        $query = Post::with(['user', 'media'])->withCount('claps')->latest();

        if ($user) {
            $query->where('user_id', $user->id);

            // $ids = $user->following()->pluck('users.id');
            // $query->whereIn('user_id', $ids);
        }

        $posts = $query->paginate(5);
        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('post.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();

        // $image = $data['image'];
        // unset($data['image']);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title']);

        // $imagePath = $image->store('posts', 'public');
        // $data['image'] = $imagePath;

        $post = Post::create($data);
        $post->addMediaFromRequest('image')->toMediaCollection();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username, Post $post)
    {
        return view('post.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id())
            abort(403);

        $categories = Category::get();
        return view('post.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostCreateRequest $request, Post $post)
    {
        if ($post->user_id !== Auth::id())
            abort(403);

        $data = $request->validated();
        $post->update($data);

        if ($data['image'] ?? false)
            $post->addMediaFromRequest('image')->toMediaCollection();

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id())
            abort(403);

        $post->delete();
        return redirect()->route('dashboard');
    }

    public function category(Category $category)
    {
        // $posts = $category->posts()->with(['user', 'media'])->withCount('claps')->latest()->simplePaginate(5);

        $user = auth()->user();
        $query = $category->posts()->with(['user', 'media'])->withCount('claps')->latest();

        if ($user) {
            $posts = $query->where('user_id', $user->id)->paginate(5);
        } else {
            $posts = $query->paginate(5);
        }

        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    public function myPosts()
    {
        $user = auth()->user();
        $posts = $user->posts()->with(['user', 'media'])->withCount('claps')->latest()->paginate(5);

        return view('post.index', [
            'posts' => $posts
        ]);
    }
}
