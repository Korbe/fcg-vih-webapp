<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PublicController extends Controller
{
    public function home(Request $request)
    {
        return Inertia::render('Public/Home');
    }

    public function blog(Request $request)
    {
        return Inertia::render('Public/Blog', [
            'posts' => Post::with('user')
                ->paginate(10)->getCollection()
                ->transform(function ($post) {
                    return [
                        'title' => $post->title,
                        'url' => route('posts.show', $post->slug),
                        'content' => Str::substr(strip_tags($post->content), 0, 200) . '...',
                        'created_at' => $post->created_at->format('m.d.Y'),
                        'updated_at' => $post->updated_at->format('m.d.Y'),
                        'author' => $post->user->only('name', 'profile_photo_url'),
                    ];
                }),
        ]);
    }
}
