<?php $this->load->helper('url') ?>
<?php $this->load->helper('asset') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>다산여행</title>
<?echo common_css_asset('dasan/css/menu.css')?>
<?echo common_js_asset('jquery/js/jquery-1.7.2.min.js')?>
<?echo common_js_asset('jquery/js/jquery-ui-1.8.22.custom.min.js')?>
<?echo common_js_asset('slideshow/js/jquery.cycle.all.js')?>
<?echo common_js_asset('slideshow/js/jquery.easing.1.3.js')?>
<?echo common_js_asset('selectivizr/selectivizr.js')?>
<?echo common_css_asset('bootstrap/css/bootstrap.css')?>
<?echo common_css_asset('bootstrap/css/bootstrap-responsive.css')?>
<?echo common_css_asset('jquery/css/smoothness/jquery-ui-1.8.22.custom.css')?>
<?echo common_css_asset('slideshow/css/slideshows.css')?>

<style type="text/css">
ul{
	list-style-type: none;
	display: list-item;
	padding: 0;
	margin: 0;
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

.navi{ width: 100%; }
.submenu{ width: 100%; }

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
	margin : 0 5px;
	text-align: left;
}

.second_line{
	display:inline
	width: 220px;
	height: 280px;
	float: left;
	margin : 0 16px;
	text-align: left;
}

.footer{
	height: 100px;
	padding: 50px 0;
	margin-top: 130px;
	border-top: 1px solid #e5e5e5;
	background-color: #47494c;
	color: #ffffff;
}

.sidebar { margin-left: 142px; margin-right: -132px; padding: 0; width:90px; float:left; }
.sidebar legend { font-size: 22px; }
.sidebar li a { color: #333333; }
</style>
</head>
<body>	
	<div class="loggo center top">
    <?php foreach($logo as $key => $val) :?>     
		<a href="<?=base_url();?>welcome"><img class="loggo_img" src="<?=base_url().$val->full_path;?>"></a>
    <?php endforeach ;?>
	</div>
	<div class="navi clearfix center top">
		<ul id="menu" class="clearfix center top">
			<li class="intro"><a <?php if($sel=="3"){?>class="selected"<?php }?> href="<?=base_url();?>page/go/56">intro</a></li>
			<li class="training"><a <?php if($sel=="4"){?>class="selected"<?php }?> href="<?=base_url();?>page/go/61">training</a></li>
			<li class="tour"><a <?php if($sel=="5"){?>class="selected"<?php }?> href="<?=base_url();?>page/go/62">tour</a></li>
			<li class="planning"><a <?php if($sel=="6"){?>class="selected"<?php }?> href="<?=base_url();?>page/go/65">planning</a></li>
			<li class="board"><a href="">board</a></li>
		</ul>
<div class="submenu clearfix center">
<div id="navigator" class="clearfix center">
    <?php foreach($menu as $key => $sub) :?>     
        <ul>
        <?php foreach($sub as $key => $val) :?>     
            <li><a href="<?=base_url()."page/go/".$val['no'];?>"><?=$val['title']?></a></li>    
        <?php endforeach ;?>
        </ul>
    <?php endforeach ;?>
        <ul>
            <li><a href="<?=base_url()."page/board/";?>">공지사항</a></li>    
        </ul>
    </div>
    </div>
    </div>
   <div>
   
