<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class NewsController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $media = $user->getMedia('news')
            ->sortByDesc('updated_at')
            ->values()
            ->all();

        return Inertia::render('News/Index', [
            'news' => $media,
        ]);

    }

    public function create()
    {
        return Inertia::render('News/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => ['required', 'image'],
            'alt' => ['string', 'nullable']
        ]);

        Auth::user()
            ->addMedia($validated['image'])
            ->withCustomProperties(['alt' => $validated['alt']])
            ->toMediaCollection('news');

        return redirect()->route('dashboard.news.index')->with('flash', [
            'bannerStyle' => 'success',
            'banner' => 'Erfolgreich hinzugefügt',
        ]);
    }

    public function destroy($id)
    {
        $media = Auth::user()
            ->getMedia('news')
            ->where('id', $id)
            ->first();

        $media->delete();

        return redirect()->route('dashboard.news.index')->with('flash', [
            'bannerStyle' => 'success',
            'banner' => 'Erfolgreich gelöscht',
        ]);
    }
}
