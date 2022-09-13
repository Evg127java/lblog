<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows a specified single liked post in the personal panel
 */
class ShowController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke(Post $post)
    {
        return view('personal.liked.show', compact('post'));
    }
}
