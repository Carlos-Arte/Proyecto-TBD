<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $fillable = [ 'imagen', 'perfil', 'username', 'estado', 'name', 'apellido_paterno', 'apellido_materno', 'email', 'password', 'descripcion'];
    public $timestamps = true;
}
