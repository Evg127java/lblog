<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows personal panel
 */
class IndexController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        $likesCount = auth()->user()->likedPosts->count();
        $commentsCount = Tag::all()->count();
        return view('personal.main.index', compact('likesCount', 'commentsCount'));
    }
}
