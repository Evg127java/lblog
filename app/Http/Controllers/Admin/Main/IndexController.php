<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Shows admin panel
 */
class IndexController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        $usersCount = User::all()->count();
        $tagsCount = Tag::all()->count();
        $categoriesCount = Category::all()->count();
        $postsCount = Post::all()->count();
        return view('admin.main.index', compact('usersCount', 'tagsCount', 'categoriesCount', 'postsCount'));
    }
}
