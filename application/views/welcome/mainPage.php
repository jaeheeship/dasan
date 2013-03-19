<div class="slideshow center">
	<div class="slideshow_image center">
	<?php foreach($main_page_image as $key => $img) :?>
		<div class="slideshow_item">
			<img src="<?=$img->full_path;?>" style="width:100%; height:100%; min-width: 2200px; vertical-align: middle"/>
		</div>
	<?php endforeach ;?>
	</div>
	<div class="slideshow_paging clearfix top"> aaa </div>
</div>
<?php
	$first_line = array_slice($main_page_sub_image, 0, 3);
	$second_line = array_slice($main_page_sub_image, 3, 4);
?>
<div>
	<div class="line_title center">
    <?php foreach($slogun as $key => $val) :?>
        <a class="slogunModify">
            <img src="<?=base_url().$val->full_path;?>">
        </a>
    <?php endforeach ;?>
	</div>
	<div class="center top">
		<ul class="clearfix">
		<?php foreach($first_line as $key => $sub) :?>
			<li class="first_line">
				<div class='wrapper'>
					<a href="<?=base_url()."page/go/".$sub->link_url;?>"><img src="<?=$sub->full_path;?>" style="width:<?=$sub->image_width;?>px height:<?=$sub->image_height;?>px" width="<?=$sub->image_width;?>" height="<?=$sub->image_height;?>"></a>
					<div class='description'>
						<div class='description_content'><?=$sub->discription;?></div>
					</div>
				</div>
			</li>
		<?php endforeach ;?>
		</ul>
	</div>
    <br>
	<div class="center" style="margin-bottom: 90px;">
		<ul class="clearfix">
		<?php foreach($second_line as $key => $sub) :?>
			<li class="second_line">
				<div class='wrapper'>
					<a href="<?=base_url()."page/go/".$sub->link_url;?>"><img src="<?=$sub->full_path;?>" style="width:<?=$sub->image_width;?>px height:<?=$sub->image_height;?>px" width="<?=$sub->image_width;?>" height="<?=$sub->image_height;?>"></a>
					<div class='description'>
						<div class='description_content'><?=$sub->discription;?></div>
					</div>
				</div>
			</li>
		<?php endforeach ;?>
		</ul>

	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('div.description').each(function(){  
        	$(this).css('opacity', 0);  
        	$(this).css('width', $(this).parent().children('a').children('img').width());  
        	$(this).css('display', 'block');  
	});  
  
	$('div.wrapper').hover(function(){  
		$(this).children('.description').stop().fadeTo(500, 0.7);  
	},function(){  
        	$(this).children('.description').stop().fadeTo(500, 0);  
    	});  
});
</script>
