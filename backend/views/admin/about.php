<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 20-02-2015
	 * Time: 13:10
	 */

	use backend\helper\Common;

	/** @var $this \yii\web\View */

	$this->title = 'About - ' . Yii::$app->name;
?>
<div class="panel panel-default">
	<div class="panel-heading">About <?= Yii::$app->name ?></div>
	<div class="panel-body">
		<p>Version: <?= Common::getVersion() ?></p>

		<p>Created By <?= Common::getCreator() ?></p>

		<p><?php echo Yii::powered(); ?></p>

	</div>
</div>
