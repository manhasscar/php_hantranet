<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="css/board.css">
<link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
<link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="css/common.css"/>
<link rel="stylesheet" type="text/css" href="mystyle.css"/>
<style>
.container {padding: 20px 0;}
</style>

<script>
  function check_input() {
      if (!document.board_form.name.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.name.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
	  if (!document.board_form.category.value)
      {
          alert("분류를 선택하세요!");    
          document.board_form.category.focus();
          return;
      }
      if (!document.board_form.price.value)
      {
          alert("가격은 숫자만 입력 가능합니다!");    
          document.board_form.price.focus();
          return;
      }
	//   if (!document.board_form.college.value)
    //   {
    //       alert("단과대를 선택하세요!");    
    //       document.board_form.college.focus();
    //       return;
    //   }
	//   if (!document.board_form.major.value)
    //   {
    //       alert("전공을 선택하세요!");    
    //       document.board_form.major.focus();
    //       return;
    //   }
	  if (!document.board_form.file.value)
      {
          alert("이미지는 필수입니다!");    
          document.board_form.file.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body>
<header>
    <?php include "header.php";?>
</header>	 
<section>
<div class="wrapper row3">
	<main class="hoc container clear"> 
    	<div class="content"> 
   		<div id="board_box">
	    <h3 id="board_title">
	    		글 쓰기
		</h3>
	    <form  name="board_form" method="post" action="book_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_form">		
	    		<li>
	    			<span class="col1">책 이름 : </span>
	    			<span class="col2"><input name="name" type="text"></span>
	    		</li>	   
                <li>
	    			<span class="col1">저자 : </span>
	    			<span class="col2"><input name="author" type="text"></span>
	    		</li>
                <li>
	    			<span class="col1">출판사: </span>
	    			<span class="col2"><input name="publisher" type="text"></span>
	    		</li>
                <li>
	    			<span class="col1">출판일 : </span>
	    			<span class="col2"><input name="publidate" type="date"></span>
	    		</li>
                <li>
	    			<span class="col1">판매가격 : </span>
	    			<span class="col2"><input name="price" type="number"></span>
	    		</li> 
				<li>
					<span class="col1">분류 : </span>
					<span><select name ="category" >
                        <option value="" selected>선택하세요!</option>
                        <option value="전공" >전공</option>
                        <option value="교양" >교양</option>
                    </select></span>
				</li>
				<li>
					<span class="col1">전공: </span>
					<span><select id="major1" name="college" onchange="changeMajor2();"></select></span>
        			<span><select id="major2" name="major"></select></span>
				</li>
	    		<li id="text_area">	
	    			<span class="col1">상태 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일</span>
			        <span class="col2"><input type="file" name="file"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" class="btn" onclick="check_input()">완료</button></li>
				<li><button type="button" class="btn" onclick="location.href='book_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> 
</div>
</div><!-- board_box -->
</section> 
<script src="book_form.js">
</script>

</body>
</html>
