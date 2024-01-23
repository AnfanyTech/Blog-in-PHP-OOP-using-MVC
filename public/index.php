<?php

use App\Controller\PostsController;

require_once  "../vendor/autoload.php";

// The routing of the application

$p = "";

if (isset($_GET['p'])) {
    $p = $_GET['p'];
}

if ($p === '') {
    return (new PostsController())->index();
}elseif ($p === "read") {
    return (new PostsController())->read($_GET["id"]);
}