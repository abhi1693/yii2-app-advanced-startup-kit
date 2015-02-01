<?php

	namespace backend\controllers\installer;

	use Yii;
	use yii\web\Controller;

	/**
	 * Index Controller shows a simple welcome page.
	 *
	 * @author Abhimanyu Saharan
	 */
	class InstallController extends Controller
	{
		public $layout = 'setup';

		/**
		 * Initiates application setup
		 */
		public function actionIndex()
		{
			return $this->render('index');
		}

		public function actionGo()
		{
			if (Yii::$app->db->getIsActive())
				$this->redirect(Yii::$app->urlManager->createUrl('//installer/setup/init'));
			else
				$this->redirect(Yii::$app->urlManager->createUrl('//installer/setup/prerequisites'));
		}
	}