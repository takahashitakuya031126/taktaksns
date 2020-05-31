<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'description',
        'img_url',
    ];

    /**
     *
     *
     * @var array
     */
    protected $appends = [
        'is_like',
        'like_id',
    ];

    /**
     * judge auth user liked post
     *
     * @return bool true | false
     */
    public function getIsLikeAttribute(): bool
    {
        return Like::existsByUserIdAndPostId(\Auth::user()->id, $this->id);
    }

    /**
     *
     * @return int $like id
     */
    public function getLikeIdAttribute(): int
    {
        $like = Like::findByUserIdAndPostId(\Auth::user()->id, $this->id);

        return $like->id;
    }

    // relation
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'post_id', 'id');
    }
}