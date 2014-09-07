<?php
$computer_name = php_uname("n");

$envs = array(
    //"computer-hostname"=>"dev",
);

return isset($envs[$computer_name])?
    $envs[$computer_name]:
    "production";