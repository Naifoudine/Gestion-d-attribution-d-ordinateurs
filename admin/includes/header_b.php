<?php ini_set('display_errors', 'on'); ?>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="generator" content="Codeply" />
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>Tableau de bord</title>
  <base target="_self" />

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">

  <style>
    #body-row {
      margin-left: 0;
      margin-right: 0;
    }

    #sidebar-container {
      min-height: 100vh;
      background-color: #333;
      padding: 0;
    }

    /* Sidebar sizes when expanded and expanded */
    .sidebar-expanded {
      width: 230px;
    }

    .sidebar-collapsed {
      width: 60px;
    }

    /* Menu item*/
    #sidebar-container .list-group a {
      height: 50px;
      color: white;
    }

    /* Submenu item*/
    #sidebar-container .list-group .sidebar-submenu a {
      height: 45px;
      padding-left: 30px;
    }

    .sidebar-submenu {
      font-size: 0.9rem;
    }

    /* Separators */
    .sidebar-separator-title {
      background-color: #333;
      height: 35px;
    }

    .sidebar-separator {
      background-color: #333;
      height: 25px;
    }

    .logo-separator {
      background-color: #333;
      height: 60px;
    }

    /* Closed submenu icon */
    #sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
      content: " \f0d7";
      font-family: FontAwesome;
      display: inline;
      text-align: right;
      padding-left: 10px;
    }

    /* Opened submenu icon */
    #sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
      content: " \f0da";
      font-family: FontAwesome;
      display: inline;
      text-align: right;
      padding-left: 10px;
    }
  </style>
</head>

<body id="top">