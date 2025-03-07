<?php

namespace App\Http\Controllers;

use App\Models\News;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(): Response
    {
        $news = News::with(['media'])->latest()->get();
        return Inertia::render('News/Index', ['news' => $news]);
    }

    public function create()
    {
        return Inertia::render('News/EditCreate');
    }

    public function edit(News $news)
    {
        // Lade die News mit den zugehörigen Medien
        $news->load('media');

        return Inertia::render('News/EditCreate', [
            'news' => $news
        ]);
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

        return redirect()->route('dashboard.news.index')->with('success', 'News wurde erfolgreich angelegt!');
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:75',
            'description' => 'required|string|max:255',
            'title_image' => 'nullable|image',
            'support_image' => 'nullable|image',
        ]);

        $news->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('title_image')) {
            $news->clearMediaCollection('title_image');
            $news->addMedia($request->file('title_image'))->toMediaCollection('title_image');
        }

        if ($request->hasFile('support_image')) {
            $news->clearMediaCollection('support_image');
            $news->addMedia($request->file('support_image'))->toMediaCollection('support_image');
        }

        return redirect()->route('dashboard.news.index')->with('flash', [ 'message' => 'Die Nachricht wurde erfolgreich gespeichert!' ]);
    }

    public function destroy(News $news)
    {
        $news->clearMediaCollection('title_image');
        $news->clearMediaCollection('support_image');

        $news->delete();
        return redirect()->route('dashboard.news.index')->with('success', 'News wurde erfolgreich gelöscht!');;
    }
}
