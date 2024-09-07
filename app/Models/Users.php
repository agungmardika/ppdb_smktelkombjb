<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'id_user';
    protected $fillable = ['nip', 'nama_admin', 'username', 'email', 'password'];
}
