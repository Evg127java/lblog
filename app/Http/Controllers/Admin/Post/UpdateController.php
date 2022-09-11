<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

/**
 * Updates a specified post with the input data
 */
class UpdateController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post = $this->service->update($data, $post);
        return redirect()->route('admin.post.show', compact('post'));
    }
}
