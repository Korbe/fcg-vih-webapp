<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        return Inertia::render('Public/Home');
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
            'posts' => Post::where('published_at', '<=', Carbon::now())
                ->orderBy('published_at','DESC')
                ->paginate(4)
                ->through(function ($post, $key) {
                    return [
                        'title' => $post->title,
                        'audio' => $post->getFirstMediaUrl('audio'),
                        'published_at' => $post->published_at->format('d.m.Y'),
                        'author' => $post->author,
                        'author_image' => 'https://ui-avatars.com/api/?name=' . urlencode($post->author) . '&color=0DB3E9&background=edfbff'
                    ];
                })
        ]);
    }
}
