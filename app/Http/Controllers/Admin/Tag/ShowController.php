<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows a single specified tag
 */
class ShowController extends Controller
{
    /**
     * @param Tag $tag
     * @return Application|Factory|View
     */
    public function __invoke(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }
}
