<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\MediaLibrary\MediaCollections\Exceptions\MediaCannotBeDeleted;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::where('published_at', '<=', Carbon::now())->orderBy('published_at', 'DESC')->paginate(8);

        $unpublishedPosts = Post::where(function ($query) {
            $query->where('published_at', '>=', Carbon::now())
                ->orWhereNull('published_at');
        })->orderBy('published_at', 'ASC')->get();


        /** @var Post $post */
        foreach ($posts->getCollection() as $post) {

            $media = $post->getFirstMedia('audio');
            if ($media) {
                $post['audio_name'] = $media->file_name;
                $post['audio_size'] = $media->getHumanReadableSizeAttribute();
            }
        }

        /** @var Post $post */
        foreach ($unpublishedPosts as $post) {
            $media = $post->getFirstMedia('audio');
            if ($media) {
                $post['audio_name'] = $media->file_name;
                $post['audio_size'] = $media->getHumanReadableSizeAttribute();
            }
        }

        return Inertia::render('Posts/Index', [
            'unpublished' => $unpublishedPosts,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'author' => ['required', 'string'],
            'published_at' => ['nullable', 'date'],
            'audio' => ['nullable', 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'],
        ]);

        /** @var Post $post */
        $post = Post::create(Arr::except($validated, 'audio'));

        if ($validated['audio']) {
            $post->addMedia($validated['audio'])->toMediaCollection('audio');
        }

        return redirect()->route('dashboard.posts.index')->with('flash', [
            'bannerStyle' => 'success',
            'banner' => 'Predigt erstellt.',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post)
    {
        /** @var Media $media */
        $media = $post->getFirstMedia('audio');

        return Inertia::render('Posts/Edit', [
            "post" => [
                'id' => $post->id,
                'title' => $post->title,
                'author' => $post->author,
                'published_at' => $post->published_at?->format('Y-m-d\TH:i'),
                'audio' => $media,
                'created_at' => $post->created_at?->format('Y-m-d\TH:i'),
                'updated_at' => $post->updated_at?->format('Y-m-d\TH:i'),
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'author' => ['required', 'string'],
            'published_at' => ['nullable', 'date'],
        ]);

        $post->update($validated);

        return redirect()->route('dashboard.posts.index')->with('flash', [
            'bannerStyle' => 'success',
            'banner' => 'Predigt aktualisiert.',
        ]);
    }

    /**
     * Update or Deletes the resource audio in storage.
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     * @throws MediaCannotBeDeleted
     */
    public function updateAudio(Request $request, Post $post)
    {
        $validated = $request->validate([
            'audio' => ['nullable', 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'],
        ]);

        $media = $post->getFirstMedia('audio');

        if ($media)
            $media->delete();

        if ($validated['audio']) {
            $post->addMedia($validated['audio'])->toMediaCollection('audio');
            $message = "Aufnahme aktualisiert";
        } else {
            $message = 'Aufnahme gelöscht.';
        }

        return back()->with('flash', [
            'bannerStyle' => 'success',
            'banner' => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post)
    {
        $media = $post->getFirstMedia('audio');

        if ($media)
            $media->delete();

        $post->delete();

        return redirect()->route('dashboard.posts.index')->with('flash', [
            'bannerStyle' => 'success',
            'banner' => 'Predigt gelöscht',
        ]);
    }
}
