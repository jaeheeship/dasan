<div class="sidebar center">
    <?php foreach($menu as $key => $sub) :?>     
        <?php if($key == '3') :?> 
        <fieldset><legend><?=$sub[0]['title'];?></legend></fieldset>
        <ul>
        <?php foreach($sub as $key => $val) :?>     
            <li><a <?php if($val['no'] == $sub_sel){?> style="color: rgb(82, 190,245);" <?php } ?> href="<?=base_url()."page/go/".$val['no']?>"><?=$val['title'];?></a></li>
        <?php endforeach ;?>
        </ul>
        <?php endif;?>
    <?php endforeach ;?>
</div>
