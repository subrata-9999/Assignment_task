<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePermissionTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'permission' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('role', true);
        $this->forge->createTable('permissions');
    }

    public function down()
    {
        $this->forge->dropTable('permissions');
    }
}
