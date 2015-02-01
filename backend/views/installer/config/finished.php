<div class="panel panel-default animated fadeIn">
	<!-- todo: change image url with php code -->
	<div class="install-header install-header-small" style="background-image: url('../../assets_b/img/install-header.jpg')">
		<h2 class="install-header-title"><strong>Setup</strong> Complete</h2>
	</div>
	<div class="panel-body text-center">
		<p class="lead"><strong>Congratulations!</strong> You're done.</p>

		<p>The installation completed successfully! Have fun with your new application.</p>

		<div class="text-center">
			<br/>
			<?= \yii\helpers\Html::a('Sign In', Yii::$app->urlManager->createUrl('/site/index'), ['class' => 'btn btn-success']) ?>
		</div>
	</div>
</div>