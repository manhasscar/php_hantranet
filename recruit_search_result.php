<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>게시판</title>
<link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<link rel="stylesheet" type="text/css" href="css/common.css"/>

<style>
#image{
      float:left;
    }
    button{
      background-color: white;
	    padding: 2px;
	    border: solid 1px gray;
    }
    <style>
  .btn1, .btn1.inverse:hover{color:#FFFFFF; background-color:#F0F8FF; border-color:#05B3F2;}
  
  
  </style>
</head>
<body>
<div id="board_area">
<header>
      <?php include "header.php";?>
    </header>
    <div class="wrapper row3">
  <main class="hoc container clear"> 
    <div class="content"> 
<?php

  /* 검색 변수 */
  $catagory = $_GET['catgo'];
  $search_con = $_GET['search'];
  
?>

  <h1><?php if($catagory == "title") echo "제목";
            else if($catagory == "user_nic") echo "글쓴이";
            else if($catagory == "content") echo "내용"; ?>에서 '<?php echo $search_con; ?>'검색결과</h1>
  <h4 style="margin-top:30px;"><a href="recruit.php">홈으로</a></h4>
  <div id="search_box2">
      <form action="recruit_search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="user_nic">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required"/> <button>검색</button>
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
        if($catagory == "title")
          $sql2 = mq("select * from recruit_board where replace(title,' ','') like '%$search_con%' order by idx desc");
        elseif($catagory == "user_nic")
          $sql2 = mq("select * from recruit_board where replace(nic_name,' ','') like '%$search_con%' order by idx desc");
        elseif($catagory == "content")
         $sql2 = mq("select * from recruit_board where replace(content,' ','') like '%$search_con%' order by idx desc");
        while($board = $sql2->fetch_array()){
            $con_idx = $board["idx"];
            $reply_count = mq("SELECT COUNT(*) AS cnt FROM recruit_board_reply where con_num=$con_idx");
            $con_reply_count = $reply_count->fetch_array();
            $title=$board["title"];
            if(strlen($title)>30)
            {
            $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
            }
        ?>
       <tbody>
             <tr id="board_list">
              <td width="70"><?php echo $board['idx']; ?></td>
              <td width="400"><a href="recruit_read.php?num=<?php echo $board["idx"];?>"><?php echo $title."[".$con_reply_count["cnt"]."]";?></a></td>
              <td width="200"><?php echo $board['period_s']?>~<?php echo $board['period_s']?></td>
              <td width="100"><?php echo $board['nic_name']?></td>
              <td width="100"><?php echo $board['date']?></td>
            </tr>
            </tbody>

      <?php } ?>
    </table>

          </div>   
</div>
</body>
</html>
