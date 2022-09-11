<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

/**
 * Removes a specified tag from the DB
 */
class DeleteController extends Controller
{
    /**
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function __invoke(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
