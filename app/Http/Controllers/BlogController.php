<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Support\Facades\Redis;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{


public function index($id) {

//  redis method referral link https://www.thegeekstuff.com/2014/02/phpredis/

$cachedBlog = Redis::get('blog_' . $id);


if(isset($cachedBlog)) {
    $blog = json_decode($cachedBlog, FALSE);

    return response()->json([
        'status_code' => 201,
        'message' => 'Fetched from redis',
        'data' => $blog,
    ]);
}else {
    $blog = Blog::find($id);
    Redis::set('blog_' . $id, $blog);

    return response()->json([
        'status_code' => 201,
        'message' => 'Fetched from database',
        'data' => $blog,
    ]);
}


//  $cachedBlog = Redis::get('blog_');

//   if(isset($cachedBlog)) {
//       $blog = json_decode($cachedBlog, FALSE);

//       return response()->json([
//           'status_code' => 201,
//           'message' => 'Fetched from redis',
//           'data' => $blog,
//       ]);
//   }else {
//     $getBlog = Blog::get();
//     Redis::set('blog_', $getBlog);

//       return response()->json([
//           'status_code' => 201,
//           'message' => 'Fetched from database',
//           'data' => $getBlog,
//       ]);
//   }
}


public function update(Request $request, $id) {

    $update = Blog::findOrFail($id)->update($request->all());
  
    if ($update) {
  
        // Delete blog_$id from Redis
        Redis::del('blog_' . $id);
  
        $blog = Blog::find($id);
        // Set a new key with the blog id
        Redis::set('blog_' . $id, $blog);
  
        return response()->json([
            'status_code' => 201,
            'message' => 'User updated',
            'data' => $blog,
        ]);
    }
  
  }

  public function delete($id) {

    Blog::findOrFail($id)->delete();
    Redis::del('blog_' . $id);
  
    return response()->json([
        'status_code' => 201,
        'message' => 'Blog deleted'
    ]);
  }


      /**
     * Write code on Method
     *
     * @return response()
     */
    public function post()
    {
        $posts = Post::latest()->take(5)->get();

        return view('posts', compact('posts'));
    }
}
