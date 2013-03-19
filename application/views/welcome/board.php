<div class="container">
    <div class="board_header"></div>
<br>
	<table class="table table-hover center" style="width: 980px;">
		<thead>
			<tr>
				<th>No</th>
				<th>Title</th>
				<th>등록자</th>
				<th>등록날짜</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($list as $key => $document) :?>
			<tr>
				<td><?=$document->no;?></td>
				<td><a href="<?=base_url();?>page/getBoard/<?=$document->no;?>"><?=$document->title;?></a></td>
				<td><?=$document->writer;?></td>
				<td><?=$document->create_at;?></td>
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
							<li><a href="<?=base_url()?>page/board/<?=$i?>/?search_key=<?=$search_key?>&search_keyword=<?=$search_keyword?>"><?=$i?></a>
							</li>
						<?php endfor;?>
							<li class="active"><a href="javascript:void(0)"><?=$pagination['page'];?></a>
							</li>
						<?php for($i=$pagination['page']+1 ; $i <= $last_page;$i++):?>
							<li><a href="<?=base_url()?>page/board/<?=$i?>/?search_key=<?=$search_key?>&search_keyword=<?=$search_keyword?>"><?=$i?></a>
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
</script>
