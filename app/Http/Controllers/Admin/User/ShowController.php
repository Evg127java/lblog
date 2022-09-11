<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Shows a specified user
 */
class ShowController extends Controller
{
    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function __invoke(User $user)
    {
        return view('admin.user.show', compact('user'));
    }
}
