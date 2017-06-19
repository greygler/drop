<?
require_once ('../config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?> 
function save_news(id)
{
	//$('#refresh_code_'+id).addClass('fa-spin');
	var $input = $("#news-img");
    var fd = new FormData;

    fd.append('img', $input.prop('files')[0]);
	fd.append('id', id);
	fd.append('date', $('#datepicker').val());
	fd.append('time_h', $('#time_h').val());
	fd.append('time_m', $('#time_m').val());
	fd.append('text', $('#text').val());
	
	//alert($('#text').val())
	$.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/save_news.php',
		  data: fd,
          processData: false,
          contentType: false,
          success: function(data) { 
		  
		  if (data!="error") {
		  $("#img_news").attr("src","<?= IMG_NEWS_PATH ?>"+data);
			//$('#ref-button_'+id).attr("disabled","disabled");	
			}
		   
		  //$('#refresh_code_'+id).removeClass('fa-spin');
		  alert('Новость #'+id+'\nуспешно сохранена.');
		  },
          error:  function(xhr, str){
			alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
		
}

  <? } else header("Location: ".$_SERVER['DOCUMENT_ROOT']."/error/666.php"); ?>