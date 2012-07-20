<?php
use_helper('I18N');
$module = $sf_data->getRaw('module');
$menu = $sf_data->getRaw('menu');
$submenu = $sf_data->getRaw('submenu');
?>
<?php if ($sf_user->isAuthenticated()) : ?>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?php echo url_for('@homepage') ?>"><?php echo twAdmin::getProperty('site'); ?></a>
			<?php if ($sf_user->isAuthenticated() || !empty($ms) || !empty($ts)) : ?>
			<ul class="nav pull-right">
				<li class="divider-vertical"></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Select module') ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php foreach ($module as $titem) : ?>
						<li><a href="<?php echo url_for($titem['url']) ?>"><?php echo __($titem['label'], array(), 'messages') ?></a></li>
						<?php endforeach; ?>
					</ul>
				</li>
				<li class="divider-vertical"></li>
				<?php if ($sf_user->isAuthenticated() && twAdmin::getProperty('logout', false)) : ?>
				<li>
					<div class="btn-group pull-right">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i> <?php echo $sf_user->getUsername() ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Profile</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo url_for(twAdmin::getProperty('logout_route')) ?>">Sign Out</a></li>
						</ul>
					</div>
				</li>
				<?php else : ?>
				<li><a href="#">You are logged as <strong><?php echo $sf_user->getUsername() ?></strong></a></li>
				<?php endif; ?>
				<?php if (!$sf_user->isAuthenticated() && twAdmin::getProperty('login', false)) : ?>
				<li><a href="<?php echo url_for(twAdmin::getProperty('login_route')) ?>"">Sign In</a></li>
				<?php endif; ?>
			</ul>
			
			<?php if ($sf_user->isAuthenticated() || !empty($menu)) : ?>
			<div class="nav-collapse">
				<ul class="nav">
					<?php foreach ($menu as $item) : ?>
					<li<?php if ($item['select'] === true) : ?> class="active"<?php endif; ?>><a href="<?php echo url_for($item['url']) ?>"><?php echo __(
					$item['label'], array(), 'messages') ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div><!--/.nav-collapse -->
			<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php if (!empty($submenu)) : ?>
<div class="<?php echo $container_type ?>">
	<ul class="nav nav-pills">
		<?php foreach ($submenu as $item) : ?>
		<li<?php if ($item['select'] === true) : ?> class="active"<?php endif; ?>>
			<a href="<?php echo url_for($item['url']) ?>"><?php echo __($item['label'], array(), 'messages') ?></a>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>
<?php else : ?>
<div id="twadmin-top">
	<div class="<?php echo $container_type ?>">
		<img alt="Thunderwolf Logo" src="<?php echo twAdmin::getProperty('web_dir') . '/img/logo.png' ?>">
	</div>
</div>
<?php endif; ?>
