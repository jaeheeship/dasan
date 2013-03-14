<div class="ss2_wrapper center">
	<div id="slideshow_2" class="slideshow center">
	<?php foreach($main_page_image as $key => $img) :?>
		<div class="slideshow_item">
			<img src="<?=$img->full_path;?>" style="width:<?=$img->image_width;?>px; height:<?=$img->image_height;?>px;" width="<?=$img->image_width;?>" height="<?=$img->image_height;?>"/>
		</div>
	<?php endforeach ;?>
	</div>
	<div class="slideshow_paging clearfix top"></div>
</div>
<?php
	$first_line = array_slice($main_page_sub_image, 0, 3);
	$second_line = array_slice($main_page_sub_image, 3, 4);
?>
<div class="container">
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
					<a href="<?=base_url().$sub->link_url;?>"><img src="<?=$sub->full_path;?>" style="width:<?=$sub->image_width;?>px height:<?=$sub->image_height;?>px" width="<?=$sub->image_width;?>" height="<?=$sub->image_height;?>"></a>
					<div class='description'>
						<div class='description_content'><?=$sub->discription;?></div>
					</div>
				</div>
			</li>
		<?php endforeach ;?>
		</ul>
	</div>
    <br>
	<div class="center top">
		<ul class="clearfix">
		<?php foreach($second_line as $key => $sub) :?>
			<li class="second_line">
				<div class='wrapper'>
					<a href="<?=base_url().$sub->link_url;?>"><img src="<?=$sub->full_path;?>" style="width:<?=$sub->image_width;?>px height:<?=$sub->image_height;?>px" width="<?=$sub->image_width;?>" height="<?=$sub->image_height;?>"></a>
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
	$('#slideshow_2').cycle({
		fx: 'fade',		
		speed:  900, 
		timeout: 5000, 
		pager: '.ss2_wrapper .slideshow_paging', 
		prev: '.ss2_wrapper .slideshow_prev',
		next: '.ss2_wrapper .slideshow_next',
		before: function(currSlideElement, nextSlideElement) {
			var data = $('.data', $(nextSlideElement)).html();
			$('.ss2_wrapper .slideshow_box').stop(true, true).animate({ bottom:'-110px'}, 400, function(){
				$('.ss2_wrapper .slideshow_box .data').html(data);
			});
		$('.ss2_wrapper .slideshow_box').delay(100).animate({ bottom:'0'}, 400);
		}
	});

	$('.ss2_wrapper').mouseenter(function(){
		$('#slideshow_2').cycle('pause');
		$('.ss2_wrapper .slideshow_prev').stop(true, true).animate({ left:'20px'}, 200);
		$('.ss2_wrapper .slideshow_next').stop(true, true).animate({ right:'20px'}, 200);
	}).mouseleave(function(){
		$('#slideshow_2').cycle('resume');
		$('.ss2_wrapper .slideshow_prev').stop(true, true).animate({ left:'-40px'}, 200);
		$('.ss2_wrapper .slideshow_next').stop(true, true).animate({ right:'-40px'}, 200);
	});
	
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
