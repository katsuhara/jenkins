<?php

class Model_Request extends \Model {
    protected static $_table_name = "list";

    protected static $_primary_key = 'id';


    protected static $_properties = array(
                                          'id',
                                          'subject',
                                          'detail',
                                          'del_at',
                                          'in_dt',
                                          'up_dt'
                               );
}