<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
				'uid' => array(
						'type' => 'INT',
						'constraint' => 11,
						'unsigned' => TRUE,
						'auto_increment' => TRUE
				),
				'name' => array(
						'type' => 'VARCHAR',
						'constraint' => '100',
				),
				'rank' => array(
						'type' => 'VARCHAR',
						'constraint' => '50',
				),
				'appointment' => array(
						'type' => 'VARCHAR',
						'constraint' => '50',
				),
				'posted_in' => array(
						'type' => 'DATE',
				),
				'posted_out' => array(
						'type' => 'DATE',
				),
				'contact' => array(
						'type' => 'VARCHAR',
						'constraint' => '20',
				),
				'address' => array(
						'type' => 'VARCHAR',
						'constraint' => '128',
				),
				'address_perm' => array(
						'type' => 'VARCHAR',
						'constraint' => '128',
				),
				'password' => array(
						'type' => 'VARCHAR',
						'constraint' => '128',
				),
				'hint' => array(
						'type' => 'VARCHAR',
						'constraint' => '128',
				),
				'admin_level' => array(
						'type' => 'ENUM("super", "moderator", "operator")',
						// 'constraint' => "'super','moderator','operator'", //if there is an error try with array('a', 'b', 'c'),
				        'default' => 'operator',
				),
		));

		$this->dbforge->add_key('uid', TRUE);
		$this->dbforge->create_table('users');
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}