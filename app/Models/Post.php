<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    public $timestamps = false;
    protected $primaryKey = 'idpost';

    protected $fillable = ['title', 'content', 'date', 'username'];
}
