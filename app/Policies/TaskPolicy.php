<?php

namespace App\Policies;

use App\User;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given task.
     * Laravel使用“策略”来将授权逻辑组织到单个类中，通常，每个策略都对应一个模型
     * 用Artisan命令创建一个TaskPolicy生成于此
     * php artisan make:policy TaskPolicy
     * @param  User  $user
     * @param  Task  $task
     * @return bool
     */

    /**
     * 添加destroy方法到策略中，该方法会获取一个User实例和一个Task实例。
     * 该方法简单检查用户ID和任务的user_id值是否相等。
     * 实际上，所有的策略方法都会返回true或false：
     */
    public function destroy(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
