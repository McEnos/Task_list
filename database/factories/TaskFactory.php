<?php 

use Faker\Generator as Faker;
use App\Models\Task;
$factory->define(Task::class,function(Faker $faker){
    return [
        'title' => $faker->sentence,
        'is_complete' => $faker->boolean,
    ];
});

