<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return Inertia::render('UserHome');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
