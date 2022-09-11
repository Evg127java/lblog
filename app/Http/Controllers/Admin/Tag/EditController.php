<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows the form for a specified tag updating
 */
class EditController extends Controller
{
    /**
     * @param Tag $tag
     * @return Application|Factory|View
     */
    public function __invoke(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }
}
