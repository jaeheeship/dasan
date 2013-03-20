<style>
.visible_item  { position : absolute; top:0px;left:0px;width:100%;display:block !important; } 
</style>

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
        <a class="activeSlide"></a>
        <a></a>
        <a></a>
        <a></a>
    </div>
</div>
<?php
	$first_line = array_slice($main_page_sub_image, 0, 3);
	$second_line = array_slice($main_page_sub_image, 3, 4);
?>
<div class="link_data">
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

    var prev_index = 0 ;  
    $('.slideshow_paging a').click(function(){
        var $this = $(this) ; 
        $this.siblings().removeClass('activeSlide') ; 
        $this.addClass('activeSlide') ; 
        var index = $this.index() ; 

        if(index == prev_index){
            return ; 
        }

        prev_index = index ; 

        $('.slideshow_item').each(function(i,o){
            if(index == i){ 
                var prev_item = $('.visible_item')  ; 
                prev_item.css('z-index',1000) ; 

                $(this).addClass('visible_item') ; 

                prev_item.fadeOut(1000,function(){ 
                    prev_item.removeClass('visible_item') ; 
                    prev_item.css('z-index',0) ; 
                }); 

            }
        }); 
    }); 

    $(window).resize(function(event) {
        imageWidth = parseInt("2200"); 
        windowWidth = parseInt($(window).width());
        temp = imageWidth-windowWidth;
        $('.slideshow_item').each(function(i,o){
            console.log(temp/5);
            $('.slideshow_item').css('margin-left',"-" + (temp/3) + "px") ; 
        }); 
    }); 
});
</script>
