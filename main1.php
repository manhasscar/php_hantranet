<div class="wrapper splitclrs">
  <div class="split clear">
    <div> 
      <p class="nospace font-xs">인기글</p>
      <h3 class="heading">커뮤니티</h3>
      <a class="plus" target="iframe1" href="board.php?board_id=board">더보기 &raquo;</a>
      <hr>
      <?php
        $sql = mq("select * from board order by hit desc limit 5");
        while($board = $sql->fetch_array())
        {   
            $title=$board["title"];
            if(strlen($title)>30)
            {
                //title이 30을 넘어서면 ...표시
                $title=str_replace($title,mb_substr($title,0,30,"utf-8")."...",$title);
            }
    ?>
      <p><?=$title?></p>
      <?php
        }
      ?>
    </div>
  </div>
</div>
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <ul class="nospace group emphasise">
    <div class="sectiontitle center">
      <h6 class="heading">도서 정보</h6>
    </div>
    </ul>
    <ul class="nospace group center">
      <li class="one_third first">
          <?php
             $sql = mq("select * from book_board order by idx desc limit 3");
             $total = mysqli_num_rows($sql);
             for($i=1; $i<=$row; $i++)
             {   
                 $
                 $book_name=$board["book_name"];
                 if(strlen($book_name)>30)
                 {
                     //title이 30을 넘어서면 ...표시
                     $book_name=str_replace($book_name,mb_substr($book_name,0,30,"utf-8")."...",$book_name);
                 }
                 if($board["file"]){
                    $bo_image="<img src = 'uploads/$board[file_copied]' style=width:120px; height:80px>";
                 }
        ?>
          <h6 class="heading font-x1"><?php echo $book_name;?></h6>
          <?php } ?>
          <p class="btmspace-30">Mattis purus dui nulla ut erat ut lectus eleifend porta integer euismod nisi sit amet libero ornare et elementum [&hellip;]</p>
          <footer><a class="btn" href="#">Read More &raquo;</a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><i class="btmspace-30 fa fa-3x fa-gg"></i>
          <h6 class="heading font-x1">Mauris elementum eget</h6>
          <p class="btmspace-30">Tellus molestie donec vehicula ante nec urna congue ornare integer vitae laoreet tortor integer neque ipsum [&hellip;]</p>
          <footer><a class="btn" href="#">Read More &raquo;</a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><i class="btmspace-30 fa fa-3x fa-low-vision"></i>
          <h6 class="heading font-x1">Integer lacus tellus</h6>
          <p class="btmspace-30">Eleifend vitae lacinia ut vulputate nisi nunc suscipit lorem consectetur accumsan maecenas pulvinar consequat [&hellip;]</p>
          <footer><a class="btn" href="#">Read More &raquo;</a></footer>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>