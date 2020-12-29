<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'text'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
