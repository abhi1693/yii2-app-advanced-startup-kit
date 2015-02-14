<?php
	use abhimanyu\installer\helpers\enums\Configuration as Enum;
	use backend\assets_b\AppAsset;
	use yii\bootstrap\Nav;
	use yii\bootstrap\NavBar;
	use yii\helpers\Html;
	use yii\widgets\Breadcrumbs;

	/* @var $this \yii\web\View */
	/* @var $content string */

	raoul2000\bootswatch\BootswatchAsset::$theme = Yii::$app->config->get(Enum::APP_BACKEND_THEME);
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
<div class="wrap">
	<?php
		NavBar::begin([
			              'brandLabel' => Yii::$app->config->get(Enum::APP_NAME),
			              'brandUrl'   => Yii::$app->homeUrl,
			              'options'    => [
				              'class' => 'navbar-inverse navbar-fixed-top',
			              ],
		              ]);
		if (Yii::$app->user->isGuest) {
			$menuItems = [
				['label' => 'Login', 'url' => ['/user/auth/login']]
			];
		} else {
			$menuItems = [
				['label' => 'Home', 'url' => ['/site/index']],
				['label' => 'Logout', 'url' => ['/user/auth/logout'], 'linkOptions' => ['data-method' => 'post']]
			];
		}

		echo Nav::widget([
			                 'options' => ['class' => 'navbar-nav navbar-right'],
			                 'items'   => $menuItems,
		                 ]);
		NavBar::end();
	?>

	<div class="container">
		<?= Breadcrumbs::widget([
			                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		                        ]) ?>
		<?= $content ?>
	</div>
</div>

<footer class="footer">
	<div class="container">
		<p class="pull-left">&copy; <?= Yii::$app->config->get(Enum::APP_NAME) ?> <?= date('Y') ?></p>

		<p class="pull-right">Maintained By <?= Html::mailto('Admin', Yii::$app->config->get(Enum::ADMIN_EMAIL)) ?></p>
	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
