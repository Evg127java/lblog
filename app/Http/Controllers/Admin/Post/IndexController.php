<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows all the posts from the DB
 */
class IndexController extends BaseController
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }
}
