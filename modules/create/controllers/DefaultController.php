<?php

class DefaultController extends CController
{
	public $layout='main';

	public function actionIndex()
	{
		$this->render('index');
	}
}