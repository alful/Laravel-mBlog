<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table='posts';
    protected $fillable=[
        'title',
        'thumbnail',
        'category_id',
        'content',
        'is_headline',
        'status'
    ];

    public static $rules=[
        'title'=> 'required',
        'thumbnail'=> 'required',
        'category_id'=> 'required',
        'content'=> 'required',
        'is_headline'=> 'required',
        'status'=> 'required'
    ];
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

}
