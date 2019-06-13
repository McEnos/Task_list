<?php

use Illuminate\Database\Seeder;
use App\Models\Task;
use Illuminate\Database\Seeder;
class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach($users as $user)
        {
            $limit = random_int(10,20);
            for($i=0;$i< $limit;$i++)
            {
                $task = factory(Task::class)->make();
                $task->user()->associate($user);
                $task->save();
            }
        }
    }
}
