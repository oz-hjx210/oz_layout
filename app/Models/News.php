<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

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

    public function newstp()
    {
        return $this->belongsTo(Newstp::class,'newstp_id','id');
    }
}
