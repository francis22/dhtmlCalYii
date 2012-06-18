<?php

class DefaultController extends Controller
{

	public $layout='/layouts/column2'; //default
	//public $layout='/layouts/column1'; //remove slidebar
	//public $layout='/layouts/main'; //full screen
	
	public function actionIndex()
	{
		$this->render('index');
	}
}
