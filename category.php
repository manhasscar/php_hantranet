<style>
.sdb_holder > ul > li > ul {
		
		
		position: relative;
		font-size:14px;
		
	}
  
  /*.sdb_holder > ul > li:hover > ul {
		display:block;
	}*/
  </style>



<div class="sidebar one_quarter first"> 
      <h6></h6>
      <nav class="sdb_holder">
        <ul>
         <li class="nav" style="cursor: pointer;"><a class="btn1" href="book_category_result.php?college=교양">교양</a>
         <li class="nav" style="cursor: pointer;"><a class="btn1">전공</a> 
          </li>
          <li class="nav" onclick = "dp_menu('subMenu1')" style="cursor: pointer;"><a class="btn1">문과대학</a>
            <ul id = "subMenu1" style="display: none;">
              <li><a href="book_category_result.php?college=문과&major=국어국문 창작학과">국어국문 창작학과</a></li>
              <li><a href="book_category_result.php?college=문과&major=영어영문학과">영어영문학과</a></li>
              <li><a href="book_category_result.php?college=문과&major=문헌정보학과">문헌정보학과</a></li>
              <li><a href="book_category_result.php?college=문과&major=사학과">사학과</a></li>
              <li><a href="book_category_result.php?college=문과&major=기독교학과">기독교학과</a></li>
            </ul>
          </li>
          <li class="nav" onclick = "dp_menu('subMenu2')" style="cursor: pointer;"><a class="btn1">사범대학</a>
            <ul id = "subMenu2" style="display: none;">
              <li><a href="book_category_result.php?college=사범&major=국어교육과">국어교육과</a></li>
              <li><a href="book_category_result.php?college=사범&major=영어교육과">영어교육과</a></li>
              <li><a href="book_category_result.php?college=사범&major=교육학과">교육학과</a></li>
              <li><a href="book_category_result.php?college=사범&major=역사교육과">역사교육과</a></li>
              <li><a href="book_category_result.php?college=사범&major=미술교육과">미술교육과</a></li>
              <li><a href="book_category_result.php?college=사범&major=수학교육과">수학교육과</a></li>
            </ul>
          </li>
          <li class="nav" onclick = "dp_menu('subMenu3')" style="cursor: pointer;"><a class="btn1">공과대학</a>
            <ul id = "subMenu3" style="display: none;">
              <li><a href="book_category_result.php?college=공과&major=정보통신공학과">정보통신공학과</a></li>
              <li><a href="book_category_result.php?college=공과&major=전기전자공학과">전기전자공학과</a></li>
              <li><a href="book_category_result.php?college=공과&major=멀티미디어공학과">멀티미디어공학과</a></li>
              <li><a href="book_category_result.php?college=공과&major=건축학과">건축학과</a></li>
              <li><a href="book_category_result.php?college=공과&major=토목 건축공학부">토목 건축공학부</a></li>
              <li><a href="book_category_result.php?college=공과&major=기계공학과">기계공학과</a></li>
              <li><a href="book_category_result.php?college=공과&major=화학공학과">화학공학과</a></li>
              <li><a href="book_category_result.php?college=공과&major=신소재공학과">신소재공학과</a></li>
            </ul>
          </li>
          <li class="nav" onclick = "dp_menu('subMenu4')" style="cursor: pointer;"><a  class="btn1">스마트융합대학</a>
            <ul id = "subMenu4" style="display: none;">
              <li><a href="book_category_result.php?college=스마트융합&major=컴퓨터공학과">컴퓨터공학과</a></li>
              <li><a href="book_category_result.php?college=스마트융합&major=AI융합학과">AI융합학과</a></li>
              <li><a href="book_category_result.php?college=스마트융합&major=수학과">수학과</a></li>
              <li><a href="book_category_result.php?college=스마트융합&major=빅데이터응용학과">빅데이터응용학과</a></li>
            </ul>
          </li>
          <li class="nav" onclick = "dp_menu('subMenu5')" style="cursor: pointer;"><a  class="btn1">경상대학</a>
            <ul id = "subMenu5" style="display: none;">
              <li><a href="book_category_result.php?college=경상&major=경영학과">경영학과</a></li>
              <li><a href="book_category_result.php?college=경상&major=회계학과">회계학과</a></li>
              <li><a href="book_category_result.php?college=경상&major=무역학과">무역학과</a></li>
              <li><a href="book_category_result.php?college=경상&major=경제학부">경제학부</a></li>
            </ul>
          </li>
          <li class="nav" onclick = "dp_menu('subMenu6')" style="cursor: pointer;"><a  class="btn1">사회과학대학</a>
            <ul id = "subMenu6" style="display: none;">
              <li><a href="book_category_result.php?college=사회과학&major=법학부">법학부</a></li>
              <li><a href="book_category_result.php?college=사회과학&major=행정학과">행정학과</a></li>
              <li><a href="book_category_result.php?college=사회과학&major=경찰학과">경찰학과</a></li>
              <li><a href="book_category_result.php?college=사회과학&major=언론학과">정치.언론학과</a></li>
              <li><a href="book_category_result.php?college=사회과학&major=사회복지학과">사회복지학과</a></li>
              <li><a href="book_category_result.php?college=사회과학&major=상담심리학과">상담심리학과</a></li>
              <li><a href="book_category_result.php?college=사회과학&major=사회적경제기업학과">사회적경제기업학과</a></li>
            </ul>
          </li>
          <li class="nav" onclick = "dp_menu('subMenu7')" style="cursor: pointer;"><a  class="btn1">생명나노과학대학</a>
            <ul id = "subMenu7" style="display: none;">
              <li><a href="book_category_result.php?college=생명나노과학&major=생명시스템과학과">생명시스템과학과</a></li>
              <li><a href="book_category_result.php?college=생명나노과학&major=식품영양학과">식품영양학과</a></li>
              <li><a href="book_category_result.php?college=생명나노과학&major=화학과">화학과</a></li>
              <li><a href="book_category_result.phpcollege=생명나노과학&major=간호학과">간호학과</a></li>
              <li><a href="book_category_result.phpcollege=생명나노과학&major=스포츠과학과">스포츠과학과</a></li>
              <li><a href="book_category_result.phpcollege=생명나노과학&major=바이오제약공학과">바이오제약공학과</a></li>
            </ul>
          </li>
          <li class="nav" onclick = "dp_menu('subMenu8')" style="cursor: pointer;"><a class="btn1">탈메이지교양.융합대학</a>
            <ul id = "subMenu8" style="display: none;">
              <li><a href="book_category_result.php?college=탈메이지교양.융합&major=자유전공학부">자유전공학부</a></li>
              <li><a href="book_category_result.php?college=탈메이지교양.융합&major=창의융합학부">창의융합학부</a></li>
            </ul>
          </li>
          <li class="nav" onclick = "dp_menu('subMenu9')" style="cursor: pointer;"><a class="btn1">아트&디자인테크놀로지대학</a>
            <ul id = "subMenu9" style="display: none;">
              <li><a href="book_category_result.php?college=탈메이지교양.융합&major=융합디자인학과">융합디자인학과</a></li>
              <li><a href="book_category_result.php?college=탈메이지교양.융합&major=회화과">회화과</a></li>
              <li><a href="book_category_result.php?college=탈메이지교양.융합&major=의류학과">의류학과</a></li>
              <li><a href="book_category_result.php?college=탈메이지교양.융합&major=회화과">회화과</a></li>
            </ul>
          </li>

        </ul>
      </nav>
    </div>
    <script>
        function dp_menu(a){
            
            let click = document.getElementById(a);
            if(click.style.display === "none"){
                click.style.display = "block";
 
            }else{
                click.style.display = "none";
 
            }
        }
    </script>