<?php

namespace App\Models\Players;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnglandPlayer extends Model
{
    use HasFactory;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 't_england_players';

    /**
     * モデルの属性のデフォルト値
     *
     * @var array
     */
    protected $attributes = [
        'national_team_retired_flag' => 0,
        'player_retired_flag' => 0,
    ];

    // 主キーのカラムを指定
    protected $primaryKey = 'england_player_id';

    /**
     * IDの自動増分を指定する
     *
     * @var bool
     */
    public $incrementing = true;

    protected $keyType = 'int';

    /**
     * 複数代入の脆弱性の対策
     * 今後、管理者画面から、選手を追加する機能を実装予定のため
     * @var array
     */
    protected $fillable =
    [
        'country_id',
        'player_name',
        'player_age',
        'club_team_id',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function clubteam(): BelongsTo
    {
        return $this->belongsTo(ClubTeam::class);
    }
}
