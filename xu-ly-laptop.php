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

$sl="select * from loai_con where loaicon_id={$_GET["loaicon_idlt"]} ";
$kq=mysql_query($sl);
$d=mysql_fetch_array($kq);
$m=strtolower($d['loaicon_name']);

$parent=str_replace(" ","-", $m);
$parent1=str_replace("(","", $parent);
$parent2=str_replace(")","", $parent1);

define('BASE_URL','https://fptshop.com.vn');
$url = 'https://fptshop.com.vn/may-tinh-xach-tay/'.$parent2.'?sort=gia-cao-den-thap';
if(get_data($url, $content)){
    $loaicon_id=$d['loaicon_id'];
    save_all_sanpham($loaicon_id,$content);
}else{
    //echo 'Cannot get data for this page !!!!'.PHP_EOL;;
}

function save_all_sanpham($loaicon_id,$html){
 $post = array();
    $dom = new Document();
    $dom->load($html);
  
    $block = $dom->find('.fs-carow')[0];
    $newsItems = $block->find('.fs-lapitem');
    if(isset($newsItems)){

      foreach ($newsItems as $key => $value) {
        $name_img =$value->find('.fs-ilap-img')[0];
        $name = $name_img->getAttribute('title');
        $i = $name_img->find('img[class=lazy]')[0];
        $im=$i->getAttribute('data-original');
        $price=$value->find('.fs-ilap-if')[0]->find('.fs-ilap-itop')[0]->find('.fs-ilap-price')[0]->text();

        // $a=$pieces = explode("//", $im);
        //  $img='hinh/'.basename($a[1]);
        //  print_r($img);
        //  file_put_contents($img,file_get_contents($a[1]));
        // $tenFile=basename($im);
        $post = array();
        $post['url_img']=$im;  
        $post['name'] = $name;
        $post['price']=$price;
        
        insert_sanpham($loaicon_id,$post);

         
        
        
      }
        
      
    
    } 

}


function insert_sanpham($loaicon_id,$sanpham){
    $url  = $sanpham['url_img'];
    $name = $sanpham['name'];
    $price =$sanpham['price'];
    

   $sql = "INSERT INTO san_pham (name,url_img,loaicon_id,price)".
      " SELECT '$name','$url',$loaicon_id,'$price' FROM DUAL".
      " WHERE NOT EXISTS (SELECT * FROM san_pham".
      " WHERE name = '$name') LIMIT 1";
  
   
    mysql_query($sql); 
    $sl="select * from san_pham where name='$name'";
     
    $kq=mysql_query($sl);
    $d=mysql_fetch_array($kq);


   

  }

function get_data($link , &$content){
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
