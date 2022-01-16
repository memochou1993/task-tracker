<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /** @var User $user */
        $user = User::factory()->create([
            "name" => "root",
            "email" => "root@email.com",
        ]);

        /** @var Collection $tasks */
        $tasks = $user->tasks()->saveMany(Task::factory()->count(3)->make());

        $tasks->each(function ($task) use ($user) {
            $subtasks = Task::factory()->count(3)->make([
                'user_id' => $user->id,
                'parent_id' => $task->id,
            ]);

            $task->tasks()->saveMany($subtasks);
        });
    }
}
