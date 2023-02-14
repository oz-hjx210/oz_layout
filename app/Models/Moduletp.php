<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moduletp extends Model
{
    use HasFactory;
    protected $table = 'moduletp';

    protected $fillable = [
        'title',
        'note',
        'imgurl',
        'user_id',
        'sort_order'

    ];
}
