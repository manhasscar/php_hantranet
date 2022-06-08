<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
<link rel="stylesheet" type="text/css" href="mystyle.css"/>
<link rel="stylesheet" type="text/css" href="css/common.css"/>
<style>
  .btn1, .btn1.inverse:hover{color:#FFFFFF; background-color:#F0F8FF; border-color:#05B3F2;}
  </style>
</head>
<body id="top">
    <header>
      <?php include "header.php";?>
    </header>
    <div class="wrapper row3">
      <main class="hoc container clear"> 
         <?php include('category.php');?>
      <div class="content three_quarter"> 
      <?php
      /* 검색 변수 */
      $catagory = $_GET['catgo'];
      $search_con = $_GET['search'];
      echo "<h1>{$catagory}에서 $search_con 검색결과</h1>";
      $search_result = str_replace(" ","", $search_con);
      if(isset($_GET['college'])){  
      $college = $_GET['college'];
      echo "<h3>$college </h3> ";
      }
      else $college = "";
      if(isset($_GET['major'])){
        $major = $_GET["major"];
      echo "<h3>$major</h3>";
      } else $major ="";
      ?>
      <h4 style="margin-top:30px;"><a href="book_list.php">홈으로</a></h4>
      <div id="search_box">
        <form action="book_search_result.php" method="get" style="display:flex;" >
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
        if($college && $major){
          if($catagory == "제목")
            $sql = mq("select * from book_board where (college like '$college%' and major = '$major') and replace(title,' ','') like '%$search_result%' order by idx desc");
          elseif($catagory == "저자")
            $sql = mq("select * from book_board where (college like '$college%' and major = '$major') and replace(bo_author,' ','') like '%$search_result%' order by idx desc");
          elseif($catagory == "출판사")
          $sql = mq("select * from book_board where (college like '$college%' and major = '$major') and replace(bo_publisher,' ','') like '%$search_result%' order by idx desc");
        }
        elseif($college=="전공" || $college=="교양"){
          if($catagory == "제목")
          $sql = mq("select * from book_board where (category ='전공' or category = '교양') and replace(title,' ','') like '%$search_result%' order by idx desc");
        elseif($catagory == "저자")
          $sql = mq("select * from book_board where (category ='전공' or category = '교양') and replace(bo_author,' ','') like '%$search_result%' order by idx desc");
        elseif($catagory == "출판사")
        $sql = mq("select * from book_board where c(category ='전공' or category = '교양')  and replace(bo_publisher,' ','') like '%$search_result%' order by idx desc");
        }
        elseif($college){
          if($catagory == "제목")
          $sql = mq("select * from book_board where college = '$college' and replace(title,' ','') like '%$search_result%' order by idx desc");
        elseif($catagory == "저자")
          $sql = mq("select * from book_board where college = '$college' and replace(bo_author,' ','') like '%$search_result%' order by idx desc");
        elseif($catagory == "출판사")
        $sql = mq("select * from book_board where college = '$college'  and replace(bo_publisher,' ','') like '%$search_result%' order by idx desc");
        }
        elseif($major){
          if($catagory == "제목")
          $sql = mq("select * from book_board where major = '$major' and replace(title,' ','') like '%$search_result%' order by idx desc");
        elseif($catagory == "저자")
          $sql = mq("select * from book_board where major = '$major' and replace(bo_author,' ','') like '%$search_result%' order by idx desc");
        elseif($catagory == "출판사")
        $sql = mq("select * from book_board where major = '$major'  and replace(bo_publisher,' ','') like '%$search_result%' order by idx desc");
        }
        else{
          if($catagory == "제목")
          $sql = mq("select * from book_board where replace(title,' ','') like '%$search_result%' order by idx desc");
        elseif($catagory == "저자")
          $sql = mq("select * from book_board where replace(bo_author,' ','') like '%$search_result%' order by idx desc");
        elseif($catagory == "출판사")
        $sql = mq("select * from book_board where replace(bo_publisher,' ','') like '%$search_result%' order by idx desc");
        }
      
          while($board = $sql->fetch_array()){

            $title=$board["title"];
            if(strlen($title)>30)
            {
            $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
            }
            if($board["file"]){
              $bo_image="<img src = 'uploads/$board[file_copied]' style= width:120px;height:150px;>";
            }
        ?>
       <tbody>
              <tr>
                <td width="70"><?php echo $board['idx']; ?></td>
				        <td width="500">
                <div class="items">
                    <li style = 'width:100px'>
                    <div id="image">
                      <?php echo $bo_image; ?>
                    </div>
                    </li>
                  <div style = 'width:150px'id="book">
                <ul>
                <li>
					        <a href="book_read.php?num=<?=$board['idx']?>"><?php echo $title;?><br></a>
					        <?php echo $board['bo_author'];?><br>
					        <?php echo $board['bo_date'];?>
                </li>
                </ul>
					      </div>
                </div>
				        </td>
                <td width="120"><?php echo $board['bo_price']; ?></td>
				        <td width="100"><?php echo $board['nic_name']; ?></td>
			        	<td width="100"><?php echo $board['date']; ?></td>
              </tr>
            </tbody>

            <?php } ?>
            </table>
            <?php
            if(isset($_SESSION['userid']) && $_SESSION['userid'] == 'admin'){
              ?>
              <footer><a style="float:right;" class="btn" href="book_form.php">글쓰기</a></footer>
              <?php

             }
            elseif(isset($_SESSION['userid'])){
             ?>
              <footer><a style="float:right;" class="btn" href="book_form.php">글쓰기</a></footer>
        <?php
        }
        ?>
          </div>
          </main>
      </div>
    </body>
</html>
