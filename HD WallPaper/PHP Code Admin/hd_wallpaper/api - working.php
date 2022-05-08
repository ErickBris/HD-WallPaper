<?php include("includes/connection.php");

  
	if(isset($_GET['cat_id']))
	{
		
		$cat_id=$_GET['cat_id'];		
	
	
		$cat_img_res=mysql_query('SELECT * FROM tbl_category WHERE cid=\''.$cat_id.'\'');
		$cat_img_row=mysql_fetch_assoc($cat_img_res);
	
			/*$handle = opendir(dirname(realpath(__FILE__)).'/categories/'.$cat_img_row['category_name'].'/');
        while($file = readdir($handle)){
            if($file !== '.' && $file !== '..'){
                echo $files[]=$file;
            }
        }*/
				
				$files = array();

				$dir = opendir(dirname(realpath(__FILE__)).'/categories/'.$cat_img_row['category_name'].'/');
				while ($file = readdir($dir)) {
						if ($file == '.' || $file == '..') {
								continue;
						}
					
						$files['HDwallpaper'][] = "image:".$file;
				}
				
				header('Content-type: application/json');
				echo json_encode($files);
								
		
	}
	else if(isset($_GET['latest']))
	{
		 
		 
		 
				$limit=$_GET['latest'];	 	
		$query="SELECT tbl_gallery.image FROM tbl_gallery
		LEFT JOIN tbl_category ON tbl_gallery.cat_id= tbl_category.cid 
		ORDER BY tbl_gallery.id DESC LIMIT $limit";
		
		$resouter = mysql_query($query);
     
    $set = array();
     
    $total_records = mysql_numrows($resouter);
    if($total_records >= 1){
     
      while ($link = mysql_fetch_array($resouter, MYSQL_ASSOC)){
	   
        $set['HDwallpaper'][] = $link;
      }
    }
     
     echo $val= str_replace('\\/', '/', json_encode($set));
		
	}
	else
	{
		$query="SELECT cid,category_name FROM tbl_category";
		
		
		$resouter = mysql_query($query);
     
    $set = array();
     
    $total_records = mysql_numrows($resouter);
    if($total_records >= 1){
     
      while ($link = mysql_fetch_array($resouter, MYSQL_ASSOC)){
	   
        $set['HDwallpaper'][] = $link;
      }
    }
     
     echo $val= str_replace('\\/', '/', json_encode($set));
			
	}
	
	
   
 
?>