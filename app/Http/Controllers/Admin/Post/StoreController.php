<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try{
            $data = $request->validated();
            $data['preview'] = isset($data['preview']) ? Storage::put('/images', $data['preview']) : null;
            $data['image'] = isset($data['image']) ? Storage::put('/images', $data['image']) : null;
            if (array_key_exists('tags', $data)) {
                $tags = $data['tags'];
                unset($data['tags']);
            }
            $post = Post::create($data);
            if (isset($tags)) {
                $post->tags()->attach($tags);
            }
        } catch (\Exception $e) {
            abort(404);
        }

        return redirect()->route('admin.post.index');
    }
}
