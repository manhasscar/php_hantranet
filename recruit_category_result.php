<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
<link rel="stylesheet" type="text/css" href="mystyle.css"/>
<link rel="stylesheet" type="text/css" href="css/common.css"/>
<style>
  .btn1, .btn1.inverse:hover{color:#FFFFFF; background-color:#F0F8FF; border-color:#05B3F2;}
  </style>
</head>
<body id="top">
    <header>
      <?php include "header.php";?>
  </header>
  <div class="wrapper row3">
  <main class="hoc container clear"> 
    <?php include('category2.php');?>
    <div class="content three_quarter"> 
        <?php
        if(isset($_GET["category"])){ $category=$_GET["category"];
            echo "<h1>{$category}</h1>";
        }
        else  $category="";
        if(isset($_GET['page'])) $page = $_GET['page'];
          else $page = 1;   
        ?>
      
      <div id="search_box">
        <form action="recruit_search_result.php" method="get">
          <select name="catgo">
            <option value="title">제목</option>
            <option value="name">글쓴이</option>
            <option value="category">분야</option>
          </select>
          <input type="text" name="search" size="40" required="required" /> <button>검색</button>
        </form>
    </div>
          <table class="list-table">
            <thead>
                <tr>
                    <th width="70">번호</th>
                    <th width="400">제목</th>
				          	<th width="200">모집 기간</th>
					          <th width="100">글쓴이</th>
                    <th width="100">작성일</th>
                </tr>
            </thead>
        <?php
        if($category){
         $sql = mq("select * from recruit_board where category like '$category%' order by idx desc" );
        }
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
        
        if($category){
            $sql = mq("select * from recruit_board where category like '$category%' order by idx desc" );
           }
                  while($board = $sql->fetch_array())
                  {
                   $num = $board["idx"];
                   $title=$board["title"];
                  if(strlen($title)>30)
                  {
                    //title이 30을 넘어서면 ...표시
                    $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                  }
        
                  if($board["file"]){
                    $bo_image="<img src = 'uploads/$board[file_copied]' style= width:120px;height:150px;>";
                  }
        ?>
        <tbody>
            <tr id="board_list">
              <td width="70"><?php echo $board['idx']; ?></td>
              <td width="400"><a href="recruit_read.php?num=<?=$board['idx'];?>"><?php echo $title;?></a></td>
              <td width="200"><?php echo $board['period_s']?>~<?php echo $board['period_e']?></td>
              <td width="100"><?php echo $board['nic_name']?></td>
              <td width="100"><?php echo $board['date']?></td>
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
                  echo "<li><a href='recruit.php?page=1'>처음</a></li>"; //처음글자에 1번페이지로 갈 수있게 링크
                }
                if($page > 1)
                {
                  $pre = $page-1;
                  echo "<li><a href='recruit.php?page=$pre'>이전</a></li>";
                }
                for($i=$block_start; $i<=$block_end; $i++){
                  //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if($page == $i){
                    echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용
                  }else{
                    echo "<li><a href='recruit.php?page=$i'>[$i]</a></li>";
                }
              }
                if($page < $total_page){
                  $next = $page + 1;
                  echo "<li><a href='recruit.php?page=$next'>다음</a></li>";
                }
                if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                  echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
                }else{
                  echo "<li><a href='recruit.php?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
                }

                ?>
            </ul>
          </div>
          <?php
            if(isset($_SESSION['userid']) && $_SESSION['userid'] == 'admin'){
            echo " <footer><a class='btn' href='recruit_form.php'  style='float:right'>글쓰기</a></footer>";
             }
            elseif(isset($_SESSION['userid'])){
             echo " <footer><a class='btn' href='recruit_form.php' style='float:right'>글쓰기</a></footer>";
          }
        ?>
        
        </div>
        </div>
      </main>
      </div>
      </body>
  </html>


