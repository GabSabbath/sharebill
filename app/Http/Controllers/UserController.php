<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Gate;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $canEditUser = Gate::allows('update', $user);
        Log::info("User ".$user->id." can update ".$user->id." :".$canEditUser);
        return Inertia::render('UserHome', [
            'user'=> $user,
            'canEditUser' => $canEditUser,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        dd('yay!', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
