<div class="container">
<br>
<br>
<div class="logo">
<fieldset>
    <legend>로고</legend>
</fieldset>
        <?php foreach($logo as $key => $val) :?>
            <a class="logoModify">
                <img src="<?=base_url().$val->image_thumb_path;?>">
            </a>
            <div id="logoModifyDialog" class="modal hide" style="margin-top: -390px;" aria-labelledby="windowTitleLabel" aria-hidden="true">
                <form id="logo_form" action="<?=base_url();?>super/modifyImage" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h3>로고수정</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no" value="<?=$val->no;?>">
                    <div class="center">
                        <input type="file" name="files" multiple="multiple">
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn logoModifyCancle">Cancle</a> 
                    <button class="btn btn-primary" type="submit">OK</button>
                </div>
                </form>
            </div>
        <?php endforeach ;?>
</div>
<br>
<br>
<div class="slogun">
<legend>슬로건</legend>
</fieldset>
<?php foreach($slogun as $key => $val) :?>
<a class="slogunModify">
    <img src="<?=base_url().$val->image_thumb_path;?>">
</a>
<div id="slogunModifyDialog" class="modal hide" style="margin-top: -220px;" aria-labelledby="windowTitleLabel" aria-hidden="true">
    <form id="slogun_form" action="<?=base_url();?>super/modifyImage" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="modal-header">
        <h3>슬로건수정</h3>
    </div>
    <div class="modal-body">
        <input type="hidden" name="no" value="<?=$val->no;?>">
        <div class="center">
            <input type="file" name="files" multiple="multiple">
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn slogunModifyCancle">Cancle</a> 
        <button class="btn btn-primary" type="submit">OK</button>
    </div>
    </form>
</div>
<?php endforeach ;?>
</div>
<br>
<br>
<div class="mainImage">
<fieldset>
<legend>메인 사진</legend>
</fieldset>
<div class="addMainImage" style="text-align: right;">
    <a class="btn add_image_btn">추가</a>
</div>
<div id="addImageDialog" class="modal hide" style="margin-top: -80px;" aria-labelledby="windowTitleLabel" aria-hidden="true">
    <form id="add_image_form" action="<?=base_url();?>super/inputData" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="modal-header">
        <h3>메인사진 추가</h3>
    </div>
    <div class="modal-body">
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
            <input type="hidden" name="category" value="0"> 
        </div>
		<div class="control-group">
			<label class="control-label" for="file">이미지</label>
			<div class="controls">
				<input type="file" name="files" multiple="multiple">
			</div>
		</div>
    </div>
    <div class="modal-footer">
        <a class="btn addImageCancle">Cancle</a> 
            <button class="btn btn-primary" type="submit">OK</button>
    </div>
    </form>
</div>

<table class="table table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>이미지</th>
				<th>등록자</th>
				<th>등록날짜</th>
				<th>삭제</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($main_image as $key => $image) :?>
			<tr>
				<td><?=$image->no;?></td>
				<td><img src="<?=base_url().$image->image_thumb_path;?>"></td>
				<td><?=$image->writer;?></td>
				<td><?=$image->create_at;?></td>
				<td><a class="btn btn-danger btn-small delete_btn">삭제</a></td>
			</tr>
			<?php endforeach ;?>
		</tbody>
	</table>
</div>
<br>
<br>
<div class="subImage">
<fieldset>
<legend>서브 사진</legend>
</fieldset>
<table class="table table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>이미지</th>
				<th>등록자</th>
				<th>등록날짜</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($sub_image as $key => $image) :?>
			<tr>
				<td><?=$image->no;?></td>
				<td><a class="subImageModify" data-no="<?=$image->no;?>"><img src="<?=base_url().$image->image_thumb_path;?>"></a></td>
				<td><?=$image->writer;?></td>
				<td><?=$image->create_at;?></td>
			</tr>
    		<?php endforeach ;?>
		</tbody>
	</table>
    <div id="subImageModifyDialog" class="modal hide" style="margin-top: -220px;" aria-labelledby="windowTitleLabel" aria-hidden="true">
        <form id="sub_image_form" action="<?=base_url();?>super/modifyImage" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-header">
                <h3>서브사진</h3>
            </div>
                <div class="modal-body form-horizontal">
                    <div class="control-group">
			            <label class="control-label" for="sub_title">No</label>
			            <div class="controls">
				            <input type="text" name="no" readonly>
			            </div>
		            </div>
                    <div class="control-group">
			            <label class="control-label" for="file">이미지</label>
			            <div class="controls">
				            <input type="file" name="files" multiple="multiple">
			            </div>
		            </div>
                </div>
                <div class="modal-footer">
                    <a class="btn subImageModifyCancle">Cancle</a> 
                    <button class="btn btn-primary" type="submit">OK</button>
                </div>
                </form>
            </div>

</div>
<script>
$('.logoModify').click(function(){
    $('#logoModifyDialog').toggleClass('show');
});

$('.logoModifyCancle').click(function(){
    $('#logoModifyDialog').toggleClass('show');
});

$('.slogunModify').click(function(){
    $('#slogunModifyDialog').toggleClass('show');
});

$('.slogunModifyCancle').click(function(){
    $('#slogunModifyDialog').toggleClass('show');
});

$('.delete_btn').click(function(){
		var no = $(this).parents('tr').find('td:eq(0)').text();
		$.ajax({
			url : '<?=base_url();?>super/deleteImage',
			type : 'post',
			data : {
				no : no
			},
			success: function(){ 
				location.href = location.href ; 
			},
			error : function(request, status, error) { 
			      alert("code : " + request.status + "\r\nmessage : " + request.reponseText); 
			} 
		});
});

$('.add_image_btn').click(function(){
    $('#addImageDialog').toggleClass('show');
});

$('.addImageCancle').click(function(){
    $('#addImageDialog').toggleClass('show');
});

$('.subImageModify').click(function(){
    var no = $(this).data('no'); 
    $('#sub_image_form input[name=no]').val(no);
    $('#subImageModifyDialog').toggleClass('show');
});

$('.subImageModifyCancle').click(function(){
    $('#subImageModifyDialog').toggleClass('show');
});

</script>
