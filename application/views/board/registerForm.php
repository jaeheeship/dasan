<script type="text/javascript" src="<?=base_url()?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
tinyMCE.init({
        theme : "advanced",
	mode : "textareas",
	plugins : "fullpage",
	theme_advanced_buttons3_add : "fullpage"
});
</script>
<?php
	if($document != null) {
		$form_action = base_url() . "board/modifyData";
		$mod_no = $document->no;
		$mod_title = $document->title;
		$mod_sub_title = $document->sub_title;
		$mod_category = $document->category;
		$mod_discription = $document->discription;
	} else { 
		$form_action = base_url() . "board/inputData";
		$mod_no = "";
		$mod_title = "";
		$mod_sub_title = "";
		$mod_category = "";
		$mod_discription = "";
	}
?>
<div class="container" style="margin-top:20px;">
	<form class="form-horizontal" method="post" action="<?=$form_action;?>" enctype="multipart/form-data">
		<input type="hidden" name="no" value="<?=$mod_no;?>">
		<div class="control-group">
			<label class="control-label" for="title">제목</label>
			<div class="controls">
				<input type="text" name="title" value="<?=$mod_title;?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="sub_title">부제목</label>
			<div class="controls">
				<input type="text" name="sub_title" value="<?=$mod_sub_title;?>">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="category">카테고리</label>
			<div class="controls">
				<select name="category">
				<?php foreach($category_list as $key => $category_list) :?>
					<option value="<?=$category_list->no;?>"<?php if($mod_category == $category_list->no){?> selected<?php }?>><?=$category_list->category;?></option>
				<?php endforeach ;?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="file">이미지</label>
			<div class="controls">
				<input type="file" name="files" multiple="multiple">
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<textarea class="ckeditor" style="width: 70%;height: 200px;" name="content"><?=$mod_discription;?></textarea>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<a class="btn cancle_btn">취소</a>
				<?php if($mod_no == "") :?>
					<button type="submit" class="btn">저장</button>
				<?php else :?>
					<button type="submit" class="btn">수정</button>
				<?php endif;?>
			</div>
		</div>
	</form>
</div>
<script>
$('.cancle_btn').click(function(){
	location.href = "<?=base_url();?>board/boardList"; 
});
</script>
