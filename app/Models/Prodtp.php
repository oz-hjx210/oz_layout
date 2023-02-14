<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodtp extends Model
{
    use HasFactory;
    protected $table = 'prodtp';
    protected $orderBy = 'sort_order';
    protected $orderDirection = 'DESC';
    protected $fillable = [
        'title',
        'pid',
        'path',
        'level',
        'note',
        'imgurl',
        'user_id',
        'sort_order'
    ];


    public function parent()
    {
        return $this->belongsTo(Prodtp::class, 'pid');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'pid','id')
            ->with('children')->orderBy('sort_order');
    }

    public function parent_name()
    {
        return $this->belongsTo(Prodtp::class,'pid','id')->get('title');
    }
}
