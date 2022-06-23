<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MicropostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $microposts = $user->feed_microposts()->orderBy("created_at", "desc")->paginate(10);
        
            $data = [
                "user" => $user,
                "microposts" => $microposts,
            ];
        }
        
        // Welcomeビューでそれらを表示
        return view("welcome", $data);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            "content" => "required|max:255",
        ]);
        
        $request->user()->microposts()->create([
            "content" => $request->content,
        ]);
        
        return back()->with('post_message', '投稿しました。');
    }
    
    public function destroy($id)
    {
        $micropost = \App\Micropost::findOrFail($id);
        
        if (\Auth::id() === $micropost->user_id){
            $micropost->delete();
        }
        
        return back()->with('delete_post_message', '投稿を削除しました。');
    }
    
    public function edit($id)
    {
        $micropost = \App\Micropost::findOrFail($id);
        
        // URL直打ち対策
        if (\Auth::id() == $micropost->user_id)
        {
            return view("microposts.edit",[
                "micropost" => $micropost, 
            ]);
        }
        else
        {
            return redirect("/");
        }
    } 
    
    public function update(Request $request, $id)
    {
        $micropost = \App\Micropost::findOrFail($id);
        $micropost->content = $request->content;
        $micropost->save();
        
        return redirect("/")->with('edit_post_message', '投稿を編集しました。');
    }
}