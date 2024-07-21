<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    /**
     * 複数代入の脆弱性の対策
     *
     * @var array
     */
    protected $fillable =
    [
        'country_name'
    ];
}
