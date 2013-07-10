<?php

namespace Fuel\Migrations;

class Create_information
{
	public function up()
	{
		\DBUtil::create_table('information', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'subject' => array('constraint' => 250, 'type' => 'varchar'),
			'detail' => array('constraint' => 250, 'type' => 'varchar'),
            'del_flg' => array('type' => 'bit', 'null' => true),
			'in_dt' => array('type' => 'timestamp', 'null' => true),
			'up_dt' => array('type' => 'timestamp', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('information');
	}
}