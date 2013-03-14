<div class="container">
<br>
<div style="text-align: right;">
    <a class="btn add-board-btn" href="<?=base_url()?>super/writeBoard">추가</a>
</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Title</th>
				<th>등록자</th>
				<th>등록날짜</th>
				<th>삭제</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($list as $key => $document) :?>
			<tr>
				<td><?=$document->no;?></td>
				<td><a href="<?=base_url();?>board/modify/<?=$document->no;?>"><?=$document->title;?></a></td>
				<td><?=$document->writer;?></td>
				<td><?=$document->create_at;?></td>
				<td><a class="btn btn-danger btn-small delete-btn">삭제</a></td>
			</tr>
		<?php endforeach ;?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7">
					<div class="pagination pagination-centered">
					<?php
					if($pagination['page_count'] >= 5){
						$first_page = $pagination['page'] > 3 ? $pagination['page'] - 2 : 1;
						$last_page = $pagination['page'] > 3 ? $pagination['page'] + 2 : 5;
						if($last_page > $pagination['page_count']){
							$last_page = $pagination['page_count'];
							if(($last_page % 5) != 0){
								$temp = 5 - ($last_page % 5);
								$first_page = $last_page - ($temp + 1);
							}else{
								$first_page = $last_page - 4;
							}
						}
					}else{
						$first_page = 1;
						$last_page = $pagination['page_count'];
					}
					?>
						<ul>
						<?php for($i=$first_page ; $i <$pagination['page'];$i++):?>
							<li><a href="<?=base_url()?>board/boardList/<?=$i?>/?search_key=<?=$search_key?>&search_keyword=<?=$search_keyword?>"><?=$i?></a>
							</li>
						<?php endfor;?>
							<li class="active"><a href="javascript:void(0)"><?=$pagination['page'];?></a>
							</li>
						<?php for($i=$pagination['page']+1 ; $i <= $last_page;$i++):?>
							<li><a href="<?=base_url()?>board/boardList/<?=$i?>/?search_key=<?=$search_key?>&search_keyword=<?=$search_keyword?>"><?=$i?></a>
							</li>
						<?php endfor;?>
						</ul>
					</div>
				</td>
			</tr>
		</tfoot>
	</table>
</div>
<script>
$('.delete-btn').click(function(){
	if(confirm('선택된 글은 삭제됩니다.')){
		var no = $(this).parents('tr').find('td:eq(0)').text();
		$.ajax({
			url : '<?=base_url();?>super/deleteBoard',
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
</script>
