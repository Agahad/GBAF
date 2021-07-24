test variable.php
<?php
$test="123test";

if(preg_match("#test#", $test))
{
	echo "la variable est reconnu";
}

?>