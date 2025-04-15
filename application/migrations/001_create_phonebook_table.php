<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_phonebook_table extends CI_Migration {

    public function up() {
        $this->load->dbforge();

        $fields = array(
            'id' => array(
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ),
            'phone' => array(
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ),
            'status' => array(
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ),
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('phonebook');
    }

    public function down() {
        $this->load->dbforge();
        $this->dbforge->drop_table('phonebook');
    }
}
