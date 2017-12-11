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

?>
<?php
function save_all_loaicha($html){
    $dom = new Document();
    $dom->load($html);
    $block = $dom->find('#b_results')[0];
    if(isset($block)){
      $newsItems = $block->find('.b_algo');
      if(isset($newsItems)){
        foreach ($newsItems as $key => $value) {
            $name = $value->find('a')[0]->attr('href');
            $b[]=$name;
      }
      return $b ;
    }
}
}
function save_all_duchuy($html){
    $dom = new Document();
    $dom->load($html);
    $block = $dom->find('.row_price')[0];
    if(isset($block)){
      $newsItems = $block->find('.price-box')[0];
      
      if(isset($newsItems)){
      
            $name = $newsItems->find('.price-new')[0]->text();
            $a=$name;
      }
      return $a ;
    }
}

function save_all_thegioididong($html){
    $dom = new Document();
    $dom->load($html);
    $block = $dom->find('.price_sale')[0];
    if(isset($block)){
      $newsItems = $block->find('.area_price')[0];
      
      if(isset($newsItems)){
      
            $name = $newsItems->find('strong')[0]->text();
            $a=$name;

      }
      return $a ;
    }
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
</div>