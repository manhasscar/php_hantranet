<?php
  
  if(isset($_SESSION['userid'])) $userid= $_SESSION['userid'];  
  else $userid ="";
  if(isset($_SESSION['user_nic'])) $usernic  = $_SESSION['user_nic'];
  else  $usernic ="";
   
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>쪽지함</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css"/>
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
      display: flex;
      margin-top:30px;
      justify-content: center;
      
      
    }
    #page_num ul li {
      float:left;
      margin-left: 10px;
      
    }
    .fo_re {
      font-weight: bold;
      color:red;
    }

    #board_list{
      font-size: 15px;
    }
    
    button{
      background-color: white;
      padding: 2px;
      border: solid 1px gray;
    }
    #write_btn{
      float:right;
      position:relative;
    }
    a { 
		text-decoration:none !important;
		
		color:black;
	
	}
    </style>
    </head>
    <body>
    <header>
        <?php include "header.php";?>
    </header>
    <div class="wrapper row3">
  <main class="hoc container clear"> 
    <div class="content"> 
    <div id="board_area">
      <?php
        $mode = $_GET["mode"];
        if($mode == "send"){
      ?>      
        <h1>보낸쪽지함</h1>
      <?php
        }
        else{
      ?>
        <h1>받은쪽지함</h1>
      <?php 
        }
      ?>
        <table class="list-table">
          <thead>
             	<tr>
                  	<!-- <th width="70">번호</th> -->
                    <?php
                      if($mode == "send"){
                    ?>
                    <th width="120">받는사람</th>
                    <?php 
                      }
                      else {
                    ?>
                    <th width="120">보낸사람</th>
                    <?php
                      }
                    ?>
                    <th width="500">내용</th>
                    <th width="100">날짜</th>
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
              if($mode == "send")
                  $sql = mq("select * from message where send_id = '$usernic'");
              else
                  $sql = mq("select * from message where rv_id = '$usernic'");
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
              
              if($mode == "send")
                  $sql2 = mq("select * from message where send_id = '$usernic' order by idx desc limit $start_num, $list");
              else
                  $sql2 = mq("select * from message where rv_id = '$usernic' order by idx desc limit $start_num, $list");
              
              while($message = $sql2->fetch_array())
              {
                  //content변수에 DB에서 가져온 content을 선택
                  $content=$message['content'];
                  $idx = $message['idx'];
                  if(strlen( $content)>30)
                  {
                    //내용이 30을 넘어서면 ...표시
                    $content=str_replace($content,mb_substr( $content,0,30,"utf-8")."...", $content);
                  }
                  if($mode =="send"){
                    $msg_id = $message["rv_id"];
                    $sql3 = mq("select * from user where nic_name = '$msg_id'");
                  }
                  else{
                    $msg_id = $message["send_id"];
                    $sql3 = mq("select * from user where nic_name = '$msg_id'");
                  }  
            ?> 
          <tbody>
            <tr id="board_list">
              
              <?php if($mode=="send"){ ?>
                <!-- <td width="70"><?php echo $message['idx']; ?></td> -->
              <td width="120"><?php echo $msg_id?></td>
                <td width="500"><a href="message_sendview.php?mode=<?=$mode?>&num=<?=$idx?>"><?php echo  $content;?></a></td>

                <?php
                
              }
              else if($mode != "send" && $message['read_ok'] == 0) { ?>
              
              <td width="120"><strong><?php echo $msg_id?></strong></td>
               <td width="500"><strong><a href="message_rvview.php?mode=<?=$mode?>&num=<?=$idx?>"><?php echo  $content;?></a></strong></td>
                <?php
              }
              else{
                ?>
                <!-- <td width="70"><?php echo $message['idx']; ?></td> -->
              <td width="120"><?php echo $msg_id?></td>
              <td width="500"><a href="message_rvview.php?mode=<?=$mode?>&num=<?=$idx?>"><?php echo  $content;?></a></td>
              <?php }?>
              <td width="100"><?php echo $message['regist_day']?></td>
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
                echo "<li><a href='message_box.php?mode=$mode&page=1'>처음</a></li>"; //처음글자에 1번페이지로 갈 수있게 링크
              }
              if($page > 1)
              {
                $pre = $page-1;
                echo "<li><a href='message_box.php?mode=$mode&page=$pre'>이전</a></li>";
              }
              for($i=$block_start; $i<=$block_end; $i++){
                //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                if($page == $i){
                  echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용
                }else{
                  echo "<li><a href='message_box.php?mode=$mode&page=$i'>[$i]</a></li>";
              }
            }
              if($page < $total_page){
                $next = $page + 1;
                echo "<li><a href='message_box.php?mode=$mode&page=$next'>다음</a></li>";
              }
              if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
              }else{
                echo "<li><a href='message_box.php?mode=$mode&page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
              }

              ?>
          </ul>
        </div>
        <?php
            if($mode=="send"){
        ?>
              <div id="write_btn">
                <a href='message_box.php?mode=rv'><button>받은쪽지함</button></a>
              </div>
         <?php  
              }
            else{
          ?>
        <div id="write_btn">
          <a href='message_box.php?mode=send'><button>보낸쪽지함</button></a>
        </div>
        <?php
        }
        ?> 
      </div>
    </body>
</html>
      