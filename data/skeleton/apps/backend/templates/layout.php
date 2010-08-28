<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<?php include_http_metas() ?>
		<?php include_metas() ?>
		<?php include_title() ?>
		<link rel="shortcut icon" href="/favicon.ico" />
		<?php include_stylesheets() ?>
		<?php include_javascripts() ?>
	</head>
	<body>
		<div id="wrapper">
<?php include_component('twAdmin', 'top') ?>
<?php include_component('twAdmin', 'menu') ?>
			<div id="layout-content" class="layout-row">
				<div class="layout-box">
<?php echo $sf_content ?>
				</div> <!-- .layout-box -->
			</div> <!-- #layout-content -->
<?php include_partial('twAdmin/bottom') ?>
		</div> <!-- #wrapper -->
	</body>
</html>