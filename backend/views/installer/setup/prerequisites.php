<div class="panel panel-default animated fadeIn">
	<!-- todo: change image url with php code -->
	<div class="install-header install-header-small" style="background-image: url('../../assets_b/img/install-header.jpg')">
		<h2 class="install-header-title"><strong>System</strong> Check</h2>
	</div>

	<div class="panel-body">
		<p>In the following overview, you can see, if all the requirements are ready.</p>
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

		<?php if (!$hasError) {
			?>
			<div class="alert alert-success">
				Congratulations! Everything is ok and ready to start over!
			</div>
		<?php
		} ?>
		<hr/>

		<?= \yii\helpers\Html::a('<i class="fa fa-repeat"></i> ' . 'Check again', ['//installer/setup/prerequisites'], ['class' => 'btn btn-info']) ?>

		<?php if (!$hasError) { ?>
			<?= \yii\helpers\Html::a('Next' . ' <i class="fa fa-arrow-circle-right"></i>', ['//installer/setup/database'], ['class' => 'btn btn-primary']) ?>
		<?php } ?>
	</div>
</div>