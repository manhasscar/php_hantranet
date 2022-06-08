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
          <li class="nav" onclick = "dp_menu('subMenu1')" style="cursor: pointer;"><a class="btn1">내가 쓴 글</a>
            <ul id = "subMenu1" style="display: none;">
              <li><a href="my_page_result.php?info=content">커뮤니티</a></li>
              <li><a href="my_page_result.php?info=content&board=book">도서거래게시판</a></li>
              <li><a href="my_page_result.php?info=content&board=item">중고거래게시판</a></li>
              <li><a href="my_page_result.php?info=content&board=recruit">정보게시판</a></li>
            </ul>
          </li>
          <li class="nav"><a href="my_page_result.php?info=reply" class="btn1">내가 쓴 댓글</a>
          </li>
          <li class="nav" onclick = "dp_menu('subMenu2')" style="cursor: pointer;"><a  class="btn1">쪽지함</a>
            <ul id = "subMenu2" style="display: none;">
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
            if(isset($_GET["info"])) $info = $_GET["info"];
            else $info = "";
            if(isset($_GET["board"])) $board = $_GET["board"];
            else $board = "";
            if(isset($_GET['page'])) $page = $_GET['page'];
           else $page = 1;
          
           if($info == "content"){
               echo 
                 "<table class='list-table'>
                  <thead>
                     <tr>
                    <th width='70'>선택</th>
                    <th width='70'>번호</th>
                    <th width='500'>제목</th>
                    <th width='100'>작성일</th>
                    </tr>
                 </thead>";
                  if($board == "book"){
                   echo "<form method='post' action='book_delete.php'>";
                   $sql2 = mq("select * from book_board where user_id='$userid' order by idx desc");}
                  elseif($board == "item") { 
                    echo "<form method='post' action='item_delete.php'>";
                    $sql2 = mq("select * from item_board where user_id='$userid' order by idx desc");}
                  elseif($board == "recruit") { 
                    echo "<form method='post' action='recruit_delete.php'>";
                    $sql2 = mq("select * from recruit_board where user_id='$userid' order by idx desc");}
                  else{
                    echo "<form method='post' action='delete.php'>";
                    $sql2 = mq("select * from board where id='$userid' order by idx desc");
                  }
                    while($boards = $sql2->fetch_array())
                    {
                        $num = $boards["idx"];
                        $title=$boards["title"];
                        if(strlen($title)>30)
                        {
                          $title=str_replace($title,mb_substr($title,0,30,"utf-8")."...",$title);
                        }
                  ?>
                    <tbody>
                     <tr>
                     <td width="70"><input type="checkbox" name="item[]" value="<?=$num?>"></td>
                      <td width="70"><?php echo $boards['idx']; ?></td>
                      <?php if($board == "book"){ 
                     echo "<td width='500'><a href='book_read.php?num=$num'>$title</a></td>";
                     } elseif($board == "item") { 
                     echo "<td width='500'><a href='item_read.php?num=$num'>$title</a></td>"; 
                     } elseif($board == "recruit"){
                      echo "<td width='500'><a href='recruit_read.php?num=$num'>$title</a></td>"; 
                     }else{
                      echo "<td width='500'><a href='read.php?board_id=board&idx=$num'>$title</a></td>";
                     } ?>
                      <td width="100"><?php echo $boards['date']?></td>
                  </tr>
                </tbody>       
                <?php } ?>
                </table>   
                <button type="submit" style="float:right;" class="btn">선택된 글 삭제</button>
                </form>    
                <?php  }   
                if($info == "reply"){  
              echo "
                <table class='list-table'>
                <thead>
                  <tr>
                    <th width='70'>글</th>
                    <th width='500'>댓글</th>
                    <th width='100'>작성일</th>
                  </tr>
               </thead>";
                $sql2 = mq("SELECT book_board.idx, book_board.title, book_board_reply. * from book_board inner join book_board_reply on book_board.idx = book_board_reply.con_num where book_board_reply.id = '$userid' UNION ALL 
                SELECT board.idx, board.title, board_reply. * from board inner join board_reply on board.idx = board_reply.con_num where board_reply.id = '$userid' UNION ALL
                SELECT recruit_board.idx, recruit_board.title, recruit_board_reply. * from recruit_board join recruit_board_reply on recruit_board.idx = recruit_board_reply.con_num where recruit_board_reply.id = '$userid' UNION ALL
                SELECT item_board.idx, item_board.title, item_board_reply. * from item_board join item_board_reply on item_board.idx = item_board_reply.con_num where item_board_reply.id = '$userid';");
                    while($board = $sql2->fetch_array())
                  {
                      $num = $board["idx"];
                      $content=$board["content"];
                      if(strlen($content)>30)
                       {
                          $content=str_replace($content,mb_substr($content,0,30,"utf-8")."...",$content);
                       }
                    ?>
                  <tbody>
                  <tr> 
                      <td width="70"><?php echo $board['title']; ?></td>
                      <td width="500"><?php echo $content;?></a></td>
                      <td width="100"><?php echo $board['date']?></td>
                   </tr>
                  </tbody>
                  <?php } 
                   } 
                   ?>
                </table>
               </div>  
            </div>
        </main>
    </body>
 </html>
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