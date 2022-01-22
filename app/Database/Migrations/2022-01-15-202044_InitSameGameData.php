<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InitSameGameData extends Migration
{
    const COLOR_SUCCESS = 32; // green
    const COLOR_ERROR   = 31; // red

    public static $drop_table_list = [
        // master tables
        // transaction tables
        'tb_score_history',
    ];

    public static $cleate_tables = [
        'tb_score_history' => [
            'fields' => [
                'id'                => ['type' => 'INT',     'constraint' => 11,  'unsigned' => true, 'auto_increment' => true],
                'account_id'        => ['type' => 'INT',     'constraint' => 11,  'null' => true],
                'guest_name'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'game_id'           => ['type' => 'INT',     'constraint' => 11,  'null' => false],
                'game_category_id'  => ['type' => 'INT',     'constraint' => 11,  'null' => true],
                'game_display_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'game_score'        => ['type' => 'INT',     'constraint' => 11,  'null' => false],
            ],
            'keys' => [
                'id' => true,
            ],
        ],
    ];

    public static $common_fields = [
        '`updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        '`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
    ];
    
    public function up()
    {
        $this->cEcho('[INFO] Start Migration.', self::COLOR_SUCCESS);

        $this->cEcho('[INFO] STEP1: Drop All Tables.', self::COLOR_SUCCESS);
        $this->_dropTablesAll(true);
        $this->cEcho('[INFO] Done.', self::COLOR_SUCCESS);

        $this->cEcho('[INFO] STEP2: Create All Tables.', self::COLOR_SUCCESS);
        $this->_createTablesAll();
        $this->cEcho('[INFO] Done.', self::COLOR_SUCCESS);

        $this->cEcho('[INFO] Finished Migration.', self::COLOR_SUCCESS);
    }

    public function down()
    {
        $this->_dropTablesAll(true);
    }

    public function cEcho($message, $color)
    {
        $string = sprintf("\033[%dm%s\033[m", $color, $message);
        echo $string . PHP_EOL;
    }

    // =====================================
    // private functions
    // =====================================

    private function _dropTablesAll($is_exists = false)
    {
        foreach (self::$drop_table_list as $table) {
            $this->forge->dropTable($table, $is_exists);
            echo "[INFO] Drop Table {$table}." . PHP_EOL;
        }
    }

    private function _createTablesAll()
    {
        foreach (self::$cleate_tables as $table => $info) {
            if (!isset($info['fields'])) {
                continue;
            }
            $fields = array_merge($info['fields'], self::$common_fields);
            $this->forge->addField($fields);

            if (!isset($info['keys']) || empty($info['keys'])) {
                continue;
            }
            foreach ($info['keys'] as $key => $primary_key) {
                $this->forge->addKey($key, $primary_key);
            }

            $this->forge->createTable($table);
            echo "[INFO] Create Table {$table}." . PHP_EOL;
        }
    }
}
