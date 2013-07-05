<?php

namespace Fuel\Migrations;

class Create_information
{
	public function up()
	{
		\DBUtil::create_table('information', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'subject' => array('constraint' => 50, 'type' => 'varchar'),
			'content' => array('constraint' => 400, 'type' => 'varchar'),
			'created_at' => array('type' => 'date', 'null' => true),
			'updated_at' => array('type' => 'date', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('information');
	}
}