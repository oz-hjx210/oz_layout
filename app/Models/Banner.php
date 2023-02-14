<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'note',
        'imgurl',
        'link',
        'user_id',
        'sort_order',

    ];
}
