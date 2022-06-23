<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->name;
        $users = User::orderBy("id", "desc")->paginate(10);
        $authUser = \Auth::user(); //リコメンド用
        $flag = 0;// リコメンド振り分け用
    
        if ($search != null)
        {
            $sort = User::where("name", "LIKE", "%$search%")->get();
            $users = $sort->paginate(10);
            
        }
        return view("users.index", ["users" => $users, "authUser" => $authUser, "flag" => $flag]);
    }
    
     public function show($id)
    {
        $user = User::findOrfail($id);
        
        $user->LoadRelationshipCounts();
        
        $microposts = $user->microposts()->orderBy("created_at", "desc")->paginate(10);
        
        return view("users.show",[
            "user" => $user,
            "microposts" => $microposts,
        ]);
    }
    
    public function followings($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $followings = $user->followings()->paginate(10);
        
        return view("users.followings",[
            "user" => $user,
            "users" => $followings,
        ]);
    }
    
    public function followers($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $followers = $user->followers()->paginate(10);
        
        return view("users.followers",[
            "user" => $user,
            "users" => $followers,
        ]);
    }
    
    public function favorites($id)
    {
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        $favorites = $user->favorites()->paginate(10);
        
        return view ("users.favorites", [
            "user" => $user,
            "microposts" => $favorites,
        ]);
    }

    // プロフィール情報編集
    public function edit()
    {
        $user = \Auth::user();
        return view("users.profile_edit", ["user" => $user]);
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique("users")->ignore(\Auth::id())],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique("users")->ignore(\Auth::id())],
            'affiliation' => ['max:255'],
            // 画像ファイル(jpeg,png)のみにバーリデーションを設定。
            // mimesで拡張子指定
            'profile_image' => ['image', 'mimes:jpeg,png'], 
        ]);
            
        $user = \Auth::user();
        
        if ($user->name != $request->name)
        {
            $user->name = $request->name;
            $user->save();
        }
        
        if ($user->email != $request->email)
        {
            $user->email = $request->email;
            $user->save();
        }
        
        if ($user->affiliation != $request->affiliation)
        {
            $user->affiliation = $request->affiliation;
            $user->save();
        }
        
        if ($request->file("profile_image") == null)
        {
            return redirect("/")->with('update_profile_message', 'プロフィール情報を更新しました。');
        }
       
        $file = $request->file('profile_image');
     //   $fileName = $file->getClientOriginalName();
        $fileHashName = $file->hashName();
          
        $path = $file->storeAs('public/profiles', $fileHashName);
        //$path = $file->store('public/profiles');
    /*    dump($file);
        dump($fileName);
        dump($fileHashName);
        dd($path);
    */
        $user->profile_image = $fileHashName;
        $user->save();
        
        return redirect("/")->with('update_profile_message', 'プロフィール情報を更新しました。');
    }
    
}