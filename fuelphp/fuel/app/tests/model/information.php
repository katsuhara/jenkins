<?php
/**
 * Model_Informationのテスト
 *
 * @group App
 * @group Information
 */
class Test_Model_Information extends TestCase
{
    public function test_foo()
    {
        $info = Model_Information::forge();

        $expected = '';

        $this->assertEquals($expected, $info->id);
    }
}
