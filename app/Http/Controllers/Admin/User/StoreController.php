<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\Registration;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

/**
 * Stores a specified user in the DB
 */
class StoreController extends Controller
{
    /**
     * @param StoreRequest $request The data to store
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $password = Str::random(10);
        $data['password'] = Hash::make($password);
        $user = User::create($data);
        Mail::to($data['email'])->send(new Registration($password));
        event(new Registered($user));
        return redirect()->route('admin.user.index');
    }
}
