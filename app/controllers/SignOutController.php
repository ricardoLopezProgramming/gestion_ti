<?php
session_start();
session_destroy();
header("Location: /public/?page=sign_in");
exit;
