<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 15-02-2015
	 * Time: 10:48
	 */

	namespace backend\controllers;

	use yii\filters\AccessControl;
	use yii\web\Controller;

	class AdminController extends Controller
	{
		public $layout = 'admin';

		public function behaviors()
		{
			return [
				'access' => [
					'class' => AccessControl::className(),
					'rules' => [
						[
							'actions' => ['index', 'about'],
							'allow'   => TRUE,
							'roles'   => ['@'],
						],
					],
				],
			];
		}

		public function actionIndex()
		{
			return $this->render('index');
		}

		public function actionAbout()
		{
			return $this->render('about');
		}
	}