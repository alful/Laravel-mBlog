<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    public $timestamps = ["created_at"]; //only want to used created_at column
    const UPDATED_AT = null; //and updated by default null set
    
    protected $table='messages';
    protected $fillable=[
        'name',
        'email',
        'subject',
        'message',

    ];

    public static $rules=[
        'name'=> 'required',
        'email'=> 'required',
        'subject'=> 'required',
        'message'=> 'required'

    ];}
