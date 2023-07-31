<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasUuids;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];




    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    // returns true if the user liked or disliked the post based on the $like var (true means like , false means dislike)
    public function didLike($post_id, $like)
    {
        return Like::where('like', $like)->where('post_id', $post_id)->where('user_id', Auth::id())->exists();
    }

    // returns true if the user disliked the post
    public function likedPosts()
    {


        return $this->hasManyThrough(Post::class, Like::class, 'user_id', 'id', 'id', 'post_id')
            ->where('like', true)
            ->orderBy('likes.updated_at', 'desc');

    }


}