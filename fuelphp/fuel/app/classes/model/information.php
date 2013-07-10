<?php
use Orm\Model;

class Model_Information extends Model
{
	protected static $_properties = array(
		'id',
		'subject',
		'detail',
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
			'events' => array('before_save'),
            'mysql_timestamp' => true,
            'property' => 'up_dt',
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('subject', 'Subject', 'required|max_length[250]');
		$val->add_field('detail', 'Detail', 'required|max_length[250]');

		return $val;
	}

}
