<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newstp extends Model
{
    use HasFactory;
    protected $table = 'newstp';

    protected $fillable = [
        'title',
        'note',
        'imgurl',
        'user_id',
        'sort_order'

    ];
}
