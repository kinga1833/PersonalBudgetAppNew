<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\User;
use \App\Auth;
use \App\Flash;

class Login extends \Core\Controller
{
	public function newAction()
    {
		View::renderTemplate('Login/new.html');
	}
	
	public function createAction()
	{
		$user = User::authenticate($_POST['email'], $_POST['password']);
		
		if ($user) {
			
			$_SESSION['username'] = $user->username;
			
			Auth::login($user);
			
			Flash::addMessage('Logowanie powiodło się!');
			
			$this->redirect('/menuPage/start');
			
		} else {
			
			Flash::addMessage('Logowanie nie powiodło się, spróbój ponownie!', Flash::WARNING);
			
			View::renderTemplate('Login/new.html', [
			'email' => $_POST['email']]);
		
		}
	}
	public function destroyAction()
	{
		Auth::logout();
		
		$this->redirect('/login/show-logout-message');
	}
	public function showLogoutMessageAction()
	{
		Flash::addMessage('Wylogowanie powiodło się!');
		$this->redirect('/');
	}
}