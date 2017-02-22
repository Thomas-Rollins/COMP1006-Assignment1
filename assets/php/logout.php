<!--
@author Thomas Rollins
comp1006_assignment1
contains the logout php script
-->
<?php
session_start();
session_destroy(); //destroys all sessions
?>
