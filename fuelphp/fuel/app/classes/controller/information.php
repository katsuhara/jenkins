<?php
class Controller_Information extends Controller_Template{

	public function action_index()
	{
		$data['information'] = Model_Information::find('all');
		$this->template->title = "Information";
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

		$this->template->title = "Information";
		$this->template->content = View::forge('information/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Information::validate('create');
			
			if ($val->run())
			{
				$information = Model_Information::forge(array(
					'subject' => Input::post('subject'),
					'content' => Input::post('content'),
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

		$this->template->title = "Information";
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
			$information->content = Input::post('content');

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
				$information->content = $val->validated('content');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('information', $information, false);
		}

		$this->template->title = "Information";
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


}
