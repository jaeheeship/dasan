<div class="container">
	<div style='float: right; margin-top: 20px;'>
		<a class="btn add-category">추가</a>
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>카테고리</th>
				<th>상위카테고리</th>
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
				<td><?=$category->category_parent;?></td>
				<td><?=$category->writer;?></td>
				<td><?=$category->create_at;?></td>
				<td><a class="btn btn-danger btn-small delete-category">삭제</a></td>
			</tr>
			<?php endforeach ;?>
		</tbody>
	</table>
</div>
<div id="add-category-dialog" class="modal hide"
	aria-labelledby="windowTitleLabel" aria-hidden="true">
	<div class="modal-header">
		<h3>카테고리 추가</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="title">카테고리</label>
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
	</div>
	</form>
	<div class="modal-footer">
		<a class="btn cancle-add-category">Cancle</a> <a
			class="btn btn-primary add-category-ok">OK</a>
	</div>
</div>
<script>
$('.delete-category').click(function(){
		var no = $(this).parents('tr').find('td:eq(0)').text();
		$.ajax({
			url : '<?=base_url();?>super/deleteCategory',
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

$('.add-category').click(function(){
	$('#add-category-dialog').toggleClass('show');
});

$('.cancle-add-category').click(function(){
	$('#add-category-dialog').toggleClass('show');
});

$('.add-category-ok').click(function(){
	var title = $('input[name=title]').val();
	var link_url = $('input[name=link_url]').val();
	
	$.ajax({
		url : '<?=base_url();?>super/inputCategory',
		type : 'post',
		data : {
			title : title,
			link_url : link_url
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
