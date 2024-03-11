<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard.posts.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:5',
            'slug' => 'required|min:5',
            'category_id' => 'required|integer',
            'image' => 'required|image|file|max:1024',
            'body' => 'required|min:20'
        ];

        $messages =  [
            'category_id.integer' => 'Please select a category.',
            'image.required' => 'Please select an image.',
            'image.image' => 'Please select a valid image.',
            'image.file' => 'Please select a valid image.',
            'image.max' => 'Maximum image size is 1MB.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $validated_data = $request->all();

        $validated_data['user_id'] = auth()->user()->id;
        $validated_data['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else {
            if ($request->file('image')) {
                $validated_data['image'] = $request->file('image')->store('/', 'public_post_images');
            }
            Post::create($validated_data);
            return response()->json([
                'status' => 200,
                'message' => 'New post has been added!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('pages.dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return response()->json([
            'status' => 200,
            'data' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|min:5',
            'category_id' => 'required|integer',
            'body' => 'required|min:20'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        if ($request->file('image')) {
            if ($request->old_image != $request->image) {
                $rules['image'] = 'image|file|max:1024';
            }
        }

        $messages = [
            'category_id.integer' => 'Please select a category.',
            'image.image' => 'Please select a valid image.',
            'image.file' => 'Please select a valid image.',
            'image.max' => 'Maximum image size is 1MB.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $validated_data =
            [
                'title' => $request->title,
                'slug' => $request->slug,
                'category_id' => $request->category_id,
                'body' => $request->body
            ];

        if ($request->old_image == $request->image) {
            $validated_data['image'] = $request->old_image;
        }

        $validated_data['excerpt'] = Str::limit(strip_tags($request->body), 200);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag()
            ]);
        } else {
            if ($request->file('image')) {
                if ($request->old_image) {
                    Storage::disk('public_post_images')->delete($request->old_image);
                }
                $validated_data['image'] = $request->file('image')->store('/', 'public_post_images');
            }
            Post::where('id', $post->id)->update($validated_data);
            return response()->json([
                'status' => 200,
                'message' => 'Post has been updated!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public_post_images')->delete($post->image);
        }

        Post::destroy($post->id);

        return response()->json([
            'status' => 200,
            'message' => 'Post has been deleted!'
        ]);
    }

    public function getPosts()
    {
        $posts = Post::all()->map(
            function ($post, $index) {
                return ([
                    'no' => $index + 1,
                    'slug' => $post->slug,
                    'title' => $post->title,
                    'category' => $post->category->name
                ]);
            }
        );
        return response()->json(['data' => $posts]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
