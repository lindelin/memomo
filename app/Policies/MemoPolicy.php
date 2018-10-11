<?php

namespace App\Policies;

use App\Memo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemoPolicy
{
    use HandlesAuthorization;

    public function canAccess(User $user, Memo $memo)
    {
        return $user->id === $memo->user_id;
    }
}
