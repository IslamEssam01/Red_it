<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = ['content', 'user_id'];



    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function comments()
    {

        return $this->hasMany(Comment::class);
    }



}
