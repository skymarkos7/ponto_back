<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'store';
    protected $primaryKey = 'id';

    /**
     * Necessário fillable para conseguir realizar modificações
     */
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'website',
        'status',
    ];
}
