<div class="wrapper splitclrs">
  <div class="split clear">
    <div> 
      <p class="nospace font-xs">인기글</p>
      <h3 class="heading">자유게시판</h3>
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
      <p><a style="color:black;"href="read.php?board_id=board&idx=<?php echo $board['idx']; ?>"><?=$title?></a></p>
      <?php
        }
      ?>
    </div>

      <div>
      <p class="nospace font-xs">중고거래</p>
      <h3 class="heading">중고 도서 정보</h3>
      <a class="plus" target="iframe1" href="book_list.php">더보기 &raquo;</a>
      <hr>
    
      
          <?php
             $sql = mq("select * from book_board order by idx desc limit 5");
             $total = mysqli_num_rows($sql);
             
             for($i=1; $i<=$total; $i++)
             {   
                 $board_book = $sql -> fetch_array();
                 $title=$board_book["title"];
                 if(strlen($title)>30)
                 {
                     
                     $title=str_replace($title,mb_substr($title,0,30,"utf-8")."...",$title);
                 }
                 if($board_book["file"]){
                    $bo_image="<img src = 'uploads/$board_book[file_copied]' style=width:120px;height:80px>";
                 }
        ?>
          <p><a style="color:black;" href="book_read.php?num=<?php echo $board_book['idx']; ?>"><?php echo $title;?></a></p>
          <?php } ?>
      </div>
      </div>
      <div class="split clear">
    <div> 
      <p class="nospace font-xs">함께해요</p>
      <h3 class="heading">모집 정보</h3>
      <a class="plus" target="iframe1" href="recruit.php">더보기 &raquo;</a>
      <hr>
      <?php
        $sql = mq("select * from recruit_board order by idx desc limit 5");
        while($board_recruit = $sql->fetch_array())
        {   
            $title=$board_recruit["title"];
            if(strlen($title)>30)
            {
                //title이 30을 넘어서면 ...표시
                $title=str_replace($title,mb_substr($title,0,30,"utf-8")."...",$title);
            }
    ?>
      <p><a style="color:black;"href="recruit_read.php?num=<?php echo $board_recruit['idx']; ?>"><?=$title?></a></p>
      <?php
        }
      ?>
    </div>

      <div>
      <p class="nospace font-xs">중고거래</p>
      <h3 class="heading">중고 물품 정보</h3>
      <a class="plus" target="iframe1" href="item_list.php">더보기 &raquo;</a>
      <hr>
    
      
          <?php
             $sql = mq("select * from item_board order by idx desc limit 5");
             $total = mysqli_num_rows($sql);
             
             for($i=1; $i<=$total; $i++)
             {   
                 $board_item = $sql -> fetch_array();
                 $title=$board_item["title"];
                 if(strlen($title)>30)
                 {
                     
                     $title=str_replace($title,mb_substr($title,0,30,"utf-8")."...",$title);
                 }
                 if($board_item["file"]){
                    $bo_image="<img src = 'uploads/$board_item[file_copied]' style=width:120px;height:80px>";
                 }
        ?>
          <p><a style="color:black;" href="item_read.php?num=<?php echo $board_item['idx']; ?>"><?php echo $title;?></a></p>
          <?php } ?>
      </div>
      </div>
      <div class="clear"></div>
</div>








    

