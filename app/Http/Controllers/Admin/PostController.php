<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Jobs\PostFormFields;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{

    public function index(){
     /* return view('admin.post.index')
        ->withPosts(Post::all());*/
        $posts = Post::/*where('published_at','>',Carbon::now())
            ->*/orderBy('published_at','desc')
            ->paginate(config('blog.posts_per_page'));//分页配置
        return view('admin.post.index',compact('posts'));//分页
    }
    /**
     * 新建一个Post用PostFormFields
     */
    public function create()
    {
        $data = $this->dispatch(new PostFormFields());

        return view('admin.post.create', $data);
    }
    /**
     * Store a newly created Post
     *
     * @param PostCreateRequest $request
     */
    public function store(PostCreateRequest $request)
    {
       //dd($request->all());
        Post::create($request->postFillData());
        //$post->syncTags($request->get('tags', []));

        return redirect()
            ->route('admin.post.index')
            ->withSuccess('新文章创建完成.');
    }
    /**
     * 显示编辑的信息
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = $this->dispatch(new PostFormFields($id));

        return view('admin.post.edit', $data);
    }

    /**
     * 更新文章
     *
     * @param PostUpdateRequest $request
     * @param int $id
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->postFillData());
        $post->save();

        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('文章已保存.');
        }

        return redirect()
            ->route('admin.post.index')
            ->withSuccess('文章已保存.');
    }

    /**
     * 删除
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()
            ->route('admin.post.index')
            ->withSuccess('文章已删除.');
    }

}
