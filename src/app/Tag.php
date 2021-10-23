<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    //ハッシュタグ表示
    public function getHashtagAttribute(): string
    {
        return '#' . $this->name;
    }
}
