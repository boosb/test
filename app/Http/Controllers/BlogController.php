<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Discuss;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Requests\DiscussCreateRequest;
use App\Jobs\DiscussFormFields;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    //
  public function index()
  {
    $posts = Post::where('published_at','<=',Carbon::now())
           ->orderBy('published_at','desc')
           ->paginate(config('blog.posts_per_page'));

    return view('blog.index',compact('posts'));
  }

  public function showPost($slug)
  {
    $post = Post::whereSlug($slug)->firstOrFail();
    $discuss = Discuss::where('post_id','=',$post->id)
             ->orderBy('dis_date','desc')
             ->paginate(config('blog.posts_per_page'));
    //dd($discuss->all(),$post->all());
    return view('blog.post',compact('discuss'))->withPost($post);
  }
  public function create()
  {
    $data = $this->dispatch(new DiscussFormFields());

    return view('blog.create', $data);
  }
  public  function  store(DiscussCreateRequest $request){
    Discuss::create($request->discussFillDate());
            return redirect()
                ->back();
  }
}
