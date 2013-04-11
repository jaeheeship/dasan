<div class="container">
<div class="board_header"></div>
<br>
    <div class="board_panal">   
        <div class="board_title">
            <br>
            <div class="board_title_s">제목:</div>
            <div class="board_title_c"><?=$document->title;?></div>
            <div class="board_title_e"><?=$document->create_at;?></div>
        </div>
        <div class="board_discription">
            <div><?=$document->discription;?></div>
        </div>
        <div class="board_end">
            <br>
            <div class="board_end_c"><?=$document->writer;?></div>
        </div>
    </div>
    <div class="board_button">
            <a class="btn" href="<?=base_url()."page/board";?>">목록</a>
        </div>
 </div>
