<?php

namespace App\Controllers;

use App\Models\ScoreHistory;

class SameGame extends BaseController
{
    public function index()
    {
        $model = new ScoreHistory();
        $data['score_history'] = $model->getScoreHistory(null, 10);
        return view('same_game', $data);
    }
}
