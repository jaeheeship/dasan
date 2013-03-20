<?php $this->load->helper('url') ?>
<?php $this->load->helper('asset') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>다산여행</title>
<?echo common_css_asset('dasan/css/style.css')?>
<?echo common_css_asset('dasan/css/menu.css')?>
<?echo common_css_asset('dasan/css/board.css')?>
<?echo common_css_asset('dasan/css/slideshow.css')?>
<?echo common_js_asset('jquery/js/jquery-1.7.2.min.js')?>
<?echo common_js_asset('jquery/js/jquery-ui-1.8.22.custom.min.js')?>
<?echo common_js_asset('selectivizr/selectivizr.js')?>
<?echo common_css_asset('bootstrap/css/bootstrap.css')?>
<?echo common_css_asset('bootstrap/css/bootstrap-responsive.css')?>
<?echo common_css_asset('jquery/css/smoothness/jquery-ui-1.8.22.custom.css')?>
</head>
<body>	
	<div class="logo center">
    <?php foreach($logo as $key => $val) :?>     
		<a href="<?=base_url();?>welcome"><img class="loggo_img" src="<?=base_url().$val->full_path;?>" style="width:<?=$val->image_width;?>px; height:<?=$val->image_height;?>px;"></a>
    <?php endforeach ;?>
	</div>
	<div class="navi clearfix center">
		<ul id="menu" class="navigation clearfix center">
			<li class="navigation intro"><a <?php if($sel=="3"){?>class="navigation selected"<?php }?> href="<?=base_url();?>page/go/58">intro</a></li>
			<li class="navigation training"><a <?php if($sel=="4"){?>class="navigation selected"<?php }?> href="<?=base_url();?>page/go/61">training</a></li>
			<li class="navigation tour"><a <?php if($sel=="5"){?>class="navigation selected"<?php }?> href="<?=base_url();?>page/go/62">tour</a></li>
			<li class="navigation planning"><a <?php if($sel=="6"){?>class="navigation selected"<?php }?> href="<?=base_url();?>page/go/65">planning</a></li>
			<li class="navigation board"><a <?php if($sel=="7"){?>class="navigation selected"<?php }?> href="<?=base_url();?>page/board">board</a></li>
		</ul>
   </div>
<div class="submenu navigation clearfix center">
<div id="navigator" class="navigation clearfix center">
    <?php foreach($menu as $key => $sub) :?>     
        <ul class="navigation">
        <?php foreach($sub as $key => $val) :?>     
            <li class="navigation"><a class="navigation" href="<?=base_url()."page/go/".$val['link_url'];?>"><?=$val['title']?></a></li>    
        <?php endforeach ;?>
        </ul>
    <?php endforeach ;?>
        <ul class="navigation">
            <li class="navigation"><a class="navigation" href="<?=base_url()."page/board/";?>">공지사항</a></li>    
        </ul>
    </div>
    </div>
   
