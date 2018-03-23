<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cards extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
				'cid' => array(
						'type' => 'INT',
						'constraint' => 11,
						'unsigned' => TRUE,
						'auto_increment' => TRUE
				),
				'pid' => array(
						'type' => 'VARCHAR',
						'constraint' => '100',
				),
				'issue_dt' => array(
						'type' => 'DATE',
				),
				'status' => array(
						'type' => 'ENUM("active", "lost", "blocked")',
						// 'constraint' => "'super','moderator','operator'", //if there is an error try with array('a', 'b', 'c'),
				        'default' => 'active',
				),
		));

		$this->dbforge->add_key('cid', TRUE);
		$this->dbforge->create_table('cards');
	}

	public function down()
	{
		$this->dbforge->drop_table('cards');
	}
}