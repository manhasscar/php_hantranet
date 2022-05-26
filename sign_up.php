<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원가입</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="mystyle.css"/>
    <style media="screen">
      
    
      * {margin: 0; padding: 0;}
      #sign_up_box{
        width:460px;
        height:290px;
        border:solid 2px gray;
        position: absolute;
        left: 50%; top: 50%;
        margin-left: -200px;
        margin-top: -100px;
        background-color: #4aa8d8;
        color: white;
      }
      #sign_up_button{
        position: absolute;
        left: 40%; top: 85%;
      }
      button{
        background-color: white;
        border:solid 1px gray;
        padding: 3px;
        
        
      }

    </style>
    <script>
      function check_id(){
        var userid = document.getElementById("uid").value;
        if(userid)
	       {
		         url = "check.php?userid="+userid;
			       window.open(url,"chkid","width=300,height=100");
		     }
         else{
			        alert("아이디를 입력하세요");
		          }
	        }

      function check_nik(){
        var usernic = document.getElementById("nic").value;
        if(usernic)
         {
             url = "check.php?usernic="+usernic;
             window.open(url,"chkid","width=300,height=100");
         }
         else{
              alert("닉네임을 입력하세요");
              }
          }

        function check_email(){
        var useremail = document.getElementById("uemail").value;
        if(useremail)
         {
             url = "check.php?useremail="+useremail;
             window.open(url,"chkid","width=300,height=100");
         }
         else{
              alert("이메일을 입력하세요");
              }
          }

      function passwordCheck(){
          var pw = document.getElementById("pw").value;
          var pw_ck = document.getElementById("pw_ck").value;
          var id_ch = document.getElementById("id_ch").value;
          var nik_ch = document.getElementById("nik_ch").value;
          var email_ch = document.getElementById("email_ch").value;
          if (pw=="")  {
            alert("비밀번호를 입력해주세요.");
          }
          else if(id_ch==0){
            alert("아이디 중복확인을 해주세요");
          }
          else if(nik_ch==0){
            alert("닉네임 중복확인을 해주세요");
          }
          else if(email_ch==0){
            alert("이메일 중복확인을 해주세요");
          }
          else if(pw != pw_ck){
            alert("비밀번호가 일치하지 않습니다 확인해 주세요.");
          }
          else{
            document.getElementById("sign").submit();

          }
      }
    </script>
  </head>
  <body>
    <div id="sign_up_box">


    <form class="" action="sign_up_search.php" method="post" id="sign">
      <table>
        <tr>
          <br>
          <th>아이디</th>
          <td>
            <input type="text" name="id" id="uid">
          </td>
          <td>
            <button type="button" name="button" onclick="check_id()">중복확인</button>
            <input type="hidden" id="id_ch" name="" value="0">
          </td>
        </tr>
        <td><br></td>
        <tr>
          <th>닉네임</th>
          <td>
            <input type="text" name="name" id="nic">
          </td>
          <td>
            <button type="button" name="button" onclick="check_nik()">중복확인</button>
            <input type="hidden" id="nik_ch" name="" value="0">
          </td>
        </tr>
        <td><br></td>
        <tr>
          <th>이메일</th>
          <td>
            <input type="text" name="email" id="uemail"><th>@gm.hannam.ac.kr</th>
            
          </td>
          
          <td>
            <button type="button" name="button" onclick="check_email()">중복확인</button>
            <input type="hidden" id="email_ch" name="" value="0">
          </td>
        </tr>
        <td><br></td>
        <tr>
          <th>비밀번호</th>
          <td>
            <input type="password" id="pw" name="passw">
          </td>
        </tr>
        <td><br></td>
        <tr>
          <th>비밀번호 확인</th>
          <td>
            <input type="password" id="pw_ck" name="pass_check">
          </td>
        </tr>
      </table>
      <button id="sign_up_button" type="button" name="button" align="right" onclick="passwordCheck()">회원가입</button>

    </form>
    </div>
  </body>
</html>
