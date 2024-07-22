# サッカー選手図鑑
## 構成(とりあえず)
- 国、クラブチームのタグ(nav-bar)をヘッダーに作る。</br>
    - 初期表示は、とりあえず、国一覧にする。
    - 国
        - 選手名(player_name), 年齢(age), 所属チーム(club_team_name)

    - クラブ
        - クラムチーム名(club_team_name)
            - 選手名(player_name), 年齢(age), 国名(country_name)
# DB
## DB構成図
## テーブル一覧
### 国マスタ：m_countries
| 国 | m_country |  |  |
| ---- | ---- | ---- | ---- |
| country_id | int | key |  |
| country_name | string | char(50) | NOT NULL |
- [ ] country_id
- [ ] 国名(country_name)
- [ ] 国旗の画像(後で追加, country_flag)(後で追加)
- [ ] W杯優勝回数(後で追加, int)
- [ ] プレイヤー数(後で追加, int)
    - [ ] プレイヤー(player_name)一覧画面に遷移できるようにする
        - クラブチーム名
        - age
        - position(後で追加)
        - 代表通算ゴール数(後で追加)
        - 代表通算アシスト数(後で追加)
        - 過去の所属クラブチーム(後で追加)

### クラブチームマスタ：m_club_teams
- [ ] club_team_id
- [ ] club_team_name
- [ ] player_count:プレイヤー数(後で追加)
- [ ] リーグ優勝回数(後で追加)
- [ ] UEFA Champions League優勝回数(後で追加)

### 国別選手一覧：t_<country>_players
テーブル名に、国名が入る。例、t_japan_players, t_spain_players
それぞれ、以下のカラムは共通
- [ ] club_team_id
- [ ] player_name
- [ ] age
- [ ] 代表選手として引退済みか否か：national_team_retired_flag
- [ ] 選手として引退済みか否か：player_retired_flag

国名をクリックして、選手一覧を表示する際は、t_japan_players のデータを引っ張ってくればいい
- TODO:どうやって、国別テーブルを指定するか？
  - CASE式で、country_id ごとに処理を分ける？
  - どの国をクリックしてもコードの中身は変わらない。引数で渡した値を使って、どのテーブル(国)からデータ(選手)を引っ張ってくるか？のロジックが重要。
    - コード自体は、クラス化orメソッド化して、それを呼び出すようにする。

### クラブチーム別選手一覧：
結合条件
- クラブチームid = 国別選手一覧.clubTeamId
  - m_club_teams.club_team_id = t_japan_players.club_team_id
