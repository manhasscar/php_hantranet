<?php
    include ('db_connect.php');
	$username = $_SESSION['userid'];
	$usernic = $_SESSION['user_nic'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $state = $_POST['state'];
    $content = $_POST['content'];
	$ino = $_GET['num']; //게시글 번호
    $date = date('Y-m-d H:i:s');
  
    $upload_dir = 'uploads/'; //경로
	$upfile_name	 = $_FILES["file"]["name"]; //업로드된 파일명
	$upfile_tmp_name = $_FILES["file"]["tmp_name"]; //서버에 저장된 파일명
	$upfile_type     = $_FILES["file"]["type"]; //업로드된 파일의 데이터형 
	$upfile_size     = $_FILES["file"]["size"]; // 업로드된 파일의 크기(바이트형)
	$upfile_error    = $_FILES["file"]["error"]; //업로드 시 발생한 오류 코드 

	if ($upfile_name && !$upfile_error)// 만약 업로드된 파일명이 설정되어있고 오류코드가 없다면 
	{
		$file = explode(".", $upfile_name); //.을 기준으로 나누기 
		$file_name = $file[0];//첫번째 단어 저장 
		$file_ext  = $file[1];//두번쨰 단어 저장 

		$new_file_name = date("Y_m_d_H_i_s");//날짜를 저장 
		$new_file_name = $new_file_name;
		$copied_file_name = $new_file_name.".".$file_ext;  //날짜형식으로 저장     
		$uploaded_file = $upload_dir.$copied_file_name; //경로 저장
	
		if(!move_uploaded_file($upfile_tmp_name,$uploaded_file)){
		print "파일 업로드  실패 : ";
		switch ($upfile_error) {
			case UPLOAD_ERR_INI_SIZE:
			print "php.ini 파일의 upload_max_filesize(".ini_get("upload_max_filesize").")보다 큽니다.<br>";
			break;
			case UPLOAD_ERR_FORM_SIZE:
			print "업로드 한 파일이 Form의 MAX_FILE_SIZE 값보다 큽니다.<br>";
			break;
			case UPLOAD_ERR_PARTIAL:
			print "파일의 일부분만 전송되었습니다.<br>";
			break;
			case UPLOAD_ERR_NO_FILE:
			print "파일이 전송되지 않았습니다.<br>";
			break;
			case UPLOAD_ERR_NO_TMP_DIR:
			print "임시 디렉토리가 없습니다.<br>";
			break;
		}
		}
	
	}
    if($username && $name && $content){
        $sql = mq("update item_board set title = '".$name."', item_price = '".$price."', category = '".$category."', item_state = '".$state."', item_content = '".$content."', file = '".$upfile_name."', file_type ='".$upfile_type."', file_copied = '".$copied_file_name."' where idx = '".$ino."'");
        echo "<script>
                alert('수정이 완료되었습니다.');
                location.href='item_read.php?num=$ino';
            </script>";
        }else{
            echo "<script>
          alert('수정에 실패했습니다.');
          history.back();
          </script>";
        }
    ?>