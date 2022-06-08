<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>게시판</title>
<link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<link rel="stylesheet" type="text/css" href="css/common.css"/>
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
  <h1><?php if($catagory == "title")echo "제목"; 
            else if($catagory == "name")echo "글쓴이";
            else if($catagory == "content")echo "내용";?>에서 '<?php echo $search_con; ?>'검색결과</h1>
  <h4 style="margin-top:30px;"><a href="board.php?board_id=board">홈으로</a></h4>
  <div id="search_box2">
      <form action="search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="name">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required"/> <button>검색</button>
    </form>
  </div>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
        <?php
          $sql2 = mq("select * from board where $catagory like '%$search_con%' order by idx desc");
          while($board = $sql2->fetch_array()){

          $title=$board["title"];
            if(strlen($title)>30)
              {
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500">

        <a href='read.php?board_id=board&idx=<?php echo $board["idx"]; ?>'><span style="background:yellow;"><?php echo $title; ?></span></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>

        </tr>
      </tbody>

      <?php } ?>
    </table>
            </div>
</div>
</body>
</html>
