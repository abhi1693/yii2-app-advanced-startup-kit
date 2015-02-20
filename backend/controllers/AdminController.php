<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 15-02-2015
	 * Time: 10:48
	 */

	namespace backend\controllers;

	use yii\web\Controller;

	class AdminController extends Controller
	{
		public $layout = 'admin';

		public function actionIndex()
		{
			return $this->render('index');
		}

		public function actionAbout()
		{
			return $this->render('about');
		}
	}