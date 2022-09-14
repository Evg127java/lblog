<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows the main client page
 */
class IndexController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        $posts = Post::paginate(6);
        $randomPosts = Post::get()->random(4);
        $likedPosts = Post::withCount('likedUsers')->orderByDesc('liked_users_count')->take(4)->get();

        return view('main.index', compact('posts', 'randomPosts', 'likedPosts'));
    }
}
