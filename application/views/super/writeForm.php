<script type="text/javascript" src="<?=base_url()?>ckeditor/ckeditor.js"></script>
<div class="container" style="margin-top:20px;">
	<form class="form-horizontal" method="post" action="<?=base_url()?>super/inputData" enctype="multipart/form-data">
		<div class="control-group">
			<label class="control-label" for="title">제목</label>
			<div class="controls">
				<input type="text" name="title">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="sub_title">부제목</label>
			<div class="controls">
				<input type="text" name="sub_title">
			</div>
		</div>
		<div class="control-group">
		    <input type="hidden" name="category" value="7">
		</div>
		<div class="control-group">
			<label class="control-label" for="file">이미지</label>
			<div class="controls">
				<input type="file" name="files" multiple="multiple">
			</div>
		</div>
        <div class="control-group">
			<label class="control-label" for="link_url">링크</label>
			<div class="controls">
				<input type="text" name="link_url">
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<textarea class="ckeditor" style="width: 70%;height: 200px;" name="content"></textarea>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="reset">취소</button>
			    <button type="submit" class="btn">저장</button>
			</div>
		</div>
	</form>
</div>
