<?php

// JSONで受け取る
// 項目　id, お知らせ件名, お知らせ詳細, 更新日時
// 7月中完成目標
// クライアントにはJSONを返す

class Controller_Request extends Controller
{
    public function action_index()
    {
        // TODO  viewを返さないようにする
        $arr = array('id' => '2', 'subject' => '件名', 'detail' => '詳細', 'up_dt' => date("Y-m-d H:i:s"));
        $json = json_encode($arr);

        // POSTされたデータを受け取る処理
        if(Input::post()) {
            // TODO 処理を記述
        }

        // jsonデータをデコード
        $data = json_decode($json);

        // 値チェック
        if($data->id == "" || $data->subject == "" || $data->detail == "" || $data->up_dt == "") {
            // TODO 端末にメッセージを返す
        }

        // DBに登録
        /*
        $information = Model_Information::forge(array(
                                                      //'id' => $data->id,
            'subject' => $data->subject,
            'detail' => $data->detail,
            'up_dt' => $data->up_dt
        ));
        */
    }
}