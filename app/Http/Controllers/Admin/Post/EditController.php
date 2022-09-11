<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows the form for a post creating
 */
class EditController extends BaseController
{
    /**
     * @param Post $post
     * @return Application|Factory|View
     */
    public function __invoke(Post $post)
    {
        /* Get all the tags and categories for the post creating form */
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }
}
