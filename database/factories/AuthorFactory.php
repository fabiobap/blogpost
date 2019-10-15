<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Author;
use Faker\Generator as Faker;
use App\Profile;

$factory->define(Author::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->afterCreating(Author::class, function($author, $faker){
    $author->profile()->save(factory(Profile::class)->make());
});
