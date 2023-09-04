<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $table = 'todos';
    protected $primaryKey = 'id';
    protected $fillable = ['title'];
    use HasFactory;


}
