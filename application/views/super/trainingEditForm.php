<div class="container">
<br>
<div style="text-align: right;">
    <a class="btn add-training">추가</a>
</div>
<table class="table table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>제목</th>
				<th>내용</th>
				<th>등록자</th>
				<th>등록날짜</th>
				<th>삭제</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($list as $key => $val) :?>
			<tr>
				<td><?=$val->no;?></td>
				<td><?=$val->title;?></td>
				<td><a class="modify-training" data-no="<?=$val->no;?>"><img src="<?=base_url().$val->image_thumb_path;?>"></a></td>
				<td><?=$val->writer;?></td>
				<td><?=$val->create_at;?></td>
				<td><a class="btn btn-danger btn-small delete-training">삭제</a></td>
			</tr>
			<?php endforeach ;?>
		</tbody>
</table>
<div id="add-training-dialog" class="modal hide" aria-labelledby="windowTitleLabel" aria-hidden="true">
    <form id="add-training-form" action="<?=base_url();?>super/inputPage" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="modal-header">
        <h3>연수 추가</h3>
    </div>
    <div class="modal-body">
        <div class="control-group">
			<label class="control-label" for="title">제목</label>
			<div class="controls">
				<input type="text" name="title">
			</div>
		</div>
        <div class="control-group">
			<label class="control-label" for="link_url">URL</label>
			<div class="controls">
				<input type="text" name="link_url">
			</div>
		</div>

        <div class="control-group">
            <input type="hidden" name="category_parent" value="4"> 
        </div>
		<div class="control-group">
			<label class="control-label" for="file">이미지</label>
			<div class="controls">
				<input type="file" name="files" multiple="multiple">
			</div>
		</div>
    </div>
    <div class="modal-footer">
        <a class="btn cancle-add-training">Cancle</a> 
            <button class="btn btn-primary" type="submit">OK</button>
    </div>
    </form>
</div>
<div id="modify-training-dialog" class="modal hide" style="margin-top: -220px;" aria-labelledby="windowTitleLabel" aria-hidden="true">
        <form id="modify-training-form" action="<?=base_url();?>super/modifyImage" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-header">
                <h3>연수 수정</h3>
            </div>
                <div class="modal-body form-horizontal">
                    <div class="control-group">
			            <label class="control-label" for="no">No</label>
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
                    <a class="btn cancle-modify-training">Cancle</a> 
                    <button class="btn btn-primary" type="submit">OK</button>
                </div>
                </form>
            </div>

</div>

</div>
<script>
$('.delete-training').click(function(){
		var no = $(this).parents('tr').find('td:eq(0)').text();
		$.ajax({
			url : '<?=base_url();?>super/deletePage',
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

$('.add-training').click(function(){
    $('#add-training-dialog').toggleClass('show');
});

$('.cancle-add-training').click(function(){
    $('#add-training-dialog').toggleClass('show');
});

$('.modify-training').click(function(){
    var no = $(this).data('no'); 
    $('#modify-training-form input[name=no]').val(no);
    $('#modify-training-dialog').toggleClass('show');
});

$('.cancle-modify-training').click(function(){
    $('#modify-training-dialog').toggleClass('show');
});
</script>


