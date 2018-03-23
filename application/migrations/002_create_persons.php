<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_persons extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
				'pid' => array(
						'type' => 'INT',
						'constraint' => 11,
						'unsigned' => TRUE,
						'auto_increment' => TRUE
				),
				'cid' => array(
						'type' => 'INT',
						'constraint' => 11,
						'unsigned' => TRUE,
				),
				'name' => array(
						'type' => 'VARCHAR',
						'constraint' => '100',
				),
				'rank' => array(
						'type' => 'VARCHAR',
						'constraint' => '50',
				),
				'class' => array(
						'type' => 'ENUM("Officer", "Airman", "Civilian Class-I", "Civilian Class-II", "Civilian Class-III", "Civilian Class-IV")',
						'default' => 'Officer',
				),
				'svc_no' => array(
						'type' => 'INT',
				        'constraint' => '10',
				),
				'svc_no_type' => array(
						'type' => 'VARCHAR',
				        'constraint' => '10',
				),
				'branch_trade' => array(
						'type' => 'VARCHAR',
						'constraint' => '50',
				),
				'blood' => array(
						'type' => 'VARCHAR',
						'constraint' => '10',
				),
				'address' => array(
						'type' => 'VARCHAR',
						'constraint' => '128',
				),
				'address_perm' => array(
						'type' => 'VARCHAR',
						'constraint' => '128',
				),
				'contact' => array(
						'type' => 'VARCHAR',
						'constraint' => '40',
				),
				'ident_mark' => array(
						'type' => 'VARCHAR',
						'constraint' => '128',
				),
				'eye' => array(
						'type' => 'VARCHAR',
						'constraint' => '40',
				),
				'hair' => array(
						'type' => 'VARCHAR',
						'constraint' => '40',
				),
				'height' => array(
						'type' => 'VARCHAR',
						'constraint' => '40',
				),
		));

		$this->dbforge->add_key('pid', TRUE);
		$this->dbforge->create_table('persons');
	}

	public function down()
	{
		$this->dbforge->drop_table('persons');
	}
}