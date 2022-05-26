<?php
session_start();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>HantraNet.</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="mystyle.css"/>
    <style>
    *{
      background-color: white;

    }
    body{
    }
    header {
      width: 100%;
      height: 100px;
    }
    nav {
      width: 100%;
      height: 23px;
      border-top: 1px solid #09C;
      border-bottom: 1px solid #09C;
      margin-right: 10%;
      background-color: #4aa8d8;
      color: white;
    }
    nav a{
      background-color: #4aa8d8;
      color: white;
      text-decoration: none;
      margin:3px;
    }

      #left{
        position: fixed;
        left: 30px;top: 200px;bottom: 0;
        width: 200px;
      }
      #left ul{
        background-color: #4aa8d8;
        list-style: none;
        margin: 0;
        padding: 0;
      }
      #left ul li{
        margin-left: 20px;
        padding-top: 5px;
        background-color: #4aa8d8;
      }
      #left ul li a{
        background-color: #4aa8d8;
        color: white;
        text-decoration: none;
      }
      #main{
        padding-left: 250px;
        padding-top: 20px;
        left: 250px;top: 200px;bottom: 0;
        width: 75%;
        height: 500px;
      }
    footer{
      background-image: url('images/footer_bg.gif');
      width: 100%;
      position: fixed;
      left: 0;top: 700px;bottom: 0;
      height: 50px;
      clear: both;
      text-align: center;
    }
      .f{
        text-align: center;
      }
    #title{
      display: table;
    }
    #title > h1 {
      display: table-cell; 
      text-align:center;
      vertical-align: middle;
    }
    #title > h1 > a {
      color: #4aa8d8
    }
    </style>
  </head>
  <body>
    <header id=title>
      <h1>
        <a  href="index.php">HantraNet</a>
      </h1>
    </header>
    <?php
      if(isset($_SESSION['userid'])){

    echo "<nav align=right>
      안녕하세요 ".$_SESSION['user_nic']."님&nbsp&nbsp&nbsp
      <a href='logout.php'>로그아웃</a>
      <a target='iframe1' href='my_page.php'>마이페이지</a>
    </nav>";

    }
    else
    {

    ?>
    <nav align=right>
      <a href="login.php">로그인</a>
      <a href="sign_up.php">회원가입</a>
    </nav>
    <?php
    }
    ?>
    
    <aside id="left">
      <h4>카테고리</h4>
      <ul>
        <li><a target="iframe1" href="board.php?board_id=notice">공지사항</a></li>
        <li><a target="iframe1" href="board.php?board_id=board">자유게시판</a></li>

        <li><a target="iframe1" href="board.php?board_id=music">음악</a></li>
        <li><a target="iframe1" href="board.php?board_id=movie">영화</a></li>
      </ul>
    </aside>
    <section id="main">
      <article id="article1">
        <iframe name="iframe1" src="main.php" width="100%" height="700px" seamless></iframe>
      </article>
    </section>
    
  </body>
  
</html>
