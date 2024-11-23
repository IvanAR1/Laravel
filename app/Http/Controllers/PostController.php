<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Mail\PostCreatedMail;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    private $inputs = [
        [
            "key"=>"title",
            "label"=>"Título",
            "placeholder"=>"Coloca un título",
        ],
        [
            "key"=>"description",
            "label"=>"Descripción",
            "placeholder"=>"Coloca una descripción"
        ],
        [
            "key"=>"slug",
            "label"=>"Slug",
            "placeholder"=>"Coloca una descripción de la URL"
        ]
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Post::orderBy('id', 'desc')
            ->where('is_active', 1)
            ->paginate(10);
        $courses->makeHidden(['id', 'is_active', 'slug', 'created_at', 'updated_at']);
        $keys = collect($courses->first())->keys()->all();
        return view('courses.principal', [
            'courses' => $courses,
            'keys' => $keys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ['Frontend', 'Backend', 'Mobile'];
        
        return view('courses.create_course', [
            "categories"=>$categories,
            "inputs"=>$this->inputs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());
        #Mail::to('prueba@example.com')->send(new PostCreatedMail($post));
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('courses.get_course', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = ['Frontend', 'Backend', 'Mobile'];
        return view('courses.edit_course', array_merge(compact('post'), ["inputs"=>$this->inputs],  compact('categories')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route("courses.get_course", $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("courses.index");
    }
}
