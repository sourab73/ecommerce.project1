<?php

$x=microtime();
session_id($x);
session_start();

echo "<script>location='homePage/home.php'</script>";
?>