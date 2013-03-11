<div class="container">
<br>
<div class="addTraining" style="text-align: right;">
    <a class="btn add_training_btn">추가</a>
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
				<td><a class="trainingModify" data-no="<?=$val->no;?>"><img src="<?=base_url().$val->image_thumb_path;?>"></a></td>
				<td><?=$val->writer;?></td>
				<td><?=$val->create_at;?></td>
				<td><a class="btn btn-danger btn-small delete_btn">삭제</a></td>
			</tr>
			<?php endforeach ;?>
		</tbody>
</table>
<div id="addTrainingDialog" class="modal hide" aria-labelledby="windowTitleLabel" aria-hidden="true">
    <form id="add_training_form" action="<?=base_url();?>super/inputData" method="post" class="form-horizontal" enctype="multipart/form-data">
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
			<label class="control-label" for="sub_title">부제목</label>
			<div class="controls">
				<input type="text" name="sub_title"> 
			</div>
		</div>
        <div class="control-group">
            <input type="hidden" name="category" value="4"> 
        </div>
		<div class="control-group">
			<label class="control-label" for="file">이미지</label>
			<div class="controls">
				<input type="file" name="files" multiple="multiple">
			</div>
		</div>
    </div>
    <div class="modal-footer">
        <a class="btn addTrainingCancle">Cancle</a> 
            <button class="btn btn-primary" type="submit">OK</button>
    </div>
    </form>
</div>
<div id="trainingModifyDialog" class="modal hide" style="margin-top: -220px;" aria-labelledby="windowTitleLabel" aria-hidden="true">
        <form id="modify_training_form" action="<?=base_url();?>super/modifyImage" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                    <a class="btn modifyTrainingCancle">Cancle</a> 
                    <button class="btn btn-primary" type="submit">OK</button>
                </div>
                </form>
            </div>

</div>

</div>
<script>
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

$('.add_training_btn').click(function(){
    $('#addTrainingDialog').toggleClass('show');
});

$('.addTrainingCancle').click(function(){
    $('#addTrainingDialog').toggleClass('show');
});

$('.trainingModify').click(function(){
    var no = $(this).data('no'); 
    $('#modify_training_form input[name=no]').val(no);
    $('#trainingModifyDialog').toggleClass('show');
});

$('.modifyTrainingCancle').click(function(){
    $('#trainingModifyDialog').toggleClass('show');
});
</script>


