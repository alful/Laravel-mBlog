<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table='post_comments';
    public $timestamps = ["created_at"]; //only want to used created_at column
    const UPDATED_AT = null; //and updated by default null set

    protected $fillable=[
        'post_id',
        'name',
        'comment',


    ];

    public static $rules=[
        'post_id'=> 'required',
        'name'=> 'required',
        'comment'=> 'required'
    ];
}
