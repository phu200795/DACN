<?php  
set_time_limit(0);
 include 'connect.php';
include 'libs/Curl/CaseInsensitiveArray.php'; 
include 'libs/Curl/Curl.php'; 
include 'libs/Curl/MultiCurl.php';

include 'libs/DiDom/Document.php';
include 'libs/DiDom/Query.php';
include 'libs/DiDom/Element.php';

include 'libs/medoo.php';

use \Curl\Curl;
use \DiDom\Document;
use \DiDom\Query;
use \DiDom\Element;

define('BASE_URL','https://fptshop.com.vn');
$urll = 'https://fptshop.com.vn/may-tinh-xach-tay?sort=gia-thap-den-cao';
if(get_data_laptop($urll, $content)){
    $d=save_all_loaicha_laptop($content);
    $loaicha_id_laptop=$d['loaicha_id'];
    $d_con=save_all_loaicon_laptop($loaicha_id,$content);
    
}else{
    //echo 'Cannot get data for this page !!!!'.PHP_EOL;;
}
function save_all_loaicha_laptop($html){
    $dom = new Document();
    $dom->load($html);
  
    $block = $dom->find('.fs-mnul')[0];
    if(isset($block)){
      $newsItems = $block->find('li')[1];
      if(isset($newsItems)){
        $name = $newsItems->find('a')[0]->text();
        $post = array();  
        $post['loaicha_name'] = $name;
        $d=insert_loaicha_laptop($post);
        return $d;
      }
    }
    
    

    //$post['loaicha_id']=$d['loaicha_id'];
    
                  
}

function save_all_loaicon_laptop($loaicha_id,$html){
    $dom = new Document();
    $dom->load($html);
  
    $block = $dom->find('.listfilterv4')[0];
    $newsItems = $block->find('li');
    if(isset($newsItems) && count($newsItems)>0){
      for($i = 1 ;$i <=7 ;$i++){
        $newsItem=$newsItems[$i];
        $name = $newsItem->find('a')[0]->text();

        
        $post = array();  
        $post['loaicon_name'] = $name;
        

        $d=insert_loaicon($loaicha_id,$post);

        
}
    
    }               
}



function insert_loaicon_laptop($loaicha_id,$con){
 
    $name = $con['loaicon_name'];
    

   $sql = "INSERT INTO loai_con (loaicon_name,loaicha_id)".
      " SELECT '$name',$loaicha_id FROM DUAL".
      " WHERE NOT EXISTS (SELECT * FROM loai_con".
      " WHERE loaicon_name = '$name') LIMIT 1";
   
  
   
    mysql_query($sql); 
    $sl="select * from loai_con where loaicon_name='$name'";
    $kq=mysql_query($sl);
    $d=mysql_fetch_array($kq);

    return $d;
  
       
}


function insert_loaicha_laptop($cha){
    //$id = $loaicha['loaicha_id'];
    $name = $cha['loaicha_name'];
    //$loaicha_id=$con['loaicha_id'];
   $sql = "INSERT INTO loai_cha (loaicha_name)".
      " SELECT '$name' FROM DUAL".
      " WHERE NOT EXISTS (SELECT * FROM loai_cha".
      " WHERE loaicha_name = '$name') LIMIT 1";
    
   //$sql = "INSERT INTO loai_cha VALUES (null,'$name')";
   
    mysql_query($sql);
    $sl="select * from loai_cha where loaicha_name='$name'";
    $kq=mysql_query($sl);
    $d=mysql_fetch_array($kq);
    return $d;
  
       
}
function get_data_laptop($link , &$content){
    $curl = new Curl();
    
    //echo 'Start craw: ' .$link.PHP_EOL;
    
    $curl->setTimeout(60);
    $curl->setConnectTimeout(60);
    
    $curl->get($link);
    
    $error = $curl->error;
    
    if(!$error){
        $content = $curl->response;
       // echo 'End craw: ' .$link.' Sucess !!!'.PHP_EOL;
    }else{
       // echo 'End craw: ' .$link.' Failt !!!'.PHP_EOL;
    }
    
    $curl->close();
    
    return !$error;
    }
?>
