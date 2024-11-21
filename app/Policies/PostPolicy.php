<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class PostPolicy
{
    public function viewAny(User $user): Response
    {
        var_dump($user);
        return $user->role === 'admin'
            ? Response::allow()
            : Response::deny('You are not an admin');
    }
}
