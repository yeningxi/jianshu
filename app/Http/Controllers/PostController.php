<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index(){

//        测试日志服务容器
        $app = app();
        $log = $app->make('log');
        //dd($log);
        //$log->info('index_log',['title'=>'abc']);//写入storage/logs/laravel.log里边
        $posts = Post::orderby('id','desc')->paginate(6);

        return view('post/index',compact('posts'));
    }

    public function show(Post $post){

        return view('post/show',compact('post'));
    }

    public function create(){

        return view('post/create');
    }

    public function store(){

        //验证
        $this->validate(\request(),[
           'title'=>'required|max:30|unique:posts,title',
           'content' => 'required'
        ]);
        $user_id = Auth::id();
        //dd(compact('user_id'));
        $parm = array_merge(request(['title','content']),compact('user_id'));
        //dd($parm);
        Post::create($parm);

        return redirect('posts');


    }

    public function edit(Post $post){

        return view('post/edit', compact('post'));
    }


    public function update(Post $post){
        //验证
        $this->validate(\request(),[
            'title'=>'required|max:30',
            'content' => 'required'
        ]);
        $this->authorize('update',$post);
        $post->title = request('title');
        $post->content = request('content');
        $post->save();
        return redirect('posts/'.$post->id);
    }

    public function delete(Post $post){

        $this->authorize('delete',$post);
        $post->delete();
        return redirect('/posts');
    }

    //图片上传
    public function imgUpLoad(Request $request){

        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        //dd($path);
        return asset('storage/'.$path);
    }


}
