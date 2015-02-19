<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 20-02-2015
	 * Time: 00:34
	 */

	use yii\helpers\Html;

	/** @var $this \yii\web\View */
	/** @var $checks \abhimanyu\installer\helpers\SystemCheck */
	/** @var $hasError \abhimanyu\installer\helpers\SystemCheck */

	$this->title = 'Self Test - ' . Yii::$app->name;
?>

<div class="panel panel-default">
	<div class="panel-heading">Self-Test</div>

	<div class="panel-body">
		<p>Checking <?= Yii::$app->name ?> software prerequisites</p>
		<hr/>

		<div class="prerequisites-list">
			<ul>
				<?php foreach ($checks as $check) {
					?>
					<li>
						<?php if ($check['state'] == 'OK') {
							?>
							<i class="fa fa-check-circle check-ok animated bounceIn"></i>
						<?php
						} elseif ($check['state'] == 'WARNING') {
							?>
							<i class="fa fa-exclamation-triangle check-warning animated swing"></i>
						<?php
						} elseif ($check['state'] == 'ERROR') {
							?>
							<i class="fa fa-minus-circle check-error animated wobble"></i>
						<?php
						} ?>

						<strong><?= $check['title']; ?></strong>

						<?php if (isset($check['hint'])) { ?>
							<span>(Hint: <?= $check['hint']; ?>)</span>
						<?php } ?>
					</li>
				<?php
				} ?>
			</ul>
		</div>

		<hr/>

		<div class="well">
			Database Updated!
		</div>

		<?= Html::a('<i class="fa fa-repeat"></i> ' . 'Re-Run Tests', ['//admin/setting/self-test'], ['class' => 'btn
		btn-info']) ?>
	</div>
</div>