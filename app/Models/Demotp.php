<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demotp extends Model
{
    use HasFactory;
    protected $table = 'demotp';

    protected $fillable = [
        'title',
        'note',
        'imgurl',
        'user_id',
        'sort_order'

    ];

}
