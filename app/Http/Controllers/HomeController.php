<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $post = Post::with('user')->first();

        return Inertia::render('Public/Home', [
            'post' => $post ? [
                        'title' => $post->title,
                        'url' => route('public.posts.show', $post->slug),
                        'content' => Str::substr(strip_tags($post->content), 0, 200) . '...',
                        'audio' => $post->getFirstMediaUrl('audio'),
                        'created_at' => $post->created_at->format('d.m.Y'),
                        'updated_at' => $post->updated_at->format('d.m.Y'),
                        'author' => $post->user->only('name', 'profile_photo_url'),
                    ] : null
        ]);
    }

    public function about(Request $request)
    {
        return Inertia::render('Public/About');
    }

    public function events(Request $request)
    {
        return Inertia::render('Public/Events');
    }

    public function donate(Request $request)
    {
        return Inertia::render('Public/Donate');
    }

    public function contact(Request $request)
    {
        return Inertia::render('Public/Contact');
    }

    public function impressum(Request $request)
    {
        return Inertia::render('Public/Imprint');
    }

    public function datenschutz(Request $request)
    {
        return Inertia::render('Public/PrivacyPolicy');
    }

    public function blog(Request $request)
    {
        return Inertia::render('Public/Blog', [
            'posts' => Post::with('user')
                ->paginate(10)->getCollection()
                ->transform(function ($post) {
                    return [
                        'title' => $post->title,
                        'url' => route('public.posts.show', $post->slug),
                        'content' => Str::substr(strip_tags($post->content), 0, 200) . '...',
                        'audio' => $post->getFirstMediaUrl('audio'),
                        'created_at' => $post->created_at->format('d.m.Y'),
                        'updated_at' => $post->updated_at->format('d.m.Y'),
                        'author' => $post->user->only('name', 'profile_photo_url'),
                    ];
                }),
        ]);
    }
}
