<?php if($this->uri->segment(2) =="board"):?>
<div class="board_footer"></div>
<?php endif;?>
	<div class="footer center">
		<span>사업자 번호 : 101-86-06714 | 주소 : 서울시 종로구 운니동 율곡로84(운니동 98-78) 가든타워빌딩 2층 | TEL : 02-738-8507 | 상호명 : (주)다산여행 | 대표자 : 김운석</span>
		<br>
		<br>
		<span style="color: #777;"> COPYRIGHT &copy 2013 DASANTOUR. ALL RIGHTS RESERVED</span>
	</div>
</body>
<script>
    $('#menu').hover(function(){
       $('#navigator').fadeIn(1000);
      }, function(){
          $(window).mousemove(function(e){
            if(!$(e.toElement).hasClass('navigation')){
                $('#navigator').fadeOut(700);
                $(window).unbind('mousemove');
            }
          });
    });
</script>
</html>
