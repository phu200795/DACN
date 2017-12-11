<?php 
include 'connect.php';
set_time_limit(0);

include 'libs/Curl/CaseInsensitiveArray.php'; 
include 'libs/Curl/Curl.php'; 
include 'libs/Curl/MultiCurl.php';

include 'libs/DiDom/Document.php';
include 'libs/DiDom/Query.php';
include 'libs/DiDom/Element.php';

use \Curl\Curl;
use \DiDom\Document;
use \DiDom\Query;
use \DiDom\Element;




function save_all_fpt($html){
    $dom = new Document();
    $dom->load($html);
    $block = $dom->find('.fs-dtbott')[0];
    if(isset($block)){
      $newsItems = $block->find('.fs-dtinfo')[0]->find('.fs-dtprice ')[0];
      $name = $newsItems->text();
      $a=$name;
      
      }
      return $a ;
    
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
