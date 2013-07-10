<?php

class Model_Information extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
		'subject',
		'detail',
        'del_at',
		'in_dt',
		'up_dt',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
			'property' => 'in_dt',
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => true,
			'property' => 'up_dt',
		),
	);

	protected static $_soft_delete = array(
		'mysql_timestamp' => true,
		'deleted_field' => 'del_at',
	);
	protected static $_table_name = 'information';

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('subject', 'お知らせ件名', 'required|max_length[250]');
        $val->add_field('detail', 'お知らせ詳細', 'required|max_length[250]');

        return $val;
    }
}
