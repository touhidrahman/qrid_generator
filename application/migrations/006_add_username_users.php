<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_username_users extends CI_Migration
{

    public function up ()
    {
        $field = array(
                'username' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '20'
                ),
        );
        
        $this->dbforge->add_column('users', $field, 'uid');
    }

    public function down ()
    {
        $this->dbforge->drop_column('users', 'username');
    }
}