<div id="name-form" class="panel panel-default animated fadeIn">
	<!-- todo: change image url with php code -->
	<div class="install-header install-header-small" style="background-image: url('../../assets_b/img/install-header.jpg')">
		<h2 class="install-header-title"><strong>Application's</strong> Name</h2>
	</div>

	<div class="panel-body">
		<p>Of course, your new application need a name. Please change the default name with one you like.</p>

		<?php
			$form = \yii\widgets\ActiveForm::begin([
				                                       'id'                   => 'basic-form',
				                                       'enableAjaxValidation' => true,
			                                       ]);
		?>

		<div class="form-group">
			<?=
				$form->field($model, 'name')->textInput([
					                                        'autofocus'    => 'on',
					                                        'autocomplete' => 'off',
					                                        'class'        => 'form-control']) ?>
		</div>

		<div class="form-group">
			<?=
				$form->field($model, 'email')->textInput([
					                                        'autocomplete' => 'off',
					                                        'class'        => 'form-control']) ?>
		</div>

		<hr/>

		<?= \yii\helpers\Html::submitButton('Next', ['class' => 'btn btn-primary']) ?>

		<?php \yii\widgets\ActiveForm::end(); ?>
	</div>
</div>