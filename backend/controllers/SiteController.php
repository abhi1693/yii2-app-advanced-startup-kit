<?php
	namespace backend\controllers;

	use Yii;
	use yii\web\Controller;

	/**
	 * Site controller
	 */
	class SiteController extends Controller
	{
		/**
		 * @inheritdoc
		 */
		public function actions()
		{
			return [
				'error' => [
					'class' => 'yii\web\ErrorAction',
				],
			];
		}

		/**
		 * Initiates application setup
		 *
		 * @return string|\yii\web\Response
		 */
		public function actionIndex()
		{
			// Checks if the application has an active
			// database connection
			if (Yii::$app->db->getIsActive())
				return $this->render('index');
			else
				return $this->redirect(Yii::$app->urlManager->createUrl('//installer/install/index'));
		}
	}
