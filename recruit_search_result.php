<?php
  include ('db_connect.php');
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<style>
#image{
      float:left;
    }
    button{
      background-color: white;
	    padding: 2px;
	    border: solid 1px gray;
    }
  
  </style>
</head>
<body>
<div id="board_area">

<?php

  /* 검색 변수 */
  $catagory = $_GET['catgo'];
  $search_con = $_GET['search'];
?>

  <h1><?php echo $catagory; ?>에서 '<?php echo $search_con; ?>'검색결과</h1>
  <h4 style="margin-top:30px;"><a href="book_list.php">홈으로</a></h4>
  <div id="search_box2">
      <form action="book_search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="user_nic">글쓴이</option>
        <option value="category">분야</option>
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
        elseif($catagory == "category")
         $sql2 = mq("select * from recruit_board where replace(category,' ','') like '%$search_con%' order by idx desc");
        while($board = $sql2->fetch_array()){

            $title=$board["title"];
            if(strlen($title)>30)
            {
            $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
            }
        ?>
       <tbody>
             <tr id="board_list">
              <td width="70"><?php echo $board['idx']; ?></td>
              <td width="400"><a href="recruit.php?board_id=<?php echo $board_id?>&idx=<?php echo $board["idx"];?>"><?php echo $title."[".$con_reply_count["cnt"]."]";?></a></td>
              <td width="200"><?php echo $board['startate']?><?php echo $board['endate']?></td>
              <td width="100"><?php echo $board['name']?></td>
              <td width="100"><?php echo $board['date']?></td>
            </tr>
            </tbody>

      <?php } ?>
    </table>

    
</div>
</body>
</html>
