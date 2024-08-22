<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubTeam extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'club_team_name'
    ];
}
