<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webpage extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'html',
        'user_id',
        'sort_order',

    ];
    //protected $casts = [
    //    'imgurl' => 'array',
   // ];


}
