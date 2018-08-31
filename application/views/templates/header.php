<!DOCTYPE html>
<html>
  <head>
    <title>TulipWeb - Espalhe as Boas-Novas</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
    <!--Import Google Icon Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <nav class="nav-extended black">
    <div class="nav-wrapper container">
      <a class="brand-logo" href="<?php echo site_url(); ?>organizations/index">
        <img src="<?php echo base_url(); ?>assets/images/other/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        TulipWeb
      </a>

      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="<?php echo site_url(); ?>organizations/index">Início</a></li>
        <li><a class="modal-trigger" href="#modalAbout">Sobre</a></li>
      </ul>
      <ul class="sidenav" id="mobile-demo">
        <li><a href="<?php echo site_url(); ?>organizations/index">Início</a></li>
        <li><a class="modal-trigger" href="#modalAbout">Sobre</a></li>
      </ul>
    </div>