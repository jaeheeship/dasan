<div class="container">
<br>
<br>
<div class="logo">
<fieldset>
    <legend>로고</legend>
</fieldset>
        <?php foreach($logo as $key => $val) :?>
            <a class="modify-logo">
                <img src="<?=base_url().$val->image_thumb_path;?>">
            </a>
            <div id="modify-logo-dialog" class="modal hide" style="margin-top: -300px;" aria-labelledby="windowTitleLabel" aria-hidden="true">
                <form id="modify-logo-form" action="<?=base_url();?>super/modifyImage" method="post" enctype="multipart/form-data">
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
                    <a class="btn cancle-modify-logo">Cancle</a> 
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
<a class="modify-slogun">
    <img src="<?=base_url().$val->image_thumb_path;?>">
</a>
<div id="modify-slogun-dialog" class="modal hide" style="margin-top: -110px;" aria-labelledby="windowTitleLabel" aria-hidden="true">
    <form id="modify-slogun-form" action="<?=base_url();?>super/modifyImage" method="post" class="form-horizontal" enctype="multipart/form-data">
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
        <a class="btn cancle-modify-slogun">Cancle</a> 
        <button class="btn btn-primary" type="submit">OK</button>
    </div>
    </form>
</div>
<?php endforeach ;?>
</div>
<br>
<br>
<div class="main-image">
<fieldset>
<legend>메인 사진</legend>
</fieldset>
<div style="text-align: right;">
    <a class="btn add-main-image">추가</a>
</div>
<div id="add-main-image-dialog" class="modal hide" style="margin-top: -80px;" aria-labelledby="windowTitleLabel" aria-hidden="true">
    <form id="add-main-image-form" action="<?=base_url();?>super/inputData" method="post" class="form-horizontal" enctype="multipart/form-data">
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
        <a class="btn cancle-add-main-image">Cancle</a> 
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
				<td><a class="btn btn-danger btn-small delete-main-image">삭제</a></td>
			</tr>
			<?php endforeach ;?>
		</tbody>
	</table>
</div>
<br>
<br>
<div class="sub-image">
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
				<td><a class="modify-sub-image" data-no="<?=$image->no;?>"><img src="<?=base_url().$image->image_thumb_path;?>"></a></td>
				<td><?=$image->writer;?></td>
				<td><?=$image->create_at;?></td>
			</tr>
    		<?php endforeach ;?>
		</tbody>
	</table>
    <div id="modify-sub-image-dialog" class="modal hide" style="margin-top: -220px;" aria-labelledby="windowTitleLabel" aria-hidden="true">
        <form id="modify-sub-image-form" action="<?=base_url();?>super/modifyData" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                    <div class="control-group">
			<div class="controls">
				<textarea  style="width: 205px;height: 100px;" name="content"></textarea>
			</div>
		</div>

                </div>
                <div class="modal-footer">
                    <a class="btn cancle-modify-sub-image">Cancle</a> 
                    <button class="btn btn-primary" type="submit">OK</button>
                </div>
                </form>
            </div>

</div>
<br>
<br>
<div class="button">
<legend>버튼</legend>
</fieldset>
<?php foreach($button as $key => $val) :?>
<a class="modify-button">
    <img src="<?=base_url().$val->full_path;?>">
</a>
<div id="modify-button-dialog" class="modal hide" style="margin-top: -110px;" aria-labelledby="windowTitleLabel" aria-hidden="true">
    <form id="modify-button-form" action="<?=base_url();?>super/modifyImage" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="modal-header">
            <h3>버튼수정</h3>
        </div>
        <div class="modal-body">
            <input type="hidden" name="no" value="<?=$val->no;?>">
            <div class="center">
                <input type="file" name="files" multiple="multiple">
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn cancle-modify-button">Cancle</a> 
            <button class="btn btn-primary" type="submit">OK</button>
        </div>
    </form>
</div>
<?php endforeach ;?>
</div>
<br><br>

<script>
    $('.modify-logo').click(function(){
        $('#modify-logo-dialog').toggleClass('show');
    });

    $('.cancle-modify-logo').click(function(){
        $('#modify-logo-dialog').toggleClass('show');
    });

    $('.modify-slogun').click(function(){
        $('#modify-slogun-dialog').toggleClass('show');
    });

    $('.cancle-modify-slogun').click(function(){
        $('#modify-slogun-dialog').toggleClass('show');
    });

    $('.delete-main-image').click(function(){
        var no = $(this).parents('tr').find('td:eq(0)').text();
        $.ajax({
            url : '<?=base_url();?>super/delete',
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

    $('.add-main-image').click(function(){
        $('#add-main-image-dialog').toggleClass('show');
    });

    $('.cancle-add-main-image').click(function(){
        $('#add-main-image-dialog').toggleClass('show');
    });

    $('.modify-sub-image').click(function(){
        var no = $(this).data('no'); 
        $('#modify-sub-image-form input[name=no]').val(no);
        $('#modify-sub-image-dialog').toggleClass('show');
    });

    $('.cancle-modify-sub-image').click(function(){
        $('#modify-sub-image-dialog').toggleClass('show');
    });

    $('.modify-button').click(function(){
        $('#modify-button-dialog').toggleClass('show');
    });

    $('.cancle-modify-button').click(function(){
        $('#modify-button-dialog').toggleClass('show');
    });

</script>
