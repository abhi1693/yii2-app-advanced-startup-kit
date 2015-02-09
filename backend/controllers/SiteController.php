<?php
	namespace backend\controllers;

	use abhimanyu\installer\helpers\enums\Configuration as Enum;
	use Yii;
	use yii\filters\AccessControl;
	use yii\web\Controller;

	/**
	 * Site controller
	 */
	class SiteController extends Controller
	{
		public function behaviors()
		{
			return [
				'access' => [
					'class' => AccessControl::className(),
					'only'  => ['index'],
					'rules' => [
						[
							'actions' => ['index', 'error'],
							'allow'   => TRUE,
							'roles'   => ['@'],
						],
					],
				],
			];
		}

		public function beforeAction($action)
		{
			// Checks if application has been installed successfully
			if (!Yii::$app->params[Enum::APP_INSTALLED]) {
				return $this->redirect(Yii::$app->urlManager->createUrl('//installer/install'));
			}

			return parent::beforeAction($action);
		}

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
			return $this->render('index');
		}
	}
