<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubTeam extends Model
{
    use HasFactory;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'm_club_teams';

    // 主キーのカラムを指定
    protected $primaryKey = 'club_team_id';

    protected $keyType = 'int';

    protected $fillable =
    [
        'club_team_name'
    ];
}
