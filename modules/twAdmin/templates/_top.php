<?php
use_helper('I18N');
$ms = $sf_data->getRaw('ms');
$ts = $sf_data->getRaw('ts');
?>
<div id="layout-top" class="layout-row"><div class="layout-box">
	<h1><a href="/" title="Powrót do strony głównej">Strona główna</a></h1>
<?php if ($sf_user->isAuthenticated() || !empty($ms) || !empty($ts)): ?>
	<div class="text-line">
		<?php if ($sf_user->isAuthenticated()): ?>Jesteś zalogowany jako <strong><?php echo $sf_user->getUsername() ?></strong><?php endif; ?>
		<?php if ($sf_user->isAuthenticated() && twAdmin::getProperty('logout', false)): ?>
		 | <a href="<?php echo url_for(twAdmin::getProperty('logout_route')) ?>" class="link-color-1">Wyloguj</a>
		<?php endif; ?>
		<?php if (!$sf_user->isAuthenticated() && twAdmin::getProperty('login', false)): ?>
		<a href="<?php echo url_for(twAdmin::getProperty('login_route')) ?>" class="link-color-2">Zaloguj</a>
		<?php endif; ?>
		<br/>

		<?php $i = 0; ?>
		<?php foreach ($ms as $mitem): ?>
		<?php if ($i > 0): ?> | <?php endif; ?>
		<a href="<?php echo url_for($mitem['url']) ?>" class="link-color-2"><?php echo __($mitem['label'], array(), 'messages')?></a>
		<?php $i++; ?>
		<?php endforeach; ?>
		<?php $items = count($ts); ?>
		<?php if ($items > 0): ?> | <?php endif; ?>
		<?php if ($items > 3): ?>
		<select name="path" onchange="location=this.value;">
			<option value="<?php echo url_for('@homepage') ?>"><?php echo __('Select module') ?></option>
			<?php foreach ($ts as $titem): ?>
			<option value="<?php echo url_for($titem['url']) ?>"<?php if ($titem['select'] === true): ?> selected="selected"<?php endif; ?>><?php echo __($titem['label'], array(), 'messages')?></option>
			<?php endforeach; ?>
		</select>
		<?php elseif ($items > 0 && $items <= 3): ?>
		<?php $i = 0; ?>
		<?php foreach ($ts as $titem): ?>
		<?php if ($i > 0): ?> | <?php endif; ?>
		<a href="<?php echo url_for($titem['url']) ?>" class="link-color-3"><?php echo __($titem['label'], array(), 'messages')?></a>
		<?php $i++; ?>
		<?php endforeach; ?>
		<?php endif; ?>
	</div>
<?php endif; ?>
</div></div> <!-- #layout-top -->