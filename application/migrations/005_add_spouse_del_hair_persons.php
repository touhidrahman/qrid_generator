<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_spouse_del_hair_persons extends CI_Migration
{

    public function up ()
    {
        $field = array(
                'spouse' => array(
                        'type' => 'TEXT',
                        'constraint' => '1024'
                ),
        );
        
        $this->dbforge->add_column('persons', $field, 'birthday');
        
        //Also drop column "Hair"
        $this->dbforge->drop_column('persons', 'hair');
    }

    public function down ()
    {
        $this->dbforge->drop_column('persons', 'spouse');
        
        //In case of down, add backj the hair column
        $field = array(
                'hair' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '40'
                ),
        );
        $this->dbforge->add_column('persons', $field, 'eye');
    }
}