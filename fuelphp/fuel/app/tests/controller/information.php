<?php
/**
 * Controller_Informationのテスト
 *
 * @group App
 * @group Information
 */
class Test_Controller_Information extends TestCase
{
    public function test_action_indexのタイトルが正しい()
    {
        $req = Request::forge('information/index');
        $c = $req->execute()->controller_instance;

        $expected = Controller_Information::PAGE_TITLE;
        $actual = $c->template->title;
        $this->assertEquals($expected, $actual);
    }

    public function test_action_indexのViewが設定されている()
    {
        $req = Request::forge('information/index');
        $c = $req->execute()->controller_instance;

        $expected = 'View';
        $actual = $c->template->content;
        $this->assertInstanceOf($expected, $actual);
    }

    public function test_action_indexの一覧情報が設定されている()
    {
        $req = Request::forge('information/index');
        $c = $req->execute()->controller_instance;

        $key = 'information';
        $ary = $c->template->content->get();

        $this->assertArrayHasKey($key, $ary);
    }

    public function test_action_viewのタイトルが正しい()
    {
        $i = Model_Information::find('first');

        $req = Request::forge('information/view/'.$i->id);
        $c = $req->execute()->controller_instance;

        $expected = Controller_Information::PAGE_TITLE;
        $actual = $c->template->title;
        $this->assertEquals($expected, $actual);
    }

    public function test_action_viewのViewが設定されている()
    {
        $i = Model_Information::find('first');

        $req = Request::forge('information/view/'.$i->id);
        $c = $req->execute()->controller_instance;

        $expected = 'View';
        $actual = $c->template->content;
        $this->assertInstanceOf($expected, $actual);
    }

    public function test_action_viewの一覧情報が設定されている()
    {
        $i = Model_Information::find('first');

        $req = Request::forge('information/view/'.$i->id);
        $c = $req->execute()->controller_instance;

        $key = 'information';
        $ary = $c->template->content->get();

        $this->assertArrayHasKey($key, $ary);
    }
}