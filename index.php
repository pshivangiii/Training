<?php
echo "INCLUDED";
require_once('controllers\Controller.php');
$controllers=new Controller();
$controllers->invoke();
?>
