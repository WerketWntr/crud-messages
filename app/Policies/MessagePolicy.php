<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Message $message)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Message $message): bool
    {
        return $message->user()->is($user);
    }

    public function delete(User $user, Message $message): bool
    {
        return true;
    }

    public function restore(User $user, Message $message)
    {
    }

    public function forceDelete(User $user, Message $message)
    {
    }
}
