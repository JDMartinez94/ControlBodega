<?php
session_start();
echo $_SESSION["user"]["id_rol"];
session_destroy();
?>