<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'description'
    ];
    
    // relation
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    // relation
    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }
}
