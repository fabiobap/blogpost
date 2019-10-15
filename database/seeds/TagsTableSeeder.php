<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['Science', 'Sport', 'Politics', 'Entertainment', 'Jambo', 'Frulio', 'Frodin', 'Computing', 'Lucius']);

        $tags->each(function ($tagName){
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
        });
    }
}
