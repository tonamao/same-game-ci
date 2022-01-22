<?php namespace App\Models;

use CodeIgniter\Model;

class ScoreHistory extends Model
{
    protected $table = 'tb_score_history';

    public function getScoreHistory($id = null, $limit = 10, $order = 'game_score')
    {
        // get one by id
        if (!empty($id)) {
            return $this->asArray()
                ->where(['id' => $id])
                ->first();
        }

        // get as array
        $builder = $this->_getDb()->table($this->table);
        return $builder->limit($limit)->get()->getResultArray();
    }

    private function _getDb()
    {
        return \Config\Database::connect();
    }
}