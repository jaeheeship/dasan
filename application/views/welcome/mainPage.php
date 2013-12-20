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
<!--
<div id="popup" class="modal hide fade" aria-hidden="true" role="dialog"> 
    <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3>&nbsp;</h3>
    </div>  
    <div class="modal-body" style="max-height:520px;text-align:center;">
        <a target="_blank" href="http://ssamtour.co.kr/tour/Tour_View.asp?idx=1673&cate1=010800&cate2=&leftNum=&ref=1657"><img src="<?=base_url();?>common/assets/popup/popup.png" /></a>
    </div>  
</div>-->
    <script type="text/javascript">

    var next_slide = (function(){
        var prev_slide_idx = 0 ;
        var current_slide_idx  ; 
        var $pagination = $('.slideshow_paging a').siblings() ; 

        return {
			getCurrentSlideIdx : function(){ 
				return current_slide_idx ; 
			},
            show : function(idx){ 

                if(idx == null){
                    idx = (prev_slide_idx+1)%$pagination.length ; 
                }

				current_slide_idx = idx ; 	

                $($pagination[prev_slide_idx]).removeClass('activeSlide') ; 
                $($pagination[idx]).addClass('activeSlide') ; 

                var siblings = $('.slideshow_item').siblings() ; 

                $(siblings[idx]).css('z-index',1000).fadeIn(1000)  ; 
                $(siblings[prev_slide_idx]).css('z-index',0).fadeOut(1000)  ; 

                prev_slide_idx = idx ; 
            },

            next : function() {
                next_slide.show() ;  
            }
        } 
    })() ; 

    $(document).ready(function(){

        var imageWidth = parseInt("2200"); 
        var windowWidth = parseInt($(window).width());
        var temp = imageWidth-windowWidth;

        /*$('#popup').bPopup({ 
            modalClose : true 
    }) ; */

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

        var prev_index = 0 ; 

        $('.slideshow_paging a').click(function(){
            var $this = $(this) ; 
			if($this.index() == next_slide.getCurrentSlideIdx()){ 

			}else{ 
            	next_slide.show($this.index()) ; 
			}
        }); 

        setInterval(next_slide.next,5000); 

        $(window).resize(function(event) {
            imageWidth = parseInt("2200"); 
            windowWidth = parseInt($(window).width());
            temp = imageWidth-windowWidth;
            $('.slideshow_item').each(function(i,o){
                $('.slideshow_item').css('margin-left',"-" + (temp/3) + "px") ; 
            }); 
        }); 

        /*$('#popup').modal() ; 
        $('#popup').modal('show') ; */
    });
</script>
