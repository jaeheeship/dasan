<?php $this->load->helper('url') ?>
<?php $this->load->helper('asset') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>IPAH</title>
<?echo common_css_asset('bootstrap/css/bootstrap.css')?>
<?echo common_css_asset('bootstrap/css/bootstrap-responsive.css')?>
<?echo common_css_asset('jquery/css/smoothness/jquery-ui-1.8.22.custom.css')?>
<?echo common_js_asset('jquery/js/jquery-1.7.2.min.js')?>
<?echo common_js_asset('jquery/js/jquery-ui-1.8.22.custom.min.js')?>
<style type="text/css">

</style>
</head>
<body>
	<div class="navbar navbar-inverse"
		style="background-color: black; position: static; margin-bottom: 0px;">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?=base_url()?>board">Dasan</a>
				<ul class="nav">
					<li><a href="<?=base_url()?>board">List</a></li>
					<li><a href="<?=base_url()?>board/register">Register</a></li>
					<li><a href="<?=base_url()?>board/category">Category</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div>
