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
        <option value="제목">제목</option>
        <option value="저자">저자</option>
        <option value="출판사">출판사</option>
      </select>
      <input type="text" name="search" size="40" required="required"/> <button>검색</button>
    </form>
  </div>
    <table class="list-table">
        <thead>
            <tr>
                <th width="70">번호</th>
                <th width="500">책 정보 </th>
                <th width="120">가격</th>
                <th width="100">글쓴이</th>
                <th width="100">작성일</th>
            </tr>
        </thead>
        <?php
        if($catagory == "제목")
          $sql2 = mq("select * from book_board where replace(book_name,' ','') like '%$search_con%' order by idx desc");
        elseif($catagory == "저자")
          $sql2 = mq("select * from book_board where replace(bo_author,' ','') like '%$search_con%' order by idx desc");
        elseif($catagory == " 출판사")
         $sql2 = mq("select * from book_board where replace(bo_publisher,' ','') like '%$search_con%' order by idx desc");
        while($board = $sql2->fetch_array()){

            $book_name=$board["book_name"];
            if(strlen($book_name)>30)
            {
            $title=str_replace($board["book_name"],mb_substr($board["book_name"],0,30,"utf-8")."...",$board["book_name"]);
            }
        ?>
       <tbody>
              <tr>
                <td width="70"><?php echo $board['idx']; ?></td>
				<td width="500">
					<div class="items">
						<div id="image">
                           <?php echo "<img src = 'uploads/$board[file_copied]' style=width:60px height:40px>";?>
						</div>
					<div id="book">
            <ul>
              <li>
					    <?php echo $book_name;?><br>
					    <?php echo $board['bo_author'];?><br>
					    <?php echo $board['bo_date'];?>
              </li>
                  </ul>
					</div>
                  </div>
				</td>
                <!-- <td width="120"><?php echo $book_name;?><br><?php echo $board['bo_author'];?><br><?php echo $board['bo_date'];?></td> -->
                <!-- <td width="120"><?php echo $board['bo_date'];?></td> -->
                <td width="120"><?php echo $board['bo_price']; ?></td>
				<td width="100"><?php echo $board['user_name']; ?></td>
				<td width="100"><?php echo $board['date']; ?></td>
              </tr>
            </tbody>

      <?php } ?>
    </table>

    
</div>
</body>
</html>
