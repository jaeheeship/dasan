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
<?echo common_js_asset('jquery/js/jquery-1.7.2.min.js')?>
<?echo common_js_asset('jquery/js/jquery-ui-1.8.22.custom.min.js')?>
<?echo common_js_asset('bootstrap/js/bootstrap.js')?>
<style type="text/css">
.center{
    margin-left: auto;
	margin-right: auto;
	text-align: center;
}
</style>
</head>
<body>
	<div class="navbar navbar-inverse"
		style="background-color: black; position: static; margin-bottom: 0px;">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?=base_url()?>super">Dasan</a>
				<ul class="nav">
					<li><a href="<?=base_url()?>super/getMainEditPage">메인</a></li>
					<li><a href="<?=base_url()?>super/getIntroEditPage">회사소개</a></li>
					<li><a href="<?=base_url()?>super/getTrainingEditPage">연수</a></li>
					<li><a href="<?=base_url()?>super/getTourEditPage">투어</a></li>
					<li><a href="<?=base_url()?>super/getPlanningEditPage">다산기획</a></li>
					<li><a href="<?=base_url()?>super/getBoardEditPage">공지사항</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="">제어판<b class="caret"></b></a>
                        <ul class="dropdown-menu">
				        	<li><a href="<?=base_url()?>auth/change_password">관리자 비밀번호 수정</a></li>
				        	<li><a href="<?=base_url()?>auth/logout">로그아웃</a></li>
                        </ul>
                    </li>
				</ul>
			</div>
		</div>
	</div>
