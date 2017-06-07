<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?>

 
  
  function nohide_vphone() {
	  
	 var phone_num=$("#phone_num").val();
	 if (phone_num!=""){
		 var msg   = $('#data_form').serialize();
		 $.ajax({
          type: 'POST',
          url: '/verify/phone/session_phone.php',
          data: msg,
          success: function(data) {
			// alert(data);
			 if (data=='ok'){
			$('#phone_group').removeClass('has-warning');
			$('#phone_group').addClass('has-success');
			$('#phide1').addClass('hide');
			$('#phide2').removeClass('hide');
			$('#phide2').removeClass('glyphicon-warning-sign');  
			$('#phide2').addClass('glyphicon-ok');
			 }
			 else{
				$('.novphone').html('Телефон не верифицирован!');
				$('.vphonelink').html('Верифицировать');
				$('#is_sms')[0].reset();
				$('#verify_fg').removeClass('has-success');
				$('#verify_fg').removeClass('has-feedback');
				$('.verify_help').html('');
				 //$('#fc-ok').addClass('hide');
				 //$('#fc-no').addClass('hide');
				$('.modal_phone').html(phone_num);
				$('#phide1').removeClass('hide');
				//$('#phide2').addClass('hide');
				$('#phone_group').removeClass('has-success');
				$('#phone_group').addClass('has-warning');
				$('#phide2').removeClass('glyphicon-ok');  
				$('#phide2').addClass('glyphicon-warning-sign');  
				
			 }
			 },
          error:  function(xhr, str){
		  alert('Возникла ошибка: ' + xhr.responseCode);
          }
		  });
		   }
	 else {
		 $('#phide1').addClass('hide');
		 $('#phide2').addClass('hide');
		 $('#phone_group').addClass('has-warning');
		 $('#phone_group').removeClass('has-success');
		 $('#phide2').removeClass('glyphicon-ok');  
		 
		}
  
	
  }
 
  function verify_phone() {
		 $('#verify_phone').modal('hide');
 	  var msg   = $('#verify_phone').serialize();
        $.ajax({
          type: 'POST',
          url: '/verify/phone/sendsms.php',
          data: msg,
          success: function(data) {
			//alert(data);
		  if (data!='') {$('.novphone').html('SMS отправлено.');
		   $('#phide3').removeClass('hide');
		  phide3
		  $('.vphonelink').html('Отправить повторно');
		 // $('#phone_num').hide();
        $('#phone_num').attr("disabled","disabled");

		  
		  $('.out_sms').html(data);
		  $('#fc-ok').addClass('hide');
			$('#fc-no').addClass('hide');
		   $('#sms_ok').modal('show');
		  } else $('.results_form').html(data);
									
								
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	
	function is_sms() {
		 
 	  var msg   = $('#is_sms').serialize();
        $.ajax({
          type: 'POST',
          url: '/verify/phone/sms_ok.php',
          data: msg,
          success: function(data) {
			 alert(data);
		  if (data=='ok') {$('.verify_help').html('Телефон успешно верифицирован!');
		   $('#verify_fg').addClass('has-success');
		   $('#verify_fg').addClass('has-feedback');
		   $('#fc-ok').removeClass('hide');
		   $('#phide1').addClass('hide');
			$('#phide2').removeClass('glyphicon-warning-sign');
			$('#phone_group').removeClass('has-warning');
			$('#phone_group').addClass('has-success');
			$('#phide2').addClass('glyphicon-ok');
		 
		  } else {
			  $('.verify_help').html('Ошибка верификации!');
			$('#verify_fg').addClass('has-error');
		    $('#verify_fg').addClass('has-feedback');
			 $('#fc-no').removeClass('hide');
						
		  }			 
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
		 $('#button_ok').addClass('hide');
		  $('.sms_btn_cansel').html('Ок');
	}
 
    

<? } else echo ("Слоны идут нахер!"); ?>