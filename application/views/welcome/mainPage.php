<div class="slideshow center">
	<div class="slideshow_image center" style="position:relative;">
    <?php $index = 0;?>
	<?php foreach($main_page_image as $key => $img) :?>
		<div class="slideshow_item <?php if($index==0):?>visible_item <?php endif;?>" index="<?=$index;?>">
			<img src="<?=$img->full_path;?>" style="width:100%; height:100%; min-width: 2200px; vertical-align: middle"/>
		</div>
        <?php $index++;?>
	<?php endforeach ;?>
	</div>
</div>
<div class="center top">
	<div class="slideshow_paging clearfix top">
	<?php foreach($main_page_image as $key => $img) :?>
        <a></a>
	<?php endforeach ;?>
    </div>
</div>
<?php
	$first_line = array_slice($main_page_sub_image, 0, 3);
	$second_line = array_slice($main_page_sub_image, 3, 4);
?>
<div class="link_data">
	<div class="slogun_line center">
    <?php foreach($slogun as $key => $val) :?>
        <a class="slogunModify">
            <img src="<?=base_url().$val->full_path;?>">
        </a>
    <?php endforeach ;?>
	</div>
	<div class="first_link center">
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
	<div class="second_link center">
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

    var imageWidth = parseInt("2200"); 
    var windowWidth = parseInt($(window).width());
    var temp = imageWidth-windowWidth;
    $('.slideshow_item').css('margin-left',"-" + (temp/3) + "px") ; 

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

    $('.slideshow_paging a:first').addClass('activeSlide');
    $('.slideshow_image .slideshow_item:first').addClass('activeSlide');

    $('.slideshow_paging a').click(function(){
        var $this = $(this) ; 
        $this.siblings().removeClass('activeSlide') ; 
        $this.addClass('activeSlide') ; 
        var index = $this.index() ; 

        $('.slideshow_item').each(function(i,o){
            if(index == i){ 
                $(this).addClass('visible_item') ; 
                $(this).css('z-index',1000) ; 
            }else{
                $(this).removeClass('visible_item') ; 
                $(this).css('z-index',0) ; 
            }
        }); 
    }); 

    function swapImages(){
        var active = $('.slideshow_image .visible_item');
        var next = ($('.slideshow_image .visible_item').next().length > 0) ? $('.slideshow_image .visible_item').next() : $('.slideshow_image .slideshow_item:first');
        var active_page = $('.slideshow_paging a.activeSlide');
        var next_page = ($('.slideshow_paging a.activeSlide').next().length > 0) ? $('.slideshow_paging a.activeSlide').next() : $('.slideshow_paging a:first');
        
        active.siblings().removeClass('activeSlide') ; 

        active.removeClass('visible_item');
        active.css('z-index',0) ; 
        next.addClass('visible_item');
        next.css('z-index',1000) ; 

        next_page.addClass('activeSlide');
        active_page.removeClass('activeSlide');
    }; 

    setInterval(swapImages,7000);
    
    $(window).resize(function(event) {
        imageWidth = parseInt("2200"); 
        windowWidth = parseInt($(window).width());
        temp = imageWidth-windowWidth;
        $('.slideshow_item').each(function(i,o){
            $('.slideshow_item').css('margin-left',"-" + (temp/3) + "px") ; 
        }); 
    }); 
});
</script>
