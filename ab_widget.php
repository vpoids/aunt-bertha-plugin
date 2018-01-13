<?php
$ab_widget_html = '
<html class="no-js" lang="en"><!--<![endif]--><head>
  <link rel="stylesheet" href="/wp-content/plugins/aunt_bertha/js/bootstrap.min.css">
  <link rel="stylesheet" href="/wp-content/plugins/aunt_bertha/js/images.css">
  <link rel="stylesheet" href="/wp-content/plugins/aunt_bertha/js/widget-style.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <style>
    .widget-auntbertha-tagline {width:90%;}
    .widget-auntbertha-form {width:90%;}
  </style>
  </head>

 <!-- AUNT BERTHA (DEFAULT) WIDGET-->
  <body style="">
	<div id="subdomain" value="www"></div>
    <div id="search_info" data-top-level="" data-service-tag=""></div>
	<div class="widget-auntbertha">

		<div class="widget-auntbertha-top" style="background-color:#2F8BC5">
			<div class="container-fluid">
				<div class="row-fluid">
						<i class="span1 fa fa-medkit"></i>
						<i class="span1 fa fa-bus"></i>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="widget-auntbertha-middle">

					<div class="widget-auntbertha-tagline">
            '.$instructions.'
					</div>

					<div class="widget-auntbertha-form">
						<form role="search" class="form-horizontal" method="get" id="search-form">
						  <div class="zip_search_bar">
					 			<div class="control-group">
					 				<label class="sr-only" for="postal">Zip Code</label>
					 				<input type="text" placeholder="Zip" class="required zipcode input-gigantic numeric" style="width:120px;" id="postal" name="postal" maxlength="5">
					 				<button type="submit" class="btn btn-large btn-huge btn-primary" style="background-color:#2F8BC5; background-image:none;">Search</button>
						  	</div>
						  </div>
						</form>
					</div>

				</div>
			</div>
		</div>

		<div class="widget-auntbertha-bottom" style="background-color:#2F8BC5">
			<div class="container-fluid">
				<div class="row">
					<a href="http://www.auntbertha.com" target="_blank" style="color:white;" class="powered-by-text">powered by Aunt Bertha</a>&nbsp;
					<a href="http://www.auntbertha.com" target="_blank"><i class="icon-tiny-bertha"></i></a>
				</div>
			</div>
		</div>

	</div>

  <script type="text/javascript" src="/wp-content/plugins/aunt_bertha/js/jquery.numeric.js"></script>
  <script type="text/javascript" src="/wp-content/plugins/aunt_bertha/js/widgets.js?v=2"></script>
  <script type="text/javascript" src="/wp-content/plugins/aunt_bertha/js/common_utilities.js"></script>
</body></html>';