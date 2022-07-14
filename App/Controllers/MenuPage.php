<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\User;
use \App\Auth;

class MenuPage extends Authenticated
{
	
	public function startAction()
    {
        View::renderTemplate('MenuPage/start.html');
    }

	public function incomeAction()
    {
		View::renderTemplate('MenuPage/income.html');
    }
	public function expenseAction()
    {
		View::renderTemplate('MenuPage/expense.html');
    }
	
	// show balance current month
	public function balancecmAction()
    {
		View::renderTemplate('MenuPage/balancecm.html');
    }
	
	// show balance last month
	public function balancelmAction()
    {
		View::renderTemplate('MenuPage/balancelm.html');
    }	
	
	// show balance current year
	public function balancecyAction()
    {
		View::renderTemplate('MenuPage/balancecy.html');
    }	
	
	// show balance custom
	public function balancecAction()
	{
		View::renderTemplate('MenuPage/balancec.html');
    }	
	
	public function settingsAction()
    {
		View::renderTemplate('MenuPage/settings.html');
    }		
	
}