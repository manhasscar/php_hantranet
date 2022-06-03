<?php
    include('db_connect.php');
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["user_nic"])) $usernic = $_SESSION["user_nic"];
    else $usernic = "";
?>		
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_right">
      <ul>
         <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
        <?php
            if (isset($_SESSION['user_nic'])){
                $user_nic = $_SESSION['user_nic'];
                }
                else{ $user_nic = '';}
                
                $sql = mq("select * from message where read_ok = 0 and rv_id = '".$user_nic."'");
                $row_num = mysqli_num_rows($sql);
             if(isset($_SESSION['userid']) && $row_num >= 1){
                echo "
                
                    <div id = 'new_message'>
                    <a target='iframe1' href='message_box.php?mode=rv'>새로운 쪽지가 ".$row_num."개 있습니다!</a>
                    </div>
                    
                    <li>
                        <a>안녕하세요 ".$_SESSION['user_nic']."님&nbsp&nbsp&nbsp</a>
                        <a href='logout.php'>로그아웃</a>
                        <a target='iframe1' href='my_page.php'>마이페이지</a>
                    <li>";
            
                }
             else if(isset($_SESSION['userid'])){

            echo "
           <li>
            <a>안녕하세요 ".$_SESSION['user_nic']."님&nbsp&nbsp&nbsp</a>
            <a href='logout.php'>로그아웃</a>
            <a target='iframe1' href='my_page.php'>마이페이지</a>
            </li>>";
            }
            else
            {
            ?>
        <li><a href="login.php">로그인</a></li>
        <li><a href="sign_up.php">회원가입</a><li>
        <?php
        }
        ?>
        </ul>
    </div>
  </div>
</div>
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <h1><a href="index1.php">Hantranet</a></h1>
  </header>
</div>
<div class="wrapper row4">
  <nav id="mainav" class="hoc clear"> 
    <ul class="clear">
      <li><a target="iframe1" class="drop" href="board.php?board_id=board">커뮤니티</a>
        <ul>
          <li><a target="iframe1" href="board.php?board_id=notice">공지사항</a></li>
          <li><a target="iframe1" href="board.php?board_id=board">자유게시판</a></li>
        </ul>
      </li>
      <li><a target="iframe1" href="book_list.php?board_id=book_board">거래게시판</a>
        <ul>
          <li><a target="iframe1" href="book_list.php">도서거래 게시판</a></li>
          <li><a target="iframe1" href="book_list.php">중고거래 게시판</a></li>
        </ul>
      </li>
      <li><a target="iframe1" href="book_list.php?board_id=book_board">정보게시판</a>
        <ul>
          <li><a target="iframe1" href="board1.php">구인구직 게시판</a></li>
          <li><a target="iframe1" href="book_list.php"></a></li>
        </ul>
      </li>
    </ul>
  </nav>
</div>