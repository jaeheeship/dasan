<div class="container">
<?php if($sel !=3):?>
<div class="page center" style="height:<?=$page[0]->image_height;?>px">
    <img src="<?=base_url().$page[0]->full_path;?>">
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
