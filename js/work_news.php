<?
require_once ('../config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?> 


function del_news_func(id_news, date_news)
{
var is_del=confirm('Удалить новость #'+id_news+'?');
if (is_del){
	
	$.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/del_news.php',
          data: {id_news: id_news},
          success: function(data) { $("#news_"+id_news).html('<font color="red">Новость <strong>#'+id_news+'</strong> от <strong>'+date_news+'</strong> успешно удалена</font>');},
          error:  function(xhr, str){
			alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	
	
	
}

}



  <? } else header("Location: ".SITE_ADDR."/error/666.php"); ?>