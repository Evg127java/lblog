<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Services\PostService;

/**
 * The base controller for all the Post controllers.
 */
class BaseController extends Controller
{

    /**
     * @var PostService Posts processing service
     */
    public PostService $service;

    /**
     * @param PostService $service
     */
    public function __construct(PostService $service)
    {
        $this->service = $service;
    }
}
