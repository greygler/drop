<?
require_once ('../config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?> 
$(function(){
    

$('.search').bind("change keyup input click", function() {
    if(this.value.length >= 2){
        $.ajax({
            type: 'post',
            url: '<?= ACTION_PATH ?>/search.php', 
            data: {'product':this.value},
            response: 'text',
            success: function(data){
                $("#search_result").html(data).fadeIn(); 
           }
       })
    }
})
    

})
  <? } else echo ("Слоны идут нахер!"); ?>