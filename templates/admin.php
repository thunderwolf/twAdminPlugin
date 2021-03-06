<!DOCTYPE html>
<html>
<head>
    <?php include_http_metas() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="<?php echo twAdmin::getProperty('web_dir') . '/favicon.ico' ?>"/>
    <?php include_stylesheets() ?>
    <?php if ($sf_user->isAuthenticated()) : ?>
        <style>
            body {
                padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
                padding-bottom: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
        </style>
        <link href="<?php echo twAdmin::getProperty('web_dir') . '/css/bootstrap-responsive'
            . ((sfContext::getInstance()->getConfiguration()->getEnvironment() == 'dev') ? '' : '.min') . '.css'; ?>"
              rel="stylesheet">
    <?php endif; ?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<?php
if (!$sf_user->isAuthenticated()) {
    $container_type = 'container';
} else {
    $container_type = 'container-fluid';
}
?>
<?php include_component('twAdmin', 'menu', array(
    'container_type' => $container_type
)) ?>
<div class="<?php echo $container_type ?>">
    <?php echo $sf_content ?>
</div>
<!-- /container -->
<?php include_component('twAdmin', 'footer', array(
    'container_type' => $container_type
)) ?>
<?php include_javascripts() ?>
<?php if (in_array('twMediaUploader', sfConfig::get('sf_enabled_modules', array()))) : ?>
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
    <!--[if gte IE 8]>
    <script src="/twMediaPlugin/jqfu/js/cors/jquery.xdr-transport.js"></script><![endif]-->
<?php endif; ?>
<script type="text/javascript">
    $('[rel="tooltip"]').tooltip();
    $('[rel="datepicker"]').datepicker();
    <?php include_component('twAdmin', 'scripts') ?>
</script>
</body>
</html>
