<?php

session_start();
unset($_SESSION['userid']);
unset($_SESSION['username']);

header("location:./../index.php?error=logedout");
