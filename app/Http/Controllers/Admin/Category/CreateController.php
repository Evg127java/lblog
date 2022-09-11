<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows the form for category's creating
 */
class CreateController extends Controller
{
    /**
     * Returns the view of a category creating
     *
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        return view('admin.category.create');
    }
}
