<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Processes post data
 */
class PostService
{
    /**
     *  Processes extra specified data to store a post
     *
     * @param $data
     * @return void
     */
    public function store($data)
    {
        try {
            Db::beginTransaction();

            /* Save images in the storage and get  their url */
            $data['preview'] = isset($data['preview']) ? Storage::put('/images', $data['preview']) : null;
            $data['image'] = isset($data['image']) ? Storage::put('/images', $data['image']) : null;

            /* Check if there are tags in the input and remember it is needed */
            if (array_key_exists('tags', $data)) {
                $tags = $data['tags'];
                unset($data['tags']);
            }
            $post = Post::create($data);

            /* If tags are existed add them to the current post */
            if (isset($tags)) {
                $post->tags()->attach($tags);
            }
            Db::commit();
        } catch (\Exception $e) {
            Db::rollBack();
            abort(500);
        }
    }

    /**
     * Processes extra specified data to update a post
     *
     * @param $data
     * @param $post
     * @return mixed
     */
    public function update($data, $post)
    {
        try {
            Db::beginTransaction();

            /* Check if the input data has an image and its preview */
            if (isset($data['preview'])) {
                $data['preview'] = Storage::put('/images', $data['preview']);
            }
            if (isset($data['image'])) {
                $data['image'] = Storage::put('/images', $data['image']);
            }

            /* Check if the input data has tags and process them */
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
