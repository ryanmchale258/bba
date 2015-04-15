<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="
      <?php
        if(isset($pgdata)){
          echo $pgdata->pages_meta;
        }else{
          echo "Barker Blagrave &amp; Associates are a Dietetics Professional Corporation specializing in Long Term Care operating in the greater London Ontario area.";
        }
       ?>
    " />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon">
    <title>
      <?php
        if(isset($pgTitle)){
          echo $pgTitle;
        }else{
          echo $pgdata->pages_title;
        }
      ?>
     | Barker, Blagrave &amp; Associates</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
    <script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
    <!-- fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:900,700,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:700,400' rel='stylesheet' type='text/css'>
  </head>
      <body class="<?php if(isset($bodyclass)){ echo $bodyclass; } ?>">