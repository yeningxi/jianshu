<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){

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

        $post = Post::create(\request(['title','content']));

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

        $post->title = request('title');
        $post->content = request('content');
        $post->save();
        return redirect('posts/'.$post->id);
    }

    public function delete(Post $post){

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
