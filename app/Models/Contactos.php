<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contactos extends Model
{
    use SoftDeletes;
    protected $table = 'contactos';
    protected $primaryKey = 'id';
    protected $fillable = ['name','email','phone','message'];

}
