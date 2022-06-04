<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="mystyle.css"/>
<link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
<link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style>
  	.row1 {
    color: #4aa8d8;
    background-color: #FFFFFF;
}
	.container {
	padding: 20px 0;
}
.row3 {
    color: #222222;
    background-color: #FFFFFF;
}
.row4 {
    color: #CBCBCB;
    background-color: #4aa8d8;
}
  #board_write {
    width:900px;
    position:relative;
    margin:0 auto;
  }
  #write_area {
    margin-top:70px;
    font-size:14px;
  }
  #in_title {
    margin-top:30px;
  }
  #in_title textarea {
    font-weight:bold;
    font-size:26px;
    color:#333;
    width: 900px;
    border:none;
    resize: none;
  }
  .wi_line {
    border:solid 1px lightgray;
    margin-top:10px;
  }
  #in_content {
    margin-top:10px;
  }
  #in_content textarea {
    font:14px;
    color:#333;
    width: 900px;
    height: 400px;
    resize: none;
  }
  .bt_se {
    margin-top:20px;
    text-align:center;
  }
  .bt_se button {
    width:100px;
    height:30px;
  }
  button{
      background-color: white;
      padding: 2px;
      border: solid 1px gray;
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
      <?php $board_id=$_GET['board_id'];?>
       <div id="board_write">
        <h4>글을 작성하는 공간입니다.</h4>
            <div id="write_area">
                <form enctype="multipart/form-data" action="write_ok.php?board_id=<?php echo $board_id;?>" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>

                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>

                      <input style="float: left;position: absolute;" type="file" name="SelectFile" />


                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
    </body>
</html>
