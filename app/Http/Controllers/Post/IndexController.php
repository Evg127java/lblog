<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows the single specified post's page
 */
class IndexController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke(Post $post)
    {
        $createDate = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->take(3)
            ->get();
        $comments = $post->comments;
        return view('post.index', compact('post', 'createDate', 'relatedPosts', 'comments'));
    }
}
