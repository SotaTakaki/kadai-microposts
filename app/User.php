<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', "profile_image", "affiliation",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // このユーザーが所有する投稿
    public function microposts()
    {
        return $this->hasMany(Micropost::class);
    }
    
    // フォロー中のユーザー
    public function followings()
    {
        return $this->belongsToMany(User::class, "user_follow", "user_id", "follow_id")->withTimestamps();
    }
    // フォロワー
    public function followers()
    {
        return $this->belongsToMany(User::class, "user_follow", "follow_id", "user_id")->withTimestamps();
    }
    
    public function follow($userId)
    {
        // すでにフォローしているか
        $exist = $this->is_following($userId);
        // 対象が自分自身かどうか
        $its_me = $this->id == $userId;
        
        if ($exist || $its_me)
            return false;
        else
        {
            $this->followings()->attach($userId);
            return true;
        }
    }
    
     public function unfollow($userId)
    {
        // すでにフォローしているか
        $exist = $this->is_following($userId);
        // 対象が自分自身かどうか
        $its_me = $this->id == $userId;
        
        if ($exist && !$its_me)
        {
            $this->followings()->detach($userId);
            return true;
        }
        else
            return false;
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where("follow_id", $userId)->exists();
    }
    
    public function feed_microposts()
    {
        $userIds = $this->followings()->pluck("users.id")->toArray();
        $userIds[] = $this->id;
        
        return Micropost::whereIn("user_id", $userIds);
    }
    
    // ユーザーに関係するモデルの件数をロードする。
    public function loadRelationshipCounts()
    {
        $this->loadCount(["microposts", "followings", "followers", "favorites"]);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Micropost::class, "favorites", "user_id", "micropost_id")->withTimestamps();
    }
    
    public function favorite($micropostId)
    {
        // favされているか
        $exist = $this->be_favorites($micropostId);
        
        if ($exist)
            return false;
        else
        {
            $this->favorites()->attach($micropostId);
            return true;
        }
    }
    
    public function unfavorite($micropostId)
    {
        // favされているか
        $exist = $this->be_favorites($micropostId);
        
        if ($exist)
        {
            $this->favorites()->detach($micropostId);
            return true;
        }
        else
            return false;
    }

    // $micropostIdの投稿がこのユーザーにfavされているか
    public function be_favorites($micropostId)
    {
        return $this->favorites()->where("micropost_id", $micropostId)->exists();
    }
    
}