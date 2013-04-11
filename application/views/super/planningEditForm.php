<div class="container">
<br>
<div style="text-align: right;">
    <a class="btn add-planning">추가</a>
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
				<td><a class="modify-planning" data-no="<?=$val->no;?>"><img src="<?=base_url().$val->image_thumb_path;?>"></a></td>
				<td><?=$val->writer;?></td>
				<td><?=$val->create_at;?></td>
				<td><a class="btn btn-danger btn-small delete-planning">삭제</a></td>
			</tr>
			<?php endforeach ;?>
		</tbody>
</table>
<div id="add-planning-dialog" class="modal hide" aria-labelledby="windowTitleLabel" aria-hidden="true">
    <form id="add-planning-form" action="<?=base_url();?>super/inputPage" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="modal-header">
        <h3>다산기획 추가</h3>
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
            <input type="hidden" name="category_parent" value="6"> 
        </div>
		<div class="control-group">
			<label class="control-label" for="file">이미지</label>
			<div class="controls">
				<input type="file" name="files" multiple="multiple">
			</div>
		</div>
    </div>
    <div class="modal-footer">
        <a class="btn cancle-add-planning">Cancle</a> 
            <button class="btn btn-primary" type="submit">OK</button>
    </div>
    </form>
</div>
<div id="modify-planning-dialog" class="modal hide" style="margin-top: -220px;" aria-labelledby="windowTitleLabel" aria-hidden="true">
        <form id="modify-planning-form" action="<?=base_url();?>super/modifyImage" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-header">
                <h3>다산기획 수정</h3>
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
                    <a class="btn cancle-modify-planning">Cancle</a> 
                    <button class="btn btn-primary" type="submit">OK</button>
                </div>
                </form>
            </div>

</div>

</div>
<script>
$('.delete-planning').click(function(){
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

$('.add-planning').click(function(){
    $('#add-planning-dialog').toggleClass('show');
});

$('.cancle-add-planning').click(function(){
    $('#add-planning-dialog').toggleClass('show');
});

$('.modify-planning').click(function(){
    var no = $(this).data('no'); 
    $('#modify-planning-form input[name=no]').val(no);
    $('#modify-planning-dialog').toggleClass('show');
});

$('.cancle-modify-planning').click(function(){
    $('#modify-planning-dialog').toggleClass('show');
});
</script>


