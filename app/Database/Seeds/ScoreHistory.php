<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ScoreHistory extends Seeder
{
    const COLOR_SUCCESS = 32; // green
    const COLOR_ERROR   = 31; // red

    public function run()
    {
        /**
         * tb_score_history(dummy)
         */
        $game_default_data = [
            [
                'account_id'        => 0,
                'guest_name'        => 'GUEST',
                'game_id'           => 1,
                'game_category_id'  => 1,
                'game_display_name' => 'SameGame',
                'game_score'        => 17414,
            ],
            [
                'account_id'        => 0,
                'guest_name'        => 'ナナシ',
                'game_id'           => 1,
                'game_category_id'  => 1,
                'game_display_name' => 'SameGame',
                'game_score'        => 18555,
            ],
            [
                'account_id'        => 0,
                'guest_name'        => 'samegame-master',
                'game_id'           => 1,
                'game_category_id'  => 1,
                'game_display_name' => 'SameGame',
                'game_score'        => 52814,
            ],
        ];
        $this->cEcho('[INFO] Insert Default Data.', self::COLOR_SUCCESS);
        $this->db->table('tb_score_history')->insertBatch($game_default_data);
        $this->cEcho('[INFO] Finished.', self::COLOR_SUCCESS);
    }

    public function cEcho($message, $color)
    {
        $string = sprintf("\033[%dm%s\033[m", $color, $message);
        echo $string . PHP_EOL;
    }
}
