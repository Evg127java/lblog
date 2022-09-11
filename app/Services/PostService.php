<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try{
            Db::beginTransaction();
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
            Db::commit();
        } catch (\Exception $e) {
            Db::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try{
            Db::beginTransaction();
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
            Db::commit();
        } catch (\Exception $e) {
            Db::rollBack();
            abort(500);
        }
        return $post;
    }
}
