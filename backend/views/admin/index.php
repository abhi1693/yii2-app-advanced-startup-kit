<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 15-02-2015
	 * Time: 10:51
	 */

	use abhimanyu\systemInfo\SystemInfo;

	/** @var $this \yii\web\View */

	$this->title = 'Admin Panel - ' . Yii::$app->name;

	// Get System Information
	$systemInfo = new SystemInfo();
	$systemInfo = $systemInfo::getInfo();
?>

<div id="system-information">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<i class="fa fa-hdd-o"></i>

					<h3 class="box-title">Processor</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table">
						<tr>
							<td>Model</td>
							<td><?= $systemInfo::getCpuModel() ?></td>
						</tr>

						<tr>
							<td>Architecture</td>
							<td><?= $systemInfo::getCpuArchitecture() ?></td>
						</tr>

						<tr>
							<td>No. of Cores</td>
							<td><?= $systemInfo::getCpuCores() ?></td>
						</tr>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<i class="fa fa-server"></i>

					<h3 class="box-title">Server</h3>
				</div>

				<div class="box-body">
					<table class="table">
						<tr>
							<td>OS</td>
							<td><?= $systemInfo::getOS() ?></td>
						</tr>

						<tr>
							<td>Server System</td>
							<td><?= $systemInfo::getServerSoftware() ?></td>
						</tr>

						<tr>
							<td>Load Average</td>
							<td><?= $systemInfo::getLoad() ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-12">
			<div class="box box-primary">
				<div class="box-header">
					<i class="fa fa-floppy-o"></i>

					<h3 class="box-title">Memory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table">
						<tr>
							<td>Total Memory</td>
							<td><?= Yii::$app->formatter->asShortSize($systemInfo::getTotalMemory()) ?></td>
						</tr>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>

		<div class="col-lg-4 col-md-6 col-sm-12">
			<div class="box box-primary">
				<div class="box-header">
					<i class="fa fa-database"></i>

					<h3 class="box-title">Software</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table">
						<tr>
							<td>PHP</td>
							<td><?= $systemInfo::getPhpVersion() ?></td>
						</tr>

						<tr>
							<td>DB</td>
							<td><?= $systemInfo::getDbType() ?></td>
						</tr>

						<tr>
							<td>DB Version</td>
							<td><?= $systemInfo::getDbVersion() ?></td>
						</tr>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>

		<div class="col-lg-4 col-md-6 col-sm-12">
			<div class="box box-primary">
				<div class="box-header">
					<i class="fa fa-cogs"></i>

					<h3 class="box-title">Framework</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table">
						<tr>
							<td>Name</td>
							<td><?= Yii::powered() ?></td>
						</tr>
						<tr>
							<td>Version</td>
							<td><?= Yii::getVersion() ?></td>
						</tr>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</div>