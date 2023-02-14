<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prod extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'meta_keyword',
        'meta_description',
        'title',
        'html',
        'html2',
        'imgurl',
        'ishome',
        'note',
        'prodtp_id',
        'user_id',
        'sort_order',

    ];
    protected $casts = [
        'imgurl' => 'array',
    ];

    public function prodtp()
    {
        return $this->belongsTo(Prodtp::class,'prodtp_id','id');
    }
    public function prodtp_title()
    {
        return $this->belongsTo(Prodtp::class,'prodtp_id','id')->get('title');

    }

}
