<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>게시판</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <style>
      #board_area {
	  width: 80%;
	  position: relative;
	  margin: 0 auto;
    }
    #page_num {
      font-size: 14px;
      /* margin-left: 260px; */
      /* margin-top:30px; */
      margin: 20px auto;
    }
    #page_num ul li {
      float: left;
      margin-left: 10px;
      text-align: center;
    }
    .fo_re {
      font-weight: bold;
      color:red;
    }
    #image{
      float:left;
    }
  
    </style> 
    </head>
    <body>
      <nav>
      <div id="board_area">
        <h1>거래 게시판</h1>
        <div id="search_box">
          <form action="search_result.php" method="get">
            <select name="catgo">
              <option value="major">학과선택</option>
            </select>
            <input type="text" name="search" size="40" required="required" /> <button>검색</button>
          </form>
        </div>
          <table class="list-table">
            <thead>
                <tr>
                    <th width="70">번호</th>
                    <th width="500">책 정보 </th>
				          	<th width="120">가격</th>
					          <th width="100">글쓴이</th>
                    <th width="100">작성일</th>
                </tr>
            </thead>
              <?php
			  	      include('db_connect.php');
                if(isset($_GET['page'])){
                  $page = $_GET['page'];
                }
                else{
                  $page = 1;
                }
                // 테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
                $sql = mq("select * from book_board");
                $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
                $list = 5; //한 페이지에 보여줄 개수
                $block_ct = 5; //블록당 보여줄 페이지 개수

                $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
                $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
                $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

                $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
                if($block_end > $total_page) 
                  $block_end = $total_page; //만약 블록의 마지막 번호가 페이지수보다 많다면 마지막번호는 페이지 수
                $total_block = ceil($total_page/$block_ct); //블럭 총 개수
                $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.


                $sql2 = mq("select * from book_board order by idx desc limit $start_num, $list");//5
                while($board = $sql2->fetch_array())
                {
                    //title변수에 DB에서 가져온 title을 선택
                    $book_name=$board["book_name"];
                    if(strlen($book_name)>30)
                    {
                      //title이 30을 넘어서면 ...표시
                      $title=str_replace($board["book_name"],mb_substr($board["book_name"],0,30,"utf-8")."...",$board["book_name"]);
                    }
					if($board["file"]){
           
    
						$bo_image="<img src = 'uploads/$board[file_copied]' style=width:170px; height:114px>";
          }
              ?>
            
              
            <tbody>
              <tr>
                <td width="70"><?php echo $board['idx']; ?></td>
				<td width="500">
					<div class="items">
						<div id="image">
							<?php echo $bo_image; ?>
						</div>
					<div id="book">
            <ul>
              <li>
					      <a href="book_read.php?num=<?=$board['idx']?>&page=<?=$page?>"><?php echo $book_name;?><br>
					    <?php echo $board['bo_author']?><br>
					    <?php echo $board['bo_date']?>
              </li>
                  </ul>
					</div>
                  </div>
				</td>
                <!-- <td width="120"><?php echo $book_name;?><br><?php echo $board['bo_author']?><br><?php echo $board['bo_date']?></td> -->
                <!-- <td width="120"><?php echo $board['bo_date']?></td> -->
                <td width="120"><?php echo $board['bo_price']; ?></td>
			      	<td width="100"><?php echo $board['user_name']; ?></td>
			    	<td width="100"><?php echo $board['date']; ?></td>
              </tr>
            </tbody>
                  
            <?php
            }
            ?>
                  
          
          </table>
                  
          <!---페이징 넘버 --->
          <div id="page_num">
            <ul>
              <?php
                if($page <= 1)
                { //만약 page가 1이라면
                  echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시
                }else{
                  echo "<li><a href='book_list.php?page=1'>처음</a></li>"; //처음글자에 1번페이지로 갈 수있게 링크
                }
                if($page > 1)
                {
                  $pre = $page-1;
                  echo "<li><a href='book_list.php?page=$pre'>이전</a></li>";
                }
                for($i=$block_start; $i<=$block_end; $i++){
                  //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if($page == $i){
                    echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용
                  }else{
                    echo "<li><a href='book_list.php?boapage=$i'>[$i]</a></li>";
                }
              }
                if($page < $total_page){
                  $next = $page + 1;
                  echo "<li><a href='book_list.php?page=$next'>다음</a></li>";
                }
                if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                  echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
                }else{
                  echo "<li><a href='book_list.php?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
                }

                ?>
            </ul>
          </div>
          <?php
            
             if(isset($_SESSION['userid'])){
                ?>
                <div id="write_btn">
                  <a href=book_form.php><button>글쓰기</button></a>
                </div>
                <?php
              
            }

          ?>
        
        </div>
      </body>
  </html>