<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>로그인</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="mystyle.css"/>
    <link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <style>
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

thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
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
table, th, td{
  border: 0px;
  vertical-align: middle;
}
      * {margin: 0; padding: 0;}
      #login_box{
        width:400px;
        height:150px;
        border:solid 2px white;
        position: absolute;
        left: 50%; top: 65%;
        margin-left: -200px;
        margin-top: -100px;
        background-color: #4aa8d8;
        color: white;
      }
      .submit{
        width: 80px;
        height: 70px;
        border-radius: 5px;
        position: absolute;
        left: 50%; top: 50%;
        margin-left: 100px;
        margin-top: -58px;
        background-color: white;
        border:solid 1px gray;
        color:black;
      }
      a{
        color: white;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
  <header>
    <?php include "header.php";?>
  </header>
    <div id="login_box">
      <form name="loginForm" action="login_search.php" method="post">
        <table width="300" height="100" border="0">
          <tr>
            <th align="right">아 이 디 :</th>
            <td><input type="text" name="userid"></td>
          </tr>
          <tr>
            <th align="right">패스워드 :</th>
            <td><input type="password" name="userpw"></td>
          </tr>
        </table>
        <input type="submit" class="submit" value="로그인">
        <p align=center>
        <a href="sign_up.php">회원가입</a>
        <!--<a href="#">비밀번호 찾기</a>-->
        </p>
      </form>

    </div>
  </body>
</html>
