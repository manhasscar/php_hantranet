<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>게시판</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
    
    <link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');
    *{
      font-family: 'Nanum Gothic', 'sans-serif', Arial ;
    } 

    .row1 {
    color: #4aa8d8;
    background-color: #FFFFFF;
}
.row4 {
    color: #CBCBCB;
    background-color: #4aa8d8;
}
.row5 {
    background-color: #ffffff;
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
a { 
		text-decoration:none !important;
		
		
	
	}

</style>
<body id="top">
    <header>
        <?php include "header.php";?>
    </header>
    <section>
        <?php include "main.php";?>
    </section>
    <footer>
        <?php include "footer.php";?>
    </footer>
</body>
</html>