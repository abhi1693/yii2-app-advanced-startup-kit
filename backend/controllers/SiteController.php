<?php
	namespace backend\controllers;

	use abhimanyu\installer\helpers\enums\Configuration as Enum;
	use Yii;
	use yii\filters\AccessControl;
	use yii\web\Controller;
	use yii\web\ErrorAction;

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

		/**
		 * @inheritdoc
		 */
		public function actions()
		{
			return [
				'error' => [
					'class' => ErrorAction::className(),
				],
			];
		}

		public function beforeAction($action)
		{
			// Verifies application is installed properly
			if (!Yii::$app->params[Enum::APP_INSTALLED]) {
				return $this->redirect(Yii::$app->urlManager->createUrl('//installer/install/index'));
			}

			return parent::beforeAction($action);
		}

		/**
		 * @return string|\yii\web\Response
		 */
		public function actionIndex()
		{
			return $this->render('index');
		}
	}
