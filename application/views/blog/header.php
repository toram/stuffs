<?php

  $base = base_url();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Blog codeigniter</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=$base?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=$base?>public/css/blog.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="<?=base_url()?>blog/index">Home</a>          
          <a class="blog-nav-item" href="<?=base_url()?>blog/add_post">Añadir post</a>
          <a class="blog-nav-item" href="<?=base_url()?>login">Admin</a>
        </nav>
      </div>
    </div>

    <div class="container">
    <div class=""><p> Logged as: <?=$brand ?> - <?=$model ?></p></div>
      <div class="blog-header">
        <h1 class="blog-title">El blog</h1>
        <p class="lead blog-description">Primer blog con codeigniter.</p>
      </div>

      <div class="row">
        <div class="col-sm-8 blog-main">