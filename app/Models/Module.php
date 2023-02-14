<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table = 'module';

    protected $fillable = [
        'title',
        'meta_keyword',
        'meta_description',
        'html',
        'imgs',
        'ishome',
        'imgurl',
        'user_id',
        'sort_order',

    ];
    protected $casts = [
        'imgurl' => 'array',
    ];

    public function moduletp()
    {
        return $this->belongsTo(Moduletp::class,'moduletp_id','id');
    }
}
