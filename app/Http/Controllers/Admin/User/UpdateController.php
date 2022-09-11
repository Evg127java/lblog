<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

/**
 * Stores a specified user in the DB with updated data
 */
class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request The data to update
     * @param User $user     The user to update
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('admin.user.show', compact('user'));
    }
}
