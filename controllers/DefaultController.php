<?php

class DefaultController extends Controller
{

	public $layout='/layouts/column2'; //default
	//public $layout='/layouts/main'; //full screen
	
	public function actionIndex()
	{
		$this->redirect(array('events/index'));
	}
}
