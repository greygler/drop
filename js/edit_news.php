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
	
	//valert($('#text').val())
	$.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/save_news.php',
		  data: fd,
          processData: false,
          contentType: false,
          success: function(data) { 
		  valert(data);
		  if (data!="error") {
		  $("#img_news").attr("src","<?= IMG_NEWS_PATH ?>"+data);
		  $('#new_buttton_news').attr("disabled","disabled");	
			}
		   
		  //$('#refresh_code_'+id).removeClass('fa-spin');
		  valert('Новость #'+id+'\nуспешно сохранена.');
		  },
          error:  function(xhr, str){
			valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
		
}

  <? } else header("Location: ".SITE_ADDR."/error/666.php"); ?>