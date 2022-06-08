<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>게시판</title>
<link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<link rel="stylesheet" type="text/css" href="css/common.css"/>
<style>
#image{float:left; }
button{
      background-color: white;
	    padding: 2px;
	    border: solid 1px gray;
}
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
      <h1><?php echo $catagory; ?>에서 '<?php echo $search_con; ?>'검색결과</h1>
      <h4 style="margin-top:30px;"><a href="item_list.php">홈으로</a></h4>
      <div id="search_box2">
          <form action="item_search_result.php" method="get">
            <select name="catgo">
              <option value="name">제목</option>
              <option value="user_nic">글쓴이</option>
              <option value="content">내용</option>
            </select>
            <input type="text" name="search" size="40" required="required" /> <button>검색</button>
          </form>
      </div>
      <table class="list-table">
         <thead>
              <tr>
                <th width="70">번호</th>
                    <th width="500">물품 정보 </th>
				          	<th width="120">가격</th>
					          <th width="100">글쓴이</th>
                    <th width="100">작성일</th>
                </tr>
            </thead>
        <?php
        if($catagory == "name")
          $sql2 = mq("select * from item_board where replace(title,' ','') like '%$search_con%' order by idx desc");
        else if($catagory == "user_nic")
          $sql2 = mq("select * from item_board where replace(nic_name,' ','') like '%$search_con%' order by idx desc");
        else if($catagory == "content")
         $sql2 = mq("select * from item_board where replace(item_content,' ','') like '%$search_con%' order by idx desc");
        while($board = $sql2->fetch_array()){
            $con_idx = $board["idx"];
            $reply_count = mq("SELECT COUNT(*) AS cnt FROM item_board_reply where con_num=$con_idx");
            $con_reply_count = $reply_count->fetch_array();
            $name=$board["title"];
            if(strlen($name)>30)
            {
            $name=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
            }
        ?>
       <tbody>
             <tr id="board_list">
              <td width="70"><?php echo $board['idx']; ?></td>
              <td width="400"><a href="item_list.php?idx=<?php echo $board["idx"];?>"><?php echo $name."[".$con_reply_count["cnt"]."]";?></a></td>
              <td width="200"><?php echo $board['item_price']?></td>
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