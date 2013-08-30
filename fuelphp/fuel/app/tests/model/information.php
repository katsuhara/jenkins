<?php
/**
 * Model_Informationのテスト
 *
 * @group App
 * @group Information
 */
class Test_Model_Information extends TestCase
{
    /**
     * @dataProvider invalid_data_provider
     */
    public function test_不正なデータはバリデーションが通らない(array $src)
    {
        $val = Model_Information::forge()->validate('test_invalid');

        $this->assertFalse($val->run($src));
    }
    public function invalid_data_provider()
    {
        return array(
            array(array('subject' => '', 'detail' => '')),
            array(array('subject' => 'dummy', 'detail' => '')),
            array(array('subject' => str_repeat('abc', 100), 'detail' => 'dummy')),
            array(array('subject' => 'dummy', 'detail' => str_repeat('abc', 100))),
            array(array('subject' => str_repeat('abc', 100), 'detail' => str_repeat('abc', 100))),
        );
    }

    /**
     * @dataProvider valid_data_provider
     */
    public function test_正しいデータはバリデーションが通る(array $src)
    {
        $val = Model_Information::forge()->validate('test_valid');

        $this->assertTrue($val->run($src));
    }
    public function valid_data_provider()
    {
        return array(
            array(array('subject' => 'dummy', 'detail' => 'dummy')),
            array(array('subject' => str_repeat('a', 250), 'detail' => str_repeat('b', 250))),
        );
    }
}
