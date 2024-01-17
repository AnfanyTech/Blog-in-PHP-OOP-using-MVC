<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5">
    <title>Mon Blog</title>
    <link rel="stylesheet" href="./css/app.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <div class=" bg-info text-center text-light fst-italic">PROJET DE BLOG EN PHP ORIENTE OBJET</div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Catégories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
<?php
use App\Helpers\Session;
$session = new Session;
if ($session->verifySessionExist('admin')):?>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> <?=ucfirst(strtolower($session->getSession('admin')->name))?></a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="?p=logoutAdmin">Se déconnecter</a></li>
                    </ul>
              <?php elseif($session->verifySessionExist('user')): ?>
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="#"> <?=ucfirst(strtolower($session->getSession('user')->name))?> </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="?p=logoutUser">Se déconnecter</a></li>
                    </ul>
              <?php else: ?>
                    <a class="nav-link active" aria-current="page" href="?p=connection"> Se connecter</a>
              <?php endif;?>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>
<?php

if (! empty($_SESSION) && (in_array('warning', $_SESSION) || in_array('success', $_SESSION) || in_array('info', $_SESSION))):?>
    <?php foreach ($_SESSION as $key => $message):?>
      <div class="container-sm">
        <div class="row">
          <div class="col-md-8">
            <div class="alert alert-<?=$key; ?>" role="alert">
              <?=$message;?>
            </div>
          </div>
        </div>
      </div>
   <?php endforeach; ?>
   <?php session_destroy(); ?>
<?php endif;?>
