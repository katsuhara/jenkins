<?php
/**
 * Model_Informationのテスト
 *
 * @group App
 * @group Information
 */
class Test_Controller_Information extends TestCase
{
    public function test_action_indexの動作が正しい()
    {
        $req = Request::forge('information/index');
        $c = $req->execute()->controller_instance;
        $c->action_index();

        $expected = Controller_Information::PAGE_TITLE;
        $actual = $c->template->title;
        $this->assertEquals($expected, $actual);

        $expected = 'View';
        $actual = $c->template->content;
        $this->assertInstanceOf($expected, $actual);

        $key = 'information';
        $ary = $c->template->content->get();

        $this->assertArrayHasKey($key, $ary);
    }
}