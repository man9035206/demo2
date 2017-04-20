<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable=['title','content','publish-on','avatar'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
