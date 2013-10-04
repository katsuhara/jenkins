<?php

// JSONで受け取る
// 項目　id, お知らせ件名, お知らせ詳細, 更新日時
// 7月中完成目標
// クライアントにはJSONを返す

/**
 * [機能説明] 端末から送られたデータを元にクライアントから返す
 * @author Kazuya Katsuhara
 **/

class Controller_Request extends Controller
{
    // 一覧
    public function action_index()
    {
        $test = 1;
        $info = DB::select('id','subject','detail')->from('information')->where('del_at', NULL)->execute()->as_array();

        // データを整形
        foreach($info as $key => $val) {
            $data[] = array("item" =>$val);
        }
        $data = array("items" => $data);

        return json_encode($data);
    }


    // 詳細
    public function action_detail()
    {
        $id = Input::get('id');
        if(! empty($id)) {

            $info = DB::select()->from('information')->where('id', $id)->execute()->as_array();

            // データを整形
            foreach($info as $key => $val) {
                $data[] = array("item" =>$val);
            }
            $data = array("items" => $data);
            return json_encode($data);
        }
        return json_encode(array('message'=>'error'));
    }

    public function action_add()
    {
        // TODO  viewを返さないようにする
        $arr = array('subject' => '件名', 'detail' => '詳細');
        $json = json_encode($arr);

        // POSTされたデータを受け取る処理
        if(Input::post()) {
            // TODO 処理を記述
        }

        // jsonデータをデコード
        $data = json_decode($json);

        // 値チェック
        if( $data->subject == "" || $data->detail == "") {
            // TODO 端末にメッセージを返す
        }

        // DBに登録
        $information = Model_Information::forge(array(
            'subject' => $data->subject,
            'detail' => $data->detail,
            'up_dt' => date("Y-m-d H:i:s")
        ));

        /*
        if($information && $information->save()) {
            // TODO 成功メッセージをかえす
        } else {
            // TODO 失敗メッセージをかえす
        }
        */
        return "add";
    }

    public function action_edit()
    {
        return "edit";
    }

    public function ab() {}

    public function foo($val) {
        if($val === 1) {
            $test = "1";
        } else if ($val === 2) {
            $test = "2";
        } else if ($val === 3) {
            $test = "3";
        } else if ($val === 4) {
            $test = "4";
        } else if ($val === 5) {
            $test = "5";
        } else if ($val === 6) {
             $test = "6";
       } else if ($val === 7) {
            $test = "7";
        }
        return $test;
    }

    public function hoge($val) {
        if($val === 1) {
            $test = "1";
        } else if ($val === 2) {
            $test = "2";
        } else if ($val === 3) {
            $test = "3";
        } else if ($val === 4) {
            $test = "4";
        } else if ($val === 5) {
            $test = "5";
        } else if ($val === 6) {
             $test = "6";
       } else if ($val === 7) {
            $test = "7";
        }
        return $test;
    }
}