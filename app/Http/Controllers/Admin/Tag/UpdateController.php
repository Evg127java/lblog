<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

/**
 * Stores a specified tag in the DB with the input data
 */
class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return redirect()->route('admin.tag.show', compact('tag'));
    }
}
