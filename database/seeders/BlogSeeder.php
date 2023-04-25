<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
          'title' => 'First blog',
          'sub_header' => 'This is the first sub header',
          'content' => 'BLOG_CONTENT'
      ]);
        Post::truncate();

        $posts =  [
            [
                'id' => 1,
                'title'=>'First blog 1',
                'body' => 'This is the first sub header',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
              'id' => 2,
              'title'=>'First blog 2',
              'body' => 'This is the second sub header',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
            'id' => 3,
            'title'=>'First blog 3',
            'body' => 'This is the three sub header',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
              'id' => 4,
              'title'=>'First blog 4',
              'body' => 'This is the first sub header',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              'id' => 5,
              'title'=>'First blog 5',
              'body' => 'This is the first sub header',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
          ];
          foreach ($posts as $post) {
            Post::create($post);
          }
    }
}
