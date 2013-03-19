<?php if($this->uri->segment(2) =="board"):?>
<div class="board_footer"></div>
<?php endif;?>
	<div class="footer center">
		<span>사업자 번호 : 101-86-06714 | 주소 : 서울시 종로구 운니동 율곡로84(운니동 98-78) 가든타워빌딩 2층 | TEL : 02-738-8507 | 상호명 : (주)다산여행 | 대표자 : 김운석</span>
		<br>
		<br>
		<span> COPYRIGHT &copy 2013 DASANTOUR. ALL RIGHTS RESERVED</span>
	</div>
</body>
<script>
    $('#menu li').hover(function(){
       $('#navigator').fadeIn(1000);
      }, function(e){
        if($(e.toElement).hasClass('navigation')){
                $('#navigator').fadeOut(300);
                }
         
    });
</script>
</html>
