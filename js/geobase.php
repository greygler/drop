<?
require_once ('../config.php');
//if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?> 
function geobase(ip_geo,geo_class)
{
	
 $.ajax ({
    type: "POST",
    url: "http://ipgeobase.ru:7020/geo/?ip=" + ip_geo,
    dataType: "xml",
    success: function(xml) {
		
      var city = $(xml).find('city').text();
	  var region = $(xml).find('region').text();
	  var country = $(xml).find('country').text();
      $(geo_class).html(city);
	  
    },
    error: function() {
      $(geo_class).html("Не определен");
	 	  
    }
	
	
  });

}
  <? //} else header("Location: ".SITE_ADDR."/error/666.php"); ?>
  