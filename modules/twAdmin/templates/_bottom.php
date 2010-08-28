<?php use_helper('I18N'); ?>
<?php
$start_year = twAdmin::getProperty('site_start_year');
$act_year = date('Y');
if ($start_year == $act_year) {
	$years_period = $start_year;
} else {
	$years_period = $start_year.'-'.$act_year;
}
?>
<div id="layout-bottom" class="layout-row"><div class="layout-box"><?php echo __('Copyright &copy; %years_period% %site_name%. All rights reserved', array('%years_period%' => $years_period, '%site_name%' => twAdmin::getProperty('site'))); ?></div></div> <!-- #layout-bottom -->