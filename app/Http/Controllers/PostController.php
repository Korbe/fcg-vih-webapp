<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'DESC')
            ->paginate(8);

        $unpublishedPosts = Post::where(function ($query) {
            $query->where('published_at', '>=', Carbon::now())
                ->orWhereNull('published_at');
        })->orderBy('published_at', 'ASC')->get();

        // Helper-Funktion, um Foto oder Avatar zu bekommen
        $getPhotoUrl = function ($post) {
            $photo = $post->getFirstMedia('photo');
            return $photo ? $photo->getUrl() : 'https://ui-avatars.com/api/?name=' . urlencode($post->author) . '&color=0DB3E9&background=edfbff';
        };

        // Mapping für veröffentlichte Posts
        foreach ($posts->getCollection() as $post) {
            $audio = $post->getFirstMedia('audio');
            if ($audio) {
                $post['audio_name'] = $audio->file_name;
                $post['audio_size'] = $audio->human_readable_size;
            }

            $post['photo'] = $getPhotoUrl($post);
        }

        // Mapping für unveröffentlichte Posts
        foreach ($unpublishedPosts as $post) {
            $audio = $post->getFirstMedia('audio');
            if ($audio) {
                $post['audio_name'] = $audio->file_name;
                $post['audio_size'] = $audio->human_readable_size;
            }

            $post['photo'] = $getPhotoUrl($post);
        }

        return Inertia::render('Posts/Index', [
            'unpublished' => $unpublishedPosts,
            'posts' => $posts
        ]);
    }


    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'author' => ['required', 'string'],
            'published_at' => ['nullable', 'date'],
            'audio' => ['nullable', 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'],
            'photo' => ['nullable', 'image', 'max:2048'], // Profilfoto validieren
        ]);

        $post = Post::create(Arr::except($validated, ['audio', 'photo']));

        if ($validated['audio'] ?? false) {
            $post->addMedia($validated['audio'])->toMediaCollection('audio');
        }

        if ($validated['photo'] ?? false) {
            $post->addMedia($validated['photo'])->toMediaCollection('photo');
        }

        return redirect()->route('dashboard.posts.index')->with('flash', [
            'bannerStyle' => 'success',
            'banner' => 'Predigt erstellt.',
        ]);
    }

    public function edit(Post $post)
    {
        $audio = $post->getFirstMedia('audio');
        $photo = $post->getFirstMedia('photo');

        return Inertia::render('Posts/Edit', [
            'post' => [
                'id' => $post->id,
                'title' => $post->title,
                'author' => $post->author,
                'published_at' => $post->published_at?->format('Y-m-d\TH:i'),
                'audio' => $audio,
                'photo_url' => $photo?->getUrl(),
                'created_at' => $post->created_at?->format('Y-m-d\TH:i'),
                'updated_at' => $post->updated_at?->format('Y-m-d\TH:i'),
            ]
        ]);
    }

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

    public function updateAudio(Request $request, Post $post)
    {
        $validated = $request->validate([
            'audio' => ['nullable', 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'],
        ]);

        $media = $post->getFirstMedia('audio');
        if ($media) $media->delete();

        if ($validated['audio'] ?? false) {
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

    public function updatePhoto(Request $request, Post $post)
    {
        $validated = $request->validate([
            'photo' => ['nullable', 'image', 'max:2048'],
        ]);

        $media = $post->getFirstMedia('photo');
        if ($media) $media->delete();

        if ($validated['photo'] ?? false) {
            $post->addMedia($validated['photo'])->toMediaCollection('photo');
            $message = "Profilfoto aktualisiert";
        } else {
            $message = 'Profilfoto gelöscht.';
        }

        return back()->with('flash', [
            'bannerStyle' => 'success',
            'banner' => $message,
        ]);
    }

    public function destroy(Post $post)
    {
        $audio = $post->getFirstMedia('audio');
        if ($audio) $audio->delete();

        $photo = $post->getFirstMedia('photo');
        if ($photo) $photo->delete();

        $post->delete();

        return redirect()->route('dashboard.posts.index')->with('flash', [
            'bannerStyle' => 'success',
            'banner' => 'Predigt gelöscht',
        ]);
    }
}
