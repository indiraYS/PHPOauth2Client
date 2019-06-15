<?php
require "init.php";
/**
 * Created by IntelliJ IDEA.
 * User: indy
 * Date: 15.06.19
 * Time: 23:50
 */

if (isset($_GET['code'])) {
    fetchData();
} else {

    goToAuthUrl();

}

echo "Operation Failed";