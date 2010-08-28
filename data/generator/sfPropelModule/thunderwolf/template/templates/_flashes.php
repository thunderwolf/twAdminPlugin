[?php if ($sf_user->hasFlash('notice')): ?]
  <div class="announce success">[?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?]</div>
[?php endif; ?]

[?php if ($sf_user->hasFlash('warning')): ?]
  <div class="announce warning">[?php echo __($sf_user->getFlash('warning'), array(), 'sf_admin') ?]</div>
[?php endif; ?]

[?php if ($sf_user->hasFlash('error')): ?]
  <div class="announce error">[?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?]</div>
[?php endif; ?]
