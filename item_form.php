<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="css/board.css">
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
.heading{
    color: #171414;
    font-weight: bold;
}
a {
    color: #05B3F2;
}
p{
    color: #171414;
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
	button {
	color: #FFFFFF;
    background-color: #05B3F2;
    padding: 2px; 
    border-radius: 10px;
	border-color: #05B3F2;
    /* background-clip: padding-box;
    text-transform: uppercase;
    font-weight: 700;
    cursor: pointer; */
}
#board_box .buttons { text-align: right; margin: 20px 0 40px 0; }
#board_box .buttons li { display: inline; }
#board_box .buttons button { padding: 5px 10px; cursor: pointer; }
</style>

<script>
  function check_input() {
      if (!document.board_form.name.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.name.focus();
          return;
      }
      if (!document.board_form.state.value)
      {
          alert("상태를 입력하세요!");    
          document.board_form.state.focus();
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
          alert("거래 방식을 선택하세요!");    
          document.board_form.category.focus();
          return;
      }
      if (!document.board_form.price.value)
      {
          alert("가격은 숫자만 입력 가능합니다!");    
          document.board_form.price.focus();
          return;
      }
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
	    <form  name="board_form" method="post" action="item_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_form">		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="name" type="text"></span>
	    		</li>
                <li>
	    			<span class="col1">판매가격 : </span>
	    			<span class="col2"><input name="price" type="number"></span>
	    		</li> 	   
                <li id="text_area">	
	    			<span class="col1">상태 : </span>
	    			<span class="col2">
	    				<textarea name="state"></textarea>
	    			</span>
	    		</li>
	    		<li id="text_area">	
	    			<span class="col1">설명 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
                <li>
					<span class="col1">거래 방식 : </span>
					<span class="col2"><select name ="category" >
                        <option value="" selected>선택하세요!</option>
                        <option value="택배" >택배</option>
                        <option value="직접" >직거래</option>
                        <option value="기타" >기타</option>
                    </select></span>
				</li>
	    		<li>
			        <span class="col1"> 첨부 파일</span>
			        <span class="col2"><input type="file" name="file"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">완료</button></li>
				<li><button type="button" onclick="location.href='item_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> 
</div>
</div><!-- board_box -->
</body>
</html>
