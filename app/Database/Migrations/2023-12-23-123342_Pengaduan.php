<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;


class Pengaduan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pengaduan_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'pelapor' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '100',
                'default'       => '_',
            ],
            'detail'   =>[
                'type'          => 'TEXT',
            ],
            'gambar' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'status' =>[
                'type'          => 'INT',
                'constraint'    => 1,
                'default'       =>'0',
                'comment'       => '0: Baru 1: diproses, 3: Selesai',
            ],
            'no_telpon' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '15',
                'default'       => 0,
            ],
            'created_at timestamp default current_timestamp',
            'update_at timestamp default current_timestamp on update current_timestamp',
            'delete_at' =>[
                'type'       => 'TIMESTAMP',
                'null'       => true,
            ]

           
        ]);
        $this->forge->addKey('pengaduan_id', true);
        $this->forge->createTable('pengaduan');
    }

    public function down()
    {
        $this->forge->dropTable('pengaduan');
    }
}
