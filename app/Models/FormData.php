<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormData extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'form_data';

    protected $fillable = [
        'nombre',
        'apellido',
        'rut',
        'fecha_nacimiento',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
