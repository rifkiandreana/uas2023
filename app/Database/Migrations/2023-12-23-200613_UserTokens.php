<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserToken extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_token_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'token' => [
                'type'       => 'VARCHAR',
                'constraint' => '64',
            ],
            'expired_at' =>[
                'type'       => 'DATETIME',
            ]

           
        ]);
        $this->forge->addKey('user_token_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id');
        $this->forge->createTable('user_token');
    }

    public function down()
    {
        $this->forge->dropTable('user_token');
    }
}
