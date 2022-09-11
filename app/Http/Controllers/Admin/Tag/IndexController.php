<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows all the tags
 */
class IndexController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }
}
