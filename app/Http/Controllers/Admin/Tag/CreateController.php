<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows the form for tag creating
 */
class CreateController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        return view('admin.tag.create');
    }
}
