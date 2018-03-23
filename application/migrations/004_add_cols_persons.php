<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_cols_persons extends CI_Migration
{

    public function up ()
    {
        $field = array(
                'birthday' => array(
                        'type' => 'DATE'
                ),
                'pic' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '255'
                ),
                'sign' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '255'
                )
        );
        // $this->dbforge->add_field($field);
        
        $this->dbforge->add_column('persons', $field);
    }

    public function down ()
    {
        $this->dbforge->drop_column('persons', 'birthday');
        $this->dbforge->drop_column('persons', 'pic');
        $this->dbforge->drop_column('persons', 'sign');
    }
}