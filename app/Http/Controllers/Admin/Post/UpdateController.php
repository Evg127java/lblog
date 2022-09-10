<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        try{
            $data = $request->validated();
            if (isset($data['preview'])) {
                $data['preview'] = Storage::put('/images', $data['preview']);
            }
            if (isset($data['image'])) {
                $data['image'] = Storage::put('/images', $data['image']);
            }
            $tags = array_key_exists('tags', $data) ? $data['tags'] : [];
            unset($data['tags']);
            $post->update($data);
            $post->tags()->sync($tags);
        } catch (\Exception $e) {
            abort(404);
        }

        return redirect()->route('admin.post.show', compact('post'));
    }
}
