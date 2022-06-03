<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="mystyle.css"/>
    <link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
    <link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');
    *{
      font-family: 'Nanum Gothic', 'sans-serif', Arial ;
    } 
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
 
    .my_G {
      margin-top: 40px;
    }
    .my_G thead th{
      height:40px;
      border-top:2px solid #09C;
      border-bottom:1px solid #CCC;
      font-weight: bold;
      font-size: 17px;
    }
    .my_G tbody td{
      text-align:center;
      padding:10px 0;
      border-bottom:1px solid #CCC; height:20px;
      font-size: 14px
    }
    .list-table {
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
    a { 
		text-decoration:none !important 
	
	  }
    </style>
  </head>
  <body id="top">
    <header>
       <?php include "header.php";?>
    </header>
    <div  class="wrapper row3">
      <main class = "hoc container clear">
        <div class = "sidebar one_quarter first">
        <h6>My page</h6> 
        <nav class="sdb_holder">
        <ul>
          <li value="mycontent"><a href="#">내가 쓴 글</a>
            <ul>
              <li value="myboard"><a href="#">커뮤니티</a></li>
              <li><a href="mybook">거래 게시판</a></li>
            </ul>
          </li>
          <li><a href="#">내가 쓴 댓글</a>
            <ul>
              <li><a href="#">커뮤니티</a></li>
              <li><a href="#">거래게시판</a>
              </li>
            </ul>
          </li>
          <li><a href="#">정보 수정</a></li>
        </ul>
      </nav>
      <div class = "content three_quarter">
  </div>
  </div>
  </body>
  </html>
  <!-- <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'mycontent')" id="defaultOpen">내가 쓴 글</button>
    <button class="tablinks" onclick="openCity(event, 'myreply')">내가 쓴 댓글</button>
    <button class="tablinks" onclick="openCity(event, 'mymessage')">쪽지함</button>
    <button class="tablinks" onclick="openCity(event, 'myinfo')">내 정보</button>
  </div>
  <div id="mycontent" class="tabcontent">
    <h3>내가 쓴 글</h3>
    <form action="mypage_result.php" method="post">
      <select name="board_name">
        <option value="">게시판선택</option>
        <option value="board">자유게시판</option>
        <option value="book_board">거래게시판</option>
        <option value="기타">정보게시판</option>
      </select>
      <input type="submit" name="search" size="40" value="확인"/>
    </form>
    <table class="list-table">
      <thead>
        <tr>
            <th width="70">번호</th>
            <th width="500">제목</th>
            <th width="100">작성일</th>
            <th width="100">조회수</th>
        </tr>
      </thead>
      <?php
      // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
        $sql = mq("select * from board where id='$userid' order by idx desc" );
          while($board = $sql->fetch_array())
          {
            //title변수에 DB에서 가져온 title을 선택
            $title=$board["title"];
            if(strlen($title)>30)
            {
              //title이 30을 넘어서면 ...표시
              $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
            }
      ?>
      <tbody>
      <tr>
        <td width="70"><?php echo $board['idx']; ?></td>
        <td width="500"><a href="read.php?board_id=board&idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
        <td width="100"><?php echo $board['date']?></td>
        <td width="100"><?php echo $board['hit']; ?></td>
      </tr>
      </tbody>
      <?php } ?>
    </table>
  </div>
내가 쓴 댓글 -->
  <!-- <div id="myreply" class="tabcontent">
    <h3>내가 쓴 댓글</h3>
    <form action="mypage_result.php" method="post">
      <select name="board_name">
        <option value="">게시판선택</option>
        <option value="boardreply">커뮤니티</option>
        <option value="book_boardreply">거래게시판</option>
        <option value="기타">정보게시판</option>
      </select>
      <input type="submit" name="search" size="40" value="확인"/>
    </form>
    <table class="list-table">
     <thead>
        <tr>
            <th width="70">번호</th>
            <th width="500">댓글</th>
            <th width="100">작성일</th>
        </tr>
      </thead>
      <?php
      // board_reply테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
        $sql = mq("select * from board_reply where id='$userid' order by idx desc" );
          while($board = $sql->fetch_array())
          {
            //content변수에 DB에서 가져온 content을 선택
            $content=$board["content"];
            if(strlen($content)>30)
            {
              //content이 30을 넘어서면 ...표시
              $content=str_replace($board["content"],mb_substr($board["content"],0,30,"utf-8")."...",$board["content"]);
            }
      ?>
    <tbody>
      <tr>
        <td width="70"><?php echo $board['idx']; ?></td>
        <td width="500"><a href="read.php?board_id=board&idx=<?php echo $board["con_num"];?>"><?php echo  $content;?></a></td>
        <td width="100"><?php echo $board['date']?></td>
      </tr>
    </tbody>
    <?php } ?>
  </table>
</div>
쪽지함 -->
<!-- <div id="mymessage" class="tabcontent">
  <h3>받은 쪽지함</h3>
  <table class="list-table">
    <thead>
        <tr>
          <th width="70">보낸사람</th>
          <th width="500">내용</th>
          <th width="100">날짜</th>
        </tr>
    </thead>
      <?php 
      // message테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
        $sql = mq("select * from message where rv_id='$usernic' order by idx desc" );
          while($board = $sql->fetch_array())
          {
            //content변수에 DB에서 가져온 content을 선택
            $content=$board["content"];
            if(strlen($content)>30)
            {
              //content가 30을 넘어서면 ...표시
              $content=str_replace($board["content"],mb_substr($board["content"],0,30,"utf-8")."...",$board["content"]);
            }
      ?>
    <tbody>
      <tr>
        <td width="70"><?php echo $board['send_id']; ?></td>
        <td width="500"><?php echo $content;?></a></td>
        <td width="100"><?php echo $board['regist_day']?></td>
      </tr>
    </tbody>
    <?php } ?>
  </table>
  </div>
  <div id="myinfo" class="tabcontent">
    <div id="board_box">
	    <h3 id="board_title">
	    		내 정보 수정
		  </h3>
	    <form  name="board_form" method="post" action="mypage_result.php" enctype="multipart/form-data">
	    	 <ul id="board_form">		
	    		<li>
	    			<span class="col1">아이디 : </span>
				  	<input type="hidden" name="userid" value="<?php echo $userid;?>">
					  <span class="col2">
						<?=$userid?>
					  </span>
	    		</li>	   
          <li>
	    			<span class="col1">닉네임</span>
            <input type="text" name="usernic">
	    			<span class="col2">
					</span>
	    		</li>
			  </ul>
	    	<ul class="buttons">
				  <li><button type="button">변경하기</li>
			  </ul>
	    </form>
	  </div> 
  </div>
  <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    ;
  </script> 
  </body>
</html>
