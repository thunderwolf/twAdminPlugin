<?php if (isset($this->params['css']) && ($this->params['css'] !== false)): ?>
[?php use_stylesheet('<?php echo $this->params['css'] ?>', 'first') ?]
<?php elseif(!isset($this->params['css'])): ?>
[?php use_stylesheet('<?php echo sfConfig::get('tw_admin_module_web_dir').'/css/main.css' ?>', 'first') ?]
<?php endif; ?>
[?php use_javascript('<?php echo sfConfig::get('tw_admin_module_web_dir').'/js/jquery-1.4.2.min.js' ?>', 'first') ?]
[?php use_javascript('<?php echo sfConfig::get('tw_admin_module_web_dir').'/js/main.js' ?>', 'first') ?]