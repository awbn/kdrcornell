<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<!DOCTYPE html>
<html lang="<?php echo I18n::lang();?>">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">


  <!-- Stylesheets -->
  <link href="/media/style/bootstrap.css" rel="stylesheet">
  <link href="/media/style/font-awesome.css" rel="stylesheet">
  <link href="/media/style/prettyPhoto.css" rel="stylesheet">
  <!-- Parallax slider -->
  <link rel="stylesheet" href="/media/style/slider.css">
  <!-- Flexslider -->
  <link rel="stylesheet" href="/media/style/flexslider.css">

  <link href="/media/style/style.css" rel="stylesheet">

  <!-- Colors - Orange, Purple, Light Blue (lblue), Red, Green and Blue -->
  <link href="/media/style/lblue.css" rel="stylesheet">

  <link href="/media/style/bootstrap-responsive.css" rel="stylesheet">
  <link href="/media/style/kdr.css" rel="stylesheet">
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="/media/js/html5shim.js"></script>
  <![endif]-->

  <link rel="shortcut icon" href="/media/img/favicon.ico">
</head>

<body>
<header>
  <div class="container">
    <div class="row">
      <div class="span6">
        <div class="logo">
          <h1><a href="<?php echo URL::site(''); ?>">Kappa <span class="color">Delta</span> <span class="orange">Rho</span></a></h1>
          <div class="hmeta">Beta Chapter at Cornell University</div>
        </div>
      </div>
      <div class="span6 coatofarms">
      	&nbsp;
      </div>
    </div>
  </div>
</header>

<?php echo $nav ?>

<div class="content">
  <div class="container">

      <?php echo $content; ?>

    </div>
</div>

<div class="bottom-bar"></div>

<footer>
  <div class="container">
    <div class="row">
      <div class="span8">
          <div>
            <h6><em>Honor Super Omnia</em></h6>
            <p>&copy; 2007 - <?php echo date("Y"); ?> 
            	<a href="<?php echo URL::site(''); ?>">Beta Chapter of Kappa Delta Rho</a>
            	<br>
            	<a href="http://www.kdr.com">&Kappa;&Delta;&Rho; National</a> | 
            	<a href="http://www.cornell.edu">Cornell University</a> | 
            	<a href="http://intraweb.kdrcornell.com">&Kappa;&Delta;&Rho; Intraweb</a> | 
            	<a href="<?php echo URL::site('contact'); ?>">Contact Us</a>
            </p>
          </div>
      </div>
      <div class="span4 coatofarms">
        &nbsp;
      </div>
    </div>
  <div class="clearfix"></div>
  </div>
</footer>

<!-- JS -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/media/js/bootstrap.js"></script> 
<script src="/media/js/jquery.isotope.js"></script> <!-- Isotope for gallery -->
<script src="/media/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto for images -->
<script src="/media/js/jquery.cslider.js"></script> <!-- Parallax slider -->
<script src="/media/js/modernizr.custom.28468.js"></script>
<script src="/media/js/filter.js"></script> <!-- Filter for support page -->
<script src="/media/js/cycle.js"></script> <!-- Cycle slider -->
<script src="/media/js/jquery.flexslider-min.js"></script> <!-- Flex slider -->
<script src="/media/js/easing.js"></script> <!-- Easing -->
<script src="/media/js/custom.js"></script>

</body>
</html>