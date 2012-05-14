<?php
use_helper('I18N');
$ms = $sf_data->getRaw('ms');
$ts = $sf_data->getRaw('ts');
$menu = $sf_data->getRaw('menu');
$submenu = $sf_data->getRaw('submenu');
?>
<?php if($sf_user->isAuthenticated()): ?>
<style>
	body {
		padding-top: <?php if (empty($submenu)): ?>60<?php else: ?>90<?php endif; ?>px; /* 60px to make the container go all the way to the bottom of the topbar */
		padding-bottom: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	}
</style>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?php echo url_for('@homepage') ?>"><?php echo twAdmin::getProperty('site'); ?></a>
			<?php if ($sf_user->isAuthenticated() || !empty($ms) || !empty($ts)): ?>
			<ul class="nav pull-right">
				<?php foreach ($ms as $mitem): ?>
				<li<?php if ($mitem['select'] === true):?> class="active"<?php endif;?>><a href="<?php echo url_for($mitem['url']) ?>"><?php echo __($mitem['label'], array(), 'messages')?></a></li>
				<?php endforeach; ?>
				<li class="divider-vertical"></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Select module') ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php foreach ($ts as $titem): ?>
						<li><a href="<?php echo url_for($titem['url']) ?>"><?php echo __($titem['label'], array(), 'messages')?></a></li>
						<?php endforeach; ?>
					</ul>
				</li>
				<li class="divider-vertical"></li>
				<?php if ($sf_user->isAuthenticated() && twAdmin::getProperty('logout', false)): ?>
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
				<?php else: ?>
				<li><a href="#">You are logged as <strong><?php echo $sf_user->getUsername() ?></strong></a></li>
				<?php endif; ?>
				<?php if (!$sf_user->isAuthenticated() && twAdmin::getProperty('login', false)): ?>
				<li><a href="<?php echo url_for(twAdmin::getProperty('login_route')) ?>"">Sign In</a></li>
				<?php endif; ?>
			</ul>
			
			<?php if ($sf_user->isAuthenticated() || !empty($menu)): ?>
			<div class="nav-collapse">
				<ul class="nav">
					<?php foreach($menu as $item): ?>
					<li<?php if (isset($item['selected']) && $item['select'] === true):?> class="active"<?php endif;?>><a href="<?php echo url_for($item['url']) ?>"><?php echo __($item['label'], array(), 'messages')?></a></li>
					<?php endforeach; ?>
				</ul>
			</div><!--/.nav-collapse -->
			<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php if (!empty($submenu)): ?>
<div class="subnav subnav-fixed">
	<ul class="nav nav-pills">
		<?php foreach($submenu as $item): ?>
		<li<?php if (isset($item['selected']) && $item['select'] === true):?> class="active"<?php endif;?>><a href="<?php echo url_for($item['url']) ?>"><?php echo __($item['label'], array(), 'messages')?></a></li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>
<?php else: ?>
<div id="twadmin-top">
	<div class="<?php echo $container_type ?>">
		<img alt="Thunderwolf Logo" src="<?php echo twAdmin::getProperty('web_dir') . '/img/logo.png' ?>">
	</div>
</div>
<?php endif; ?>
