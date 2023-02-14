<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sysset extends Model
{
    use HasFactory;
    protected $perPage=20;
    protected $fillable = [
        'sgroup',
        'sname',
        'skey',
        'sval',
        'sort_order',

    ];
    //protected $casts = [
    //    'imgurl' => 'array',
   // ];


}
