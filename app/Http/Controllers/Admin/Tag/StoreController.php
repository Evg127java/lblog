<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

/**
 * Stores a tag in DB with the input data
 */
class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::create($data);
        return redirect()->route('admin.tag.index');
    }
}
