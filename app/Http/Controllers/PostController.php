<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function index (){
            $posts =  Post::all()->whereNull('deleted_at');
            return view ('post.index',['posts'=>$posts]);
    }

    public function create (){
        return view ('post.create');
    }

    public function createPost (StorePostRequest  $request){
        $validate = $request->validated();
        try {
            $post = new Post();
            $post -> title = $request -> title;
            $post -> body = $request -> body;
            $post-> save();
        } catch (\Exception $e){
            return redirect()->route('create');
        }
        return redirect()->route('list');
    }

    public function edit ($id){
        $post = Post::find($id);
        if (empty($post)){
            abort(404);
        } else {
            return view ('post.edit',['post' => $post]);
        }

    }

    public function editPost (UpdatePostRequest $request, $id){
        $validatedData = $request->validate();
        try{
            $post = Post::find($id);
            $post -> title = $request -> title;
            $post -> body = $request -> body;
            $post -> save();
        } catch (\Exception $e){
            return redirect()->route('edit',$id);
        }
        return redirect()->route('list');
    }

    public function deletePost ( $id){

            $post = Post::find($id);
            if (empty($post)){
                try{
                $post -> delete();
                } catch (\Exception $e){
                    abort(404);
                }
            } else{
                abort(404);
            }


        return redirect()->route('list');
    }
}
