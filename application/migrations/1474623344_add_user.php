<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_blog extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'username' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '45',
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '45',
                        ),
			'created' => array(
				'type' => 'DATETIME',
			),
			'updated_at' =>array(
			        'type' => 'TIMESTAMP',
				'default' => 'CURRENT_TIMESTAMP',
			)
			
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('users');
        }

        public function down()
        {
                $this->dbforge->drop_table('users');
        }
}