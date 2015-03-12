<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 15-02-2015
	 * Time: 12:56
	 */

	use abhimanyu\installer\helpers\enums\Configuration as Enum;
	use backend\assets_b\AppAsset;
	use kartik\sidenav\SideNav;
	use yii\helpers\Html;
	use yii\widgets\Breadcrumbs;

	/* @var $this \yii\web\View */
	/* @var $content string */

	raoul2000\bootswatch\BootswatchAsset::$theme = Yii::$app->config->get(Enum::APP_BACKEND_THEME, 'yeti');
	AppAsset::register($this);
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>
	<body>
	<?php $this->beginBody() ?>
	<div class="wrap" style="padding-top: 70px">
		<?= $this->render('nav') ?>

		<div class="container-fluid">
			<?= Breadcrumbs::widget([
				                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			                        ]) ?>
			<div class="row">
				<?php if (!Yii::$app->user->isGuest && Yii::$app->controller->id != 'account') { ?>
					<div class="col-md-2">
						<?=
							SideNav::widget([
								                'type'    => SideNav::TYPE_DEFAULT,
								                'heading' => '<i class="glyphicon glyphicon-tasks"></i> Manage',
								                'items'   => \backend\controllers\admin\SettingController::getMenuItems()
							                ]);
						?>
					</div>
				<?php } ?>

				<div class="col-md-9">
					<?= $content ?>
				</div>
			</div>
		</div>
	</div>

	<?= $this->render('footer') ?>

	<?php $this->endBody() ?>
	</body>
	</html>
<?php $this->endPage() ?>