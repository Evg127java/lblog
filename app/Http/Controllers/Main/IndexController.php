<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows the main client page
 */
class IndexController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        return view('main.index');
    }
}
