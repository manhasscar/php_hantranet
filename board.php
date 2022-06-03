<?php
$board_id = $_GET['board_id'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>게시판</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css"/>
    <link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
    <link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <style>
    .row1 {
    color: #4aa8d8;
    background-color: #FFFFFF;
}
.row3 {
    color: #222222;
    background-color: #FFFFFF;
}
.row4 {
    color: #CBCBCB;
    background-color: #4aa8d8;
}
.splitclrs {
    color: #929292;
    background: linear-gradient(to right, #fff 0%,#Fff 50%,#FFFFFF 50%,#FFFFFF 100%);
}
.heading{
    color: #171414;
    font-weight: bold;
}
p{
    color: #171414;
}
.plus{
    float: right !important;
}
.list-table {
	width: 100%;
	margin-top: 40px;
}
.list-table thead th{
	height:40px;
	border-top:2px solid #09C;
	border-bottom:1px solid #CCC;
	font-weight: bold;
	font-size: 17px;
}
.list-table tbody td{
	text-align:center;
	padding:10px 0;
	border-bottom:1px solid #CCC; height:20px;
	font-size: 14px
}
th {
    color: #000000;
    background-color: #FFFFFF;
    text-align: center;
}
thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
}
table, th, td, #comments .avatar, #comments input, #comments textarea{border-color:#FFFFFF;}
tr, #comments li, #comments input[type="submit"], #comments input[type="reset"] {
    color: inherit;
    background-color: #ffffff;
}
h1 {
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}
td{
    color: #000000;
}
#page_num {
      font-size: 14px;
      margin-left: auto;
      display: flex;
      margin-top:30px;
      justify-content: center;
      
      
    }
    #page_num ul li {
      float: left;
      float:left;
      margin-left: 10px;
      text-align: center;
      
    }
    .fo_re {
      font-weight: bold;
    }
    #write_btn, .btn, .btn.inverse:hover {
    color: #FFFFFF;
    background-color: #05B3F2;
    border-color: #05B3F2;
    border-radius: 10px;
    background-clip: padding-box;
    }
    #wrarper{
      position: fixed;
      top:0px;
      background-color:white;
      width:1200px;

    }
    #search_box{
      display:flex;
    }
    #serch_box > form{
      display:flex;
    }

</style>
<body id="top">
<header>
    <?php include "header.php";?>
</header>
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <div class="content"> 
    <?php
      if($board_id=="board"){
    ?>
    <h1>자유게시판</h1>
    <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
    <div id="search_box">
        <form action="search_result.php" method="get" style="display: flex;">
          <select name="catgo">
            <option value="title">제목</option>
            <option value="name">글쓴이</option>
            <option value="content">내용</option>
          </select>
          <input type="text" name="search" size="40" required="required" /> <button>검색</button>
        </form>
    </div>


    <?php
      }
    ?>
  
        <?php
      if($board_id=="notice"){
        ?>
      <h1>공지사항</h1>
      <h4>공지사항 게시판입니다.</h4>
      <?php
      }
      ?>

        <table class="list-table">
          <thead>
              <tr>
                  <th width="70">번호</th>
                    <th width="500">제목</th>
                    <th width="120">글쓴이</th>
                    <th width="100">작성일</th>
                    <th width="100">조회수</th>
                </tr>
          </thead>
          <?php
              if(isset($_GET['page'])){
                $page = $_GET['page'];
              }
              else{
                $page = 1;
              }
              // 테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
              $sql = mq("select * from $board_id");
              $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
              $list = 5; //한 페이지에 보여줄 개수
              $block_ct = 5; //블록당 보여줄 페이지 개수

              $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
              $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
              $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

              $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
              if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
              $total_block = ceil($total_page/$block_ct); //블럭 총 개수
              $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.


              $sql2 = mq("select * from ".$board_id." order by idx desc limit $start_num, $list");
              while($board = $sql2->fetch_array())
              {
                  //title변수에 DB에서 가져온 title을 선택
                  $title=$board["title"];
                  $con_idx = $board["idx"];
                  $reply_count = mq("SELECT COUNT(*) AS cnt FROM ".$board_id."_reply where con_num=$con_idx");
                  $con_reply_count = $reply_count->fetch_array();
                  if(strlen($title)>30)
                  {
                    //title이 30을 넘어서면 ...표시
                    $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                  }
              
            ?>
              <tbody>
            <tr id="board_list">
              <td width="70"><?php echo $board['idx']; ?></td>
              <td width="500"><a href="read.php?board_id=<?php echo $board_id?>&idx=<?php echo $board["idx"];?>"><?php echo $title."[".$con_reply_count["cnt"]."]";?></a></td>
              <td width="120"><?php echo $board['name']?></td>
              <td width="100"><?php echo $board['date']?></td>
              <td width="100"><?php echo $board['hit']; ?></td>
            </tr>
          </tbody>
                
          <?php
          }
          ?>
                
        
        </table>
          
</div>          
   <!---페이징 넘버 --->
        <div id="page_num">
          <ul>
            <?php
              if($page <= 1)
              { //만약 page가 1보다 크거나 같다면
                echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시
              }else{
                echo "<li><a href='?board_id=$board_id&page=1'>처음</a></li>"; //처음글자에 1번페이지로 갈 수있게 링크
              }
              if($page > 1)
              {
                $pre = $page-1;
                echo "<li><a href='?board_id=$board_id&page=$pre'>이전</a></li>";
              }
              for($i=$block_start; $i<=$block_end; $i++){
                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                if($page == $i){
                  echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용
                }else{
                  echo "<li><a href='?board_id=$board_id&page=$i'>[$i]</a></li>";
              }
            }
              if($page < $total_page){
                $next = $page + 1;
                echo "<li><a href='?board_id=$board_id&page=$next'>다음</a></li>";
              }
              if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
              }else{
                echo "<li><a href='?board_id=$board_id&page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
              }

              ?>
          </ul>
        </div>
        <?php
          if($board_id=="notice"){
            if(isset($_SESSION['userid']) && $_SESSION['userid'] == 'admin'){
              ?>
              <footer><a class="btn" href="write.php?board_id=<?php echo $board_id;?>">글쓰기</a></footer>
              <?php
            
          }
        }
          elseif(isset($_SESSION['userid'])){
        ?>
         <footer><a class="btn" href="write.php?board_id=<?php echo $board_id;?>">글쓰기</a></footer>
        <?php
        }
        ?>
      </div>
    </body>
</html>
      