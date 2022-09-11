<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows a single specified post
 */
class ShowController extends BaseController
{
    /**
     * @param Post $post
     * @return Application|Factory|View
     */
    public function __invoke(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }
}
