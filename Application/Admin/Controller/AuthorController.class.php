<?php
namespace Admin\Controller;
use Think\Controller;
class AuthorController extends Controller
{
	public function _initialize()
	{
		if(!isset($_SESSION['username']) || $_SESSION['username'] == '')
		{
			$this->redirect('Login/index');
		}
	}
}
?>