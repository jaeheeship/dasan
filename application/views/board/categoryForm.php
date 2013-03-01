<div class="container">
	<div style='float: right; margin-top: 20px;'>
		<a class="btn category">추가</a>
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>카테고리</th>
				<th>등록자</th>
				<th>등록날짜</th>
				<th>삭제</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($list as $key => $category) :?>
			<tr>
				<td><?=$category->no;?></td>
				<td><?=$category->category;?></td>
				<td><?=$category->writer;?></td>
				<td><?=$category->create_at;?></td>
				<td><a class="btn btn-danger btn-small delete_btn">삭제</a></td>
			</tr>
			<?php endforeach ;?>
		</tbody>
	</table>
</div>
<div id="categoryDialog" class="modal hide"
	aria-labelledby="windowTitleLabel" aria-hidden="true">
	<div class="modal-header">
		<h3>카테고리 추가</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="inputCategory">카테고리</label>
				<div class="controls">
					<input type="text" name="inputCategory">
				</div>
			</div>
	</div>
	</form>
	<div class="modal-footer">
		<a class="btn categoryCancle">Cancle</a> <a
			class="btn btn-primary categoryOk">OK</a>
	</div>
</div>
<script>
$('.delete_btn').click(function(){
	if(confirm('선택된 카테고리를 삭제하면 문제가 발생 할 수도 있습니다. 그래도 삭제 하겠습니까?.')){
		var no = $(this).parents('tr').find('td:eq(0)').text();
		$.ajax({
			url : '<?=base_url();?>board/delete_category',
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
	}
});

$('.category').click(function(){
	$('#categoryDialog').toggleClass('show');
});

$('.categoryCancle').click(function(){
	$('#categoryDialog').toggleClass('show');
});

$('.categoryOk').click(function(){
	var category = $('input[name=inputCategory]').val();
	
	$.ajax({
		url : '<?=base_url();?>board/save_category',
		type : 'post',
		data : {
			category : category
		},
		success: function(){ 
			location.href = location.href ; 
		},
		error : function(request, status, error) { 
		      alert("code : " + request.status + "\r\nmessage : " + request.reponseText); 
		} 
	});

});



</script>
</div>

