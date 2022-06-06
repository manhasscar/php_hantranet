<!DOCTYPE html>
<html>
  <head>
    <title>게시판</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
    <link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="mystyle.css"/>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <style>
      .btn1, .btn1.inverse:hover{color:#FFFFFF; background-color:#F0F8FF; border-color:#05B3F2;}
      </style>
    <body id="top">
    <header>
        <?php include "header.php";?>
    </header>
      <div class="wrapper row3">
        <main class="hoc container clear">
        <div class="sidebar one_quarter first"> 
      <h6>My page</h6>
      <nav class="sdb_holder">
        <ul>
          <li class="nav"><a href="my_page_result.php?info=content" class="btn1">내가 쓴 글</a>
            <ul class = "subMenu">
              <li><a href="my_page_result.php?info=content">커뮤니티</a></li>
              <li><a href="my_page_result.php?info=content&board=book">거래게시판</a></li>
              <li><a href="my_page_result.php?info=content&board=recruit">정보게시판</a></li>
            </ul>
          </li>
          <li class="nav"><a href="my_page_result.php?info=reply" class="btn1">내가 쓴 댓글</a>
          </li>
          <li class="nav"><a href="my_message_result.php?info=message&board=send" class="btn1">쪽지함</a>
            <ul class = "subMenu">
              <li><a href="my_message_result.php?info=message&board=send">보낸쪽지함</a></li>
              <li><a href="my_message_result.php?info=message&board=rv">받은쪽지함</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
        <div class="content three_quarter"> 
        <h1>내정보</h1>
        <?php
            if(isset($_GET["info"]))
                $info = $_GET["info"];
            else $info = "";
            if(isset($_GET["board"]))
            $board = $_GET["board"];
            else $board = "";
            if($info == "message" && $board == "send"){
          ?>   <h3>보낸쪽지함</h3>
              <?php
                }
                else{
              ?>
                <h3>받은쪽지함</h3>
              <?php 
                }
              ?>
          <table class="list-table">
               <thead>
                  <tr>
                    <th width="70">선택</th>
                    <?php if($board == "send") { ?>
                    <th width="120">받는사람</th>
                    <?php }else { ?>
                    <th width="120">보낸사람</th>
                    <?php } ?>
                    <th width="500">내용</th>
                    <th width="100">날짜</th>
                  </tr>     
                </thead>  
                <form method="post" action="message_delete.php">
                <?php      
                     if(isset($_GET['page'])){
                          $page = $_GET['page'];
                        }
                        else{
                          $page = 1;
                        }
                      if($board == "send")
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

                      if($board == "send")
                         $sql2 = mq("select * from message where send_id = '$usernic' order by idx desc limit $start_num, $list");
                      else
                          $sql2 = mq("select * from message where rv_id = '$usernic' order by idx desc limit $start_num, $list");
                      while($message = $sql2->fetch_array())
                      {
                        $num = $message["idx"];
                        $content=$message["content"];
                        if(strlen($content)>30)
                        {
                          //title이 30을 넘어서면 ...표시
                          $content=str_replace($content,mb_substr($content,0,30,"utf-8")."...", $content);
                        }
                        if($board =="send"){
                          $msg_id = $message["send_id"];
                          $sql3 = mq("select * from user where nic_name = '$msg_id'");
                        }
                        else{
                          $msg_id = $message["rv_id"];
                          $sql3 = mq("select * from user where nic_name = '$msg_id'");
                        }  
                  ?>
                    <tbody>
                    <tr id="board_list">
                    <?php if($board=="send"){ ?>
                      <td width="70"><input type="checkbox" name="item[]" value="<?=$num?>"></td>
                      <td width="120"><?=$message['rv_id'] ?></td>
                      <td width="500"><a href="message_sendview.php?mode=send&num=<?=$message['idx']?>"><?php echo  $content;?></a></td>
                      <?php
                        }
                         else if($board != "send" && $message['read_ok'] == 0) { ?>
                          <td width="70"><input type="checkbox" name="item[]" value="<?=$num?>"></td>
                         <td width="120"><strong><?=$message['send_id']?></strong></td>
                         <td width="500"><strong><a href="message_rvview.php?mode=rv&num=<?=$message['idx']?>"><?php echo  $content;?></a></strong></td>
                      <?php
                         }
                         else{
                          ?>
                        <td width="70"><input type="checkbox" name="item[]" value="<?=$num?>"></td>    
                       <td width="120"><?=$message['send_id']?></td>
                       <td width="500"><a href="message_rvview.php?mode=rv&num=<?=$message['idx']?>"><?php echo  $content;?></a></td>
                      <?php }?>
                       <td width="100"><?php echo $message['regist_day']?></td>
                       </tr>
                      </tbody>
                
                      <?php } ?>
                            
                      </table>
                      <button type="submit" style="float:right;" class="btn">선택된 글 삭제</button>
                      </form> 
          
              
                 <!---페이징 넘버 --->
          <div id="page_num">
            <ul>
              <?php
                if($page <= 1)
                { //만약 page가 1이라면
                  echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시
                }else{
                  echo "<li><a href='my_message_result.php?info=message&board=$board&page=1'>처음</a></li>"; //처음글자에 1번페이지로 갈 수있게 링크
                }
                if($page > 1)
                {
                  $pre = $page-1;
                  echo "<li><a href='my_message_result.php?info=message&board=$board&page=$pre'>이전</a></li>";
                }
                for($i=$block_start; $i<=$block_end; $i++){
                  //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                  if($page == $i){
                    echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용
                  }else{
                    echo "<li><a href='my_message_result.php?info=message&board=$board&page=$i'>[$i]</a></li>";
                }
              }
                if($page < $total_page){
                  $next = $page + 1;
                  echo "<li><a href='my_message_result.php?info=message&board=$board&$next'>다음</a></li>";
                }
                if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                  echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
                }else{
                  echo "<li><my_message_result.php?info=message&board=$board&page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
                }

                ?>
            </ul>
          </div>
                 
          </div>  
        </div>
      </main>
      <div class="wrapper row4">
      <footer id="footer" class="hoc clear"> 
      </footer>
      </div>
      </body>
  </html>