<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use MongoDB\Driver\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Posts/Index', [
            /*'filters' => Request::all('search', 'trashed'),*/
            'posts' => Post::all()
            /*->orderByName()*/
            /*->filter(Request::only('search', 'trashed'))*/
            /*->paginate()*/
            /*                ->transform(function ($contact) {
                                return [
                                    'id' => $contact->id,
                                    'name' => $contact->name,
                                    'phone' => $contact->phone,
                                    'city' => $contact->city,
                                    'deleted_at' => $contact->deleted_at,
                                    'organization' => $contact->organization ? $contact->organization->only('name') : null,
                                ];
                            }),*/
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'content' => ['required', 'string'],
            'audio' => ['nullable', 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav', 'max:1024'],
        ]);

        /** @var Post $post */
        $post = Auth::user()->posts()->create(Arr::except($validated, 'audio'));

        if($validated['audio']){
            $post->addMedia($validated['audio'])->toMediaCollection('audio');
        }

        return Redirect::route('posts.index')->with('success', 'Post created.');

        /* Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');*/

        /*
           'organization_id' => ['nullable', Rule::exists('organizations', 'id')->where(function ($query) {
               $query->where('account_id', Auth::user()->account_id);
           })],
        */
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Inertia\Response
     */
    public function show(Post $post)
    {
        $post->load('user');

        return Inertia::render('Public/BlogPost', [
            "post" => [
                'title' => $post->title,
                'url' => route('posts.show', $post->slug),
                'content' => $post->content,
                'audio' => $post->getFirstMediaUrl('audio'),
                'created_at' => $post->created_at->format('m.d.Y'),
                'updated_at' => $post->updated_at->format('m.d.Y'),
                'author' => $post->user->only('name', 'profile_photo_url'),
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Inertia\Response
     */
    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            "post" => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'content' => ['required', 'string'],
        ]);

        $post->update($validated);

        return Redirect::route('posts.index')->with('success', 'Post updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return Redirect::route('posts.index')->with('success', 'Post gelöscht.');
    }
}
