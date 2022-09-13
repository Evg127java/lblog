<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

/**
 * Deletes a specified liked post from a current user
 */
class DeleteController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function __invoke(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('personal.comment.index');
    }
}
