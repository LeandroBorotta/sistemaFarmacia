<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'name',
        'contact_number',
        'address',
        'doctor_name',
        'doctor_address',
    ];

    static public function getAllRecord()
    {
        return self::get();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
