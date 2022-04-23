<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Inertia\Inertia;

class TeamController extends Controller
{
    public function index(Request $request, string $name)
    {
        $name = Str::lower($name);
        $team = config('team');

        if(!Arr::exists($team, $name))
            abort(404);

        return Inertia::render('Public/TeamSingle', [
            "person" => $team[$name]
        ]);
    }
}
