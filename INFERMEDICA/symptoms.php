<?php

header('Access-Control-Allow-Origin: *');//http://stackoverflow.com/questions/20035101/no-access-control-allow-origin-header-is-present-on-the-requested-resource
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');//http://stackoverflow.com/questions/13400594/understanding-xmlhttprequest-over-cors-responsetext?lq=1

require_once 'infermedica.php';
// echo "apples";
echo getJSON('symptoms');
 

?>