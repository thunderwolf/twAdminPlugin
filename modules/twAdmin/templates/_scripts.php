<?php
$parameterHolder = twAdminJavaScriptHolder::getParameterHolder();
$data = $parameterHolder->getAll();
foreach ($data as $val) {
    echo $val;
}
