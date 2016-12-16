<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = array(
            array('user_id' => '1','name' => 'glass'),
            array('user_id' => '1','name' => 'beethoven'),
            array('user_id' => '1','name' => 'bach'),
            array('user_id' => '1','name' => 'soundtrack'),
            array('user_id' => '1','name' => 'opera'),
            array('user_id' => '1','name' => 'mozart'),
            array('user_id' => '1','name' => 'requiem'),
            array('user_id' => '1','name' => 'kasabian'),
            array('user_id' => '1','name' => 'live'),
            array('user_id' => '1','name' => 'bowie'),
            array('user_id' => '1','name' => 'piano'),
            array('user_id' => '1','name' => 'dvorak'),
            array('user_id' => '1','name' => 'oasis')
        );

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag['name'],
                'user_id' => $tag['user_id']
            ]);
        }
    }
}
