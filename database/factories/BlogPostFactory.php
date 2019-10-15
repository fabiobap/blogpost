<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\BlogPost;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'content' => $faker->paragraphs(3,true),
        'created_at' => $faker->dateTimeBetween(('-3 months'))

    ];
});

$factory->state(BlogPost::class, 'new-title', function(Faker $faker){
    return [
        'title' => 'New title',
        // 'content' => 'Content of the blog post'
    ];
});
