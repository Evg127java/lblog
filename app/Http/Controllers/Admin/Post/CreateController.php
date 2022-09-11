<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows the form for a post creating
 */
class CreateController extends BaseController
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        /* Get all the Tags and Categories for the creating form */
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }
}
