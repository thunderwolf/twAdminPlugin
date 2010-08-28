<div id="login-box" class="side-box dialog-box">
	<?php include_stylesheets_for_form($form) ?>
	<?php include_javascripts_for_form($form) ?>
	<div class="side-box-title">Logowanie</div>
	<div class="side-box-content">
		<?php if ($form->hasGlobalErrors()): ?>
		<?php echo $form->renderGlobalErrors() ?>
		<?php endif; ?>
		<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
			<?php echo $form->renderHiddenFields() ?>
			<?php echo $form['username']->renderLabel() ?>
			<?php if ($form['username']->hasError()): ?>
			<?php foreach ($form['username']->getError() as $error): ?><div><?php echo $error ?></div><?php endforeach; ?>
			<?php endif; ?>
			<?php echo $form['username'] ?>
			<?php if ($help = $form['username']->renderHelp()): ?>
			<div class="formHelp"><?php echo __($help, array(), 'signin') ?></div>
			<?php endif; ?>
			<?php echo $form['password']->renderLabel() ?>
			<?php if ($form['password']->hasError()): ?>
			<?php foreach ($form['password']->getError() as $error): ?><div><?php echo $error ?></div><?php endforeach; ?>
			<?php endif; ?>
			<?php echo $form['password'] ?>
			<?php if ($help = $form['password']->renderHelp()): ?>
			<div class="formHelp"><?php echo __($help, array(), 'signin') ?></div>
			<?php endif; ?>
			<label><?php echo $form['remember'] ?> Zapamiętaj mnie</label>
			<div class="right"><input type="submit" id="confirm" value="Zaloguj" /></div>
		</form>
	</div> <!-- .side-box-content -->
</div> <!-- #login-box -->