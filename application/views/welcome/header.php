<?php $this->load->helper('url') ?>
<?php $this->load->helper('asset') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>다산여행</title>
<?echo common_css_asset('bootstrap/css/bootstrap.css')?>
<?echo common_css_asset('bootstrap/css/bootstrap-responsive.css')?>
<?echo common_css_asset('jquery/css/smoothness/jquery-ui-1.8.22.custom.css')?>
<?echo common_css_asset('slideshow/css/slideshows.css')?>
<?echo common_js_asset('jquery/js/jquery-1.7.2.min.js')?>
<?echo common_js_asset('jquery/js/jquery-ui-1.8.22.custom.min.js')?>
<?echo common_js_asset('slideshow/js/jquery.cycle.all.js')?>
<?echo common_js_asset('slideshow/js/jquery.easing.1.3.js')?>
<style type="text/css">
ul{
	list-style-type: none;
	display: list-item;
	padding: 0;
}

.clearfix:after {
	content: ".";
	display: block;
	clear: both;
	visibility: hidden;
	line-height: 0;
	height: 0;
}
 
.clearfix {
	display: inline-block;
}

.center{
	margin-left: auto;
	margin-right: auto;
	text-align: center;
}

.top{
	margin-top: 10px;
}

.nav{
	display: inline;
	width: 80px;
	margin: 10px;
}

.wrapper{  
	position:relative;
}

.description{  
	position:absolute;
	bottom:0px;
	left:0px;
	display:none;
	background-color:black;
	font-family: 'tahoma';
	font-size:15px;
	color:white;
	margin-top: -40px;
	text-align: center;
	height: 40px;
}  

.description_content{  
	padding: 10px;
}

.line_title{ 
	margin-bottom: 30px; 
	font-size: 20px;
	font-weight: bold;
	color: rgb(100, 97, 97);
}

.first_line{
	display:inline
	width: 300px;
	height: 210px;
	float: left;
	margin : 0 10px;
	text-align: left;
}

.second_line{
	display:inline
	width: 220px;
	height: 280px;
	float: left;
	margin : 0 10px;
	text-align: left;
}

.image_title{
	font-weight: bold;
}

.image_sub_title{
	margin-left: 10px;
	color: #ccc;
	font-size: 11px;
}

.footer{
	padding: 30px 0;
	margin-top: 70px;
	border-top: 1px solid #e5e5e5;
	background-color: #f5f5f5;
}

</style>
</head>
<body>	
	<div class="loggo center top">
		<a href="<?=base_url();?>welcome"><img class="loggo_img" src="<?=base_url();?>common/assets/dasan/img/loggo.gif"></a>
	</div>
	<div class="navi center top">
		<ul>
			<li class="nav"><a>회사소개</a></li>
			<li class="nav"><a>연수</a></li>
			<li class="nav"><a>투어</a></li>
			<li class="nav"><a>다산기획</a></li>
			<li class="nav"><a>공지사항</a></li>
		</ul>
	</div>

