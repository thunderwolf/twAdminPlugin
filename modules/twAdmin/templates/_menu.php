<?php
use_helper('I18N');
$menu = $sf_data->getRaw('menu');
$submenu = $sf_data->getRaw('submenu');
?>
<?php if ($sf_user->isAuthenticated() || !empty($menu)): ?>
<div id="layout-menu-main" class="layout-row"><div class="layout-box">
<ul>
<?php foreach($menu as $item): ?>
<li<?php if (isset($item['selected']) && $item['selected'] === true): ?> class="selected"<?php endif; ?>><a href="<?php echo url_for($item['url']) ?>"><?php echo __($item['label'], array(), 'messages')?></a></li>
<?php endforeach; ?>
</ul>
</div></div> <!-- #layout-menu-main -->
<?php if (!empty($submenu)): ?>
<div id="layout-menu-sub" class="layout-row"><div class="layout-box">
<ul>
<?php foreach($submenu as $item): ?>
<li<?php if (isset($item['selected']) && $item['selected'] === true): ?> class="selected"<?php endif; ?>><a href="<?php echo url_for($item['url']) ?>"><?php echo str_replace(' ', '&nbsp;', __($item['label'], array(), 'messages')) ?></a></li>
<?php endforeach; ?>
</ul>
</div></div> <!-- #layout-menu-sub -->
<?php else: ?>
<div id="layout-menu-sub-empty" class="layout-row"></div>
<?php endif; ?>
<?php endif; ?>