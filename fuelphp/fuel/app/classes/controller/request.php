<?php

// JSONで受け取る
// 項目　id, お知らせ件名, お知らせ詳細, 更新日時
// 7月中完成目標
// クライアントにはJSONを返す

class Controller_Request extends Controller
{
    public function action_index()
    {
        $arr = array('id' => '', 'subject' => '件名', 'detail' => '詳細', 'up_dt' => '更新日時');
        $json = json_encode($arr);

        // 値チェック

        // jsonデータをデコード
        $data = json_decode($json);
        // $data->id
        // $data->subject
        // $data->detail
        // $data->up_dt


        // 値チェック
        if($data->id == "" || $data->subject == "" || $data->detail == "" || $data->up_dt == "") {
            return json_encode($data);
        }

        // DBに登録



        // クライアントにメッセージを返す
        return View::forge('request/index.html');
    }
}