<?php

namespace App\Http\Controllers\Admin;

use App\Discuss;
use App\Answer;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DiscussController extends Controller
{
    public  function  index(){
        $posts = Post::with('discuss')
            ->orderBy('published_at','desc')
            ->paginate(config('blog.posts_per_page'));//分页配置
//        $discuss =Post::find(2)->discuss()->get();
//        $dis_count = Post::all()->discuss();
//        $posts->with('discusss');

        //dd($posts);
        return view('admin.discuss.index',compact('posts'));//分页

        //return view('admin.discuss.index',compact('posts'));
    }
    public function showDiscuss($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $discuss = Discuss::with('answer')
            ->where('post_id','=',$post->id)
            ->orderBy('dis_date','desc')
            ->paginate(config('blog.posts_per_page'));

        //dd($answer);
        return view('admin.discuss.discuss',compact('discuss'))->withPost($post);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * 删除
     */
    public function destroy($id){
        //dd($id);
        $discuss = Discuss::findOrFail($id);
        $discuss-> delete();

        return redirect()
               ->back();
    }

}
