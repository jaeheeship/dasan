<div class="container">
<?php if($sel !=3):?>
<div class="page center" style="position:relative; height:<?=$page[0]->image_height;?>px">
    <img src="<?=base_url().$page[0]->full_path;?>">
    <?php if($page[0]->no == 62){?>
    <div class="link_button" style="display: block; position: absolute; top: 618px; left: 756px;height:<?=$button[0]->image_height;?>px; width:<?=$button[0]->image_width;?>px">
        <a href="http://www.ssamtour.co.kr"><img src="<?=base_url().$button[0]->full_path;?>" style="height:<?=$button[0]->image_height;?>px; width:<?=$button[0]->image_width;?>px"></a>
    </div>
    <?php }else if($page[0]->no == 67){?>
    <div class="link_button" style="display: block; position: absolute; top: 982px; left: 740px;height:<?=$button[0]->image_height;?>px; width:<?=$button[0]->image_width;?>px">
        <a href="http://www.ivp-uk.org"><img src="<?=base_url().$button[0]->full_path;?>" style="height:<?=$button[0]->image_height;?>px; width:<?=$button[0]->image_width;?>px"></a>
        <a href="http://cafe.naver.com/ivpkorea"><img src="<?=base_url().$button[0]->full_path;?>" style="height:<?=$button[0]->image_height;?>px; width:<?=$button[0]->image_width;?>px"></a>
    </div>
    <?php }?>
</div>
<?php else :?> 
<div style="padding-left:130px;">
    <div class="sidebar center">
    <?php foreach($menu as $key => $sub) :?>     
        <?php if($key == '3') :?> 
        <fieldset><legend><?=$sub[0]['title'];?></legend></fieldset>
        <ul>
        <?php foreach($sub as $key => $val) :?>     
            <li><a <?php if($val['link_url'] == $sub_sel){?> style="color: rgb(82, 190,245);" <?php } ?> href="<?=base_url()."page/go/".$val['link_url']?>"><?=$val['title'];?></a></li>
        <?php endforeach ;?>
        </ul>
        <?php endif;?>
    <?php endforeach ;?>
    </div>
    <div>
        <img src="<?=base_url().$page[0]->full_path;?>">
    </div>
</div>
<?php endif;?>
</div>
