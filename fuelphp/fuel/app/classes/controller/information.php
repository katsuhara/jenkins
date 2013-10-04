<?php
class Controller_Information extends Controller_Template{

    const PAGE_TITLE = 'お知らせアプリ';

	public function action_index()
	{
		$data['information'] = Model_Information::find('all');
		$this->template->title = self::PAGE_TITLE;
		$this->template->content = View::forge('information/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('information');

		if ( ! $data['information'] = Model_Information::find($id))
		{
			Session::set_flash('error', 'Could not find information #'.$id);
			Response::redirect('information');
		}

		$this->template->title = self::PAGE_TITLE;
		$this->template->content = View::forge('information/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
            // 250文字を超えていたら250文字までに切り詰める
            $_POST['subject'] = mb_substr($_POST['subject'], 0, 250);
            $_POST['detail'] = mb_substr($_POST['detail'], 0, 250);

            $val = Model_Information::validate('create');

			if ($val->run())
			{
				$information = Model_Information::forge(array(
					'subject' => Input::post('subject'),
					'detail' => Input::post('detail'),
				));

				if ($information and $information->save())
				{
					Session::set_flash('success', 'Added information #'.$information->id.'.');

					Response::redirect('information');
				}

				else
				{
					Session::set_flash('error', 'Could not save information.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = self::PAGE_TITLE;
		$this->template->content = View::forge('information/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('information');

		if ( ! $information = Model_Information::find($id))
		{
			Session::set_flash('error', 'Could not find information #'.$id);
			Response::redirect('information');
		}

		$val = Model_Information::validate('edit');

		if ($val->run())
		{
			$information->subject = Input::post('subject');
			$information->detail = Input::post('detail');

			if ($information->save())
			{
				Session::set_flash('success', 'Updated information #' . $id);

				Response::redirect('information');
			}

			else
			{
				Session::set_flash('error', 'Could not update information #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$information->subject = $val->validated('subject');
				$information->detail = $val->validated('detail');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('information', $information, false);
		}

		$this->template->title = self::PAGE_TITLE;
		$this->template->content = View::forge('information/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('information');

		if ($information = Model_Information::find($id))
		{
			$information->delete();

			Session::set_flash('success', 'Deleted information #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete information #'.$id);
		}

		Response::redirect('information');

	}

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
