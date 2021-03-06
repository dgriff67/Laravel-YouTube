<?php

use Illuminate\Database\Seeder;
use App\Favourite;

class FavouriteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $favourites = array(
            array('title' => 'J.S. Bach Cello Suites No.1-6 BWV 1007-1012','videoid' => 'REu2BcnlD34', 'user_id' => '1', 'imageUrl' => 'https://img.youtube.com/vi/REu2BcnlD34/1.jpg', 'kind' => 'youtube#video'),
            array('title' => 'Philip Glass,Violin Concerto No.1','videoid' => 'EJW6T6WVn08', 'user_id' => '1', 'imageUrl' => 'https://img.youtube.com/vi/EJW6T6WVn08/1.jpg', 'kind' => 'youtube#video'),
            array('title' => 'Philip Glass Akhnaten Act 1 (1/3) ','videoid' => 'EAiv-LU82t4', 'user_id' => '1', 'imageUrl' => 'https://img.youtube.com/vi/EAiv-LU82t4/1.jpg', 'kind' => 'youtube#video'),
            array('title' => 'Beethoven Symphony No 6 Karajan','videoid' => 'fNXCZXrlX7I', 'user_id' => '1', 'imageUrl' => 'https://img.youtube.com/vi/fNXCZXrlX7I/1.jpg', 'kind' => 'youtube#video'),
            array('title' => 'Beethoven Symphony No. 9','videoid' => 't3217H8JppI', 'user_id' => '1', 'imageUrl' => 'https://img.youtube.com/vi/t3217H8JppI/1.jpg', 'kind' => 'youtube#video'),
            array('title' => 'Mozart: Requiem in D minor, K626 | Gardiner','videoid' => 'q5Y2B55nKZY', 'user_id' => '1', 'imageUrl' => 'https://img.youtube.com/vi/q5Y2B55nKZY/1.jpg', 'kind' => 'youtube#video'),
            array('title' => 'Philip Glass Akhnaten Act 2 (2/3)','videoid' => 'giJnASQY7Dw', 'user_id' => '1', 'imageUrl' => 'https://img.youtube.com/vi/giJnASQY7Dw/1.jpg', 'kind' => 'youtube#video'),
            array('title' => 'Philip Glass Akhnaten Act 3 (3/3)','videoid' => 'gXPPN2P72dw', 'user_id' => '1', 'imageUrl' => 'https://img.youtube.com/vi/gXPPN2P72dw/1.jpg', 'kind' => 'youtube#video'),
            array('title' => '2001: A Space Odyssey Soundtrack','videoid' => 'vWKN98cNDxo', 'user_id' => '1', 'imageUrl' => 'https://img.youtube.com/vi/vWKN98cNDxo/1.jpg', 'kind' => 'youtube#video'),
            array('title' => 'Bach Harpsichord Concertos BWV 1052-1058 ','videoid' => 'eo-sy-Lh2vk', 'user_id' => '1', 'imageUrl' => 'https://img.youtube.com/vi/eo-sy-Lh2vk/1.jpg', 'kind' => 'youtube#video'),
            array('title' => 'Kasabian - Fire (Live At The O2)','videoid' => '_nteNxQEV4U', 'user_id' => '1', 'imageUrl' => 'https://img.youtube.com/vi/_nteNxQEV4U/1.jpg', 'kind' => 'youtube#video'),
            array('title' => 'Dvorak Piano Concerto in G minor Op.33 ','videoid' => 'E3djC4LV_WA', 'user_id' => '1', 'imageUrl' => 'https://img.youtube.com/vi/E3djC4LV_WA/1.jpg', 'kind' => 'youtube#video'),
            array('title' => 'David Bowie - Space Oddity','videoid' => 'cYMCLz5PQVw', 'user_id' => '1', 'imageUrl' => 'https://img.youtube.com/vi/cYMCLz5PQVw/1.jpg', 'kind' => 'youtube#video')
        );

        foreach ($favourites as $favourite) {
            Favourite::create([
                'title' => $favourite['title'],
                'videoid' => $favourite['videoid'],
                'user_id' => $favourite['user_id'],
                'imageUrl' => $favourite['imageUrl'],
                'kind' => $favourite['kind']
            ]);
        }

    }
}
