<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    use HasFactory;
    protected $table = 'demo';

    protected $fillable = [
        'title',
        'meta_keyword',
        'meta_description',
        'html',
        'ishome',
        'imgurl',
        'user_id',
        'sort_order',

    ];
    protected $casts = [
        'imgurl' => 'array',
    ];

    public function demotp()
    {
        return $this->belongsTo(Demotp::class,'demotp_id','id');
    }
}
