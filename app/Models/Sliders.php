<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    use HasFactory;
    protected $table='sliders';
    protected $fillable=[
        'title',
        'category_id',
        'image',
        'url',
        'order',
        'status'

    ];

    public static $rules=[
        'title'=> 'required',
        'image'=> 'required',
        'category_id'=>'required',

        'url'=> 'required',
        'order'=> 'required',
        'status'=> 'required'
    ];
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
