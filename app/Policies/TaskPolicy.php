<?php

namespace App\Policies;
use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

  
    public function complete(User $user,Task $task)
        {
            return $user->is($task->user);
        }
}
