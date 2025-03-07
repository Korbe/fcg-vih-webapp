<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class NewsController extends Controller
{
    public function index(): Response
    {
        $news = News::with(['media'])->latest()->get();
        return Inertia::render('News/Index', ['news' => $news]);
    }

    public function create()
    {
        return Inertia::render('News/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:75',
            'description' => 'required|string|max:255',
            'title_image' => 'required|image',
            'support_image' => 'required|image',
        ]);

        $news = News::create($request->only(['title', 'description']));

        if ($request->hasFile('title_image')) {
            $news->addMedia($request->file('title_image'))->toMediaCollection('title_image');
        }

        if ($request->hasFile('support_image')) {
            $news->addMedia($request->file('support_image'))->toMediaCollection('support_image');
        }

        return redirect()->route('dashboard.news.index');
    }

    public function destroy(News $news)
    {
        $news->clearMediaCollection('title_image');
        $news->clearMediaCollection('support_image');

        $news->delete();
        return redirect()->route('dashboard.news.index');
    }
}
