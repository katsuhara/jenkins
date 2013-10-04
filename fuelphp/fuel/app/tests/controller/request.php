<?php
/**
 * Controller_Requestのテスト
 *
 * @group App
 * @group Request
 */
class Test_Controller_Request extends TestCase
{
    public function test_action_indexで一覧のJSONが取得できる()
    {
        $req = Request::forge('request/index');
        $req->execute();
        $res = $req->response();
        $res_ary = Format::forge($res, 'json')->to_array();

        $infos = Model_Information::find('all');
        $tmp = array();
        foreach ($infos as $val)
        {
            $tmp[] = array('id' => $val->id, 'subject' => $val->subject, 'detail' => $val->detail);
        }
        $infos = $tmp;

        foreach ($res_ary['items'] as $val)
        {
            $this->assertTrue(Arr::in_array_recursive($val['item'], $infos));
        }
        foreach ($infos as $val)
        {
            $this->assertTrue(Arr::in_array_recursive($val, $res_ary['items']));
        }
    }

    public function test_action_indexで削除されたデータは一覧のJSONには含まれない()
    {
        $req = Request::forge('request/index');
        $req->execute();
        $res = $req->response();
        $res_ary = Format::forge($res, 'json')->to_array();

        $infos = Model_Information::deleted('all');
        $tmp = array();
        foreach ($infos as $val)
        {
            $tmp[] = array('id' => $val->id, 'subject' => $val->subject, 'detail' => $val->detail);
        }
        $infos = $tmp;

        foreach ($res_ary['items'] as $val)
        {
            $this->assertFalse(Arr::in_array_recursive($val['item'], $infos));
        }
        foreach ($infos as $val)
        {
            $this->assertFalse(Arr::in_array_recursive($val, $res_ary['items']));
        }
    }

    /**
     * @dataProvider all_id_provider
     */
    public function test_action_detailで詳細のJSONが取得できる($id)
    {
        $expected = Model_Information::find($id)->to_array();

        $_GET['id'] = $id;  // コントローラへのGETパラメータの渡し方が不明なので、とりあえず無理やり渡す
        $req = Request::forge('request/detail');
        $req->execute();
        $res = $req->response();
        $res_ary = Format::forge($res, 'json')->to_array();
        $actual = $res_ary['items'][0]['item'];

        $this->assertEquals($expected, $actual);
    }
    public function all_id_provider()
    {
        $infos = Model_Information::find('all');
        $ret = array();
        foreach ($infos as $i)
        {
            $ret[] = array($i->id);
        }

        return $ret;
    }

    /**
     * @dataProvider all_deleted_id_provider
     */
    public function test_action_detailで削除されたデータはエラーになる($id)
    {
        $expected = json_encode(array('message'=>'error'));

        $_GET['id'] = $id;  // コントローラへのGETパラメータの渡し方が不明なので、とりあえず無理やり渡す
        $req = Request::forge('request/detail');
        $req->execute();
        $actual = $req->response();

        $this->assertEquals($expected, $actual);
    }
    public function all_deleted_id_provider()
    {
        $infos = Model_Information::deleted('all');
        $ret = array();
        foreach ($infos as $i)
        {
            $ret[] = array($i->id);
        }

        return $ret;
    }

    /**
     * @dataProvider invalid_id_provider
     */
    public function test_action_detailで不正なIDを渡すとエラーになる($id)
    {
        $expected = json_encode(array('message'=>'error'));

        $_GET['id'] = $id;  // コントローラへのGETパラメータの渡し方が不明なので、とりあえず無理やり渡す
        $req = Request::forge('request/detail');
        $req->execute();
        $actual = $req->response();

        $this->assertEquals($expected, $actual);
    }
    public function invalid_id_provider()
    {
        return array(
            array(''),
            array('abc'),
            array('123456789012345'),
            array('-1'),
        );
    }
}