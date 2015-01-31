<div class="panel panel-default">
	<div class="install-header">
		<h2 class="panel-heading">
			<strong>System</strong> Check
		</h2>
	</div>

	<div class="panel-body">
		<p>In the following overview, you can see, if all the requirements are ready.</p>
		<hr/>

		<div class="list">
			<ul class="list-group">
				<?php foreach ($checks as $check) {
					?>
					<li class="list-group-item">
						<?php if ($check['state'] == 'OK') {
							?>
							<i class="glyphicon glyphicon-check"></i>
						<?php
						} elseif ($check['state'] == 'WARNING') {
							?>
							<i class="glyphicon glyphicon-warning-sign"></i>
						<?php
						} elseif ($check['state'] == 'ERROR') {
							?>
							<i class="glyphicon glyphicon-minus-sign"></i>
						<?php
						} ?>

						<strong><?= $check['title']; ?></strong>

						<?php if (isset($check['hint'])) { ?>
							<span>(Hint: <?= $check['hint']; ?>)</span>
						<?php } ?>
					</li>
				<?php
				}?>
			</ul>
		</div>

		<?php if (!$hasError) {
			?>
			<div class="alert alert-success">
				Congratulations! Everything is ok and ready to start over!
			</div>
		<?php
		}?>
		<hr/>

		<?= \yii\helpers\Html::a('<i class="glyphicon glyphicon-repeat"></i> ' . 'Check again', ['//installer/setup/prerequisites'], ['class' => 'btn btn-info']) ?>

		<?php if (!$hasError) { ?>
			<?= \yii\helpers\Html::a('Next' . ' <i class="glyphicon glyphicon-chevron-right"></i>', ['//installer/setup/database'], ['class' => 'btn btn-primary']) ?>
		<?php } ?>
	</div>
</div>