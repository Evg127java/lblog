<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

/**
 * Removes a specified post from the DB
 */
class DeleteController extends BaseController
{
    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function __invoke(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
