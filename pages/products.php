<?
 require_once ($_SERVER['DOCUMENT_ROOT'].'/class/pagination.class.php');
 if ($_GET['cat']!="") $where="cat={$_GET['cat']}";
 if ($_GET['subcat']!="") $where="subcat={$_GET['subcat']}";
$count_products=db::cound_bd('products', $where);
if ($where!='') $where="WHERE ".$where;
?>
<script>
function data_form() {
		 	
 	  var msg   = $('#data_form').serialize();
        $.ajax({
          type: 'POST',
          url: '/action/update_profile.php',
          data: msg,
          success: function(data) {
			
		  if (data=='ok') {$('#form_ok').modal('show'); } else $('results_form').html(data);
									
								
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	</script>
<div class="page-header">
		<h1>товары</h1>
		</div>
		<div class="visible-xs alert alert-warning alert-dismissable"> 
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Рекомендуется просматривать в горизонтальном расположении устройства.<br>Поверните устройство и заново загрузите таблицу товаров через боковое меню
		</div>
		<? $limit=pagination::pagin($_GET,$count_products, $view_pages); 	?>
		<form id="product_form">
<table class="table table-striped table-responsive" >
<thead>
	<tr>
		<th><strong>ID</strong></th>
		<th><strong>Фото<br>товара</strong></th>
		<th><strong><i class="pull-left fa fa-folder-open" aria-hidden="true"></i> Категория<br><i class="pull-left fa fa-folder" aria-hidden="true"></i> Подкатегория</strong></th>
		<th><strong><i class="fa fa-shopping-bag" aria-hidden="true"></i> Наименование, модель<br><i class="fa fa-industry" aria-hidden="true"></i> Производитель</strong></th>
		<th><strong><i class="fa fa-tag" aria-hidden="true"></i>Цена продажи<br><i class="fa fa-hand-o-right" aria-hidden="true"></i> Рекомендуемая цена</strong></th>
		<th><strong>Активность</strong></th>
	</tr>
</thead>
<tbody>
	<? 
	
	$db="SELECT * FROM products {$where} LIMIT {$limit['begin']}, {$limit['count']}";
	//echo $db;
	$result = mysql_query($db);
		$myrow = mysql_fetch_array($result);
		do { ?>
		<tr>
		<td valign="middle"><?= $myrow ['id']; ?></td>
		<td valign="middle"><img class="img_product img-rounded img-responsive" src="img_product/noimg.png"></td>
		<td valign="middle"><? 
		if ($myrow['subcat']==0){ echo ('<a type="button" title="Показать все товары категории &laquo;'.$categories['data'][$myrow['cat']]['name'].'&raquo;" class="btn btn-default btn-block" href="/?type=products&cat='.$myrow['cat'].'" ><i class="pull-left fa fa-folder-open" aria-hidden="true"></i>'.$categories['data'][$myrow['cat']]['name'].'</a>');  }
		else {echo ('<a type="button" title="Показать все товары категории &laquo;'.$subcategoties[$myrow['subcat']]['parent_name'].'&raquo;" class="btn btn-default btn-block" href="/?type=products&cat='.$myrow['cat'].'" ><i class="pull-left fa fa-folder-open" aria-hidden="true"></i>'.$subcategoties[$myrow['subcat']]['parent_name'].'</a><a type="button" title="Показать все товары подкатегории &laquo;'.$subcategoties[$myrow['subcat']]['name'].'&raquo;" class="btn btn-default btn-block btn-sm" href="/?type=products&subcat='.$myrow['subcat'].'" ><i class="pull-left fa fa-folder" aria-hidden="true"></i>'.$subcategoties[$myrow['subcat']]['name'].'</a>');  }?>
		
		</td>
		<td valign="middle"><a type="button" class="btn btn-default btn-block" href="#" title="<? if ($myrow ['description']!="") echo("Краткое описание:\n");else echo("Краткое описание отсутствует"); ?><?= $myrow ['description']; 
		
		?>">
		<div class="text-left"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <strong><?= $myrow ['name']; ?></strong> 
		 <small><?= $myrow ['model']; ?></small></div> </a>
		 <? if ($myrow ['manufacturer']!="") echo("<i class=\"fa fa-industry\" aria-hidden=\"true\"></i> Производитель: {$myrow['manufacturer']}"); ?> </td>
		<td valign="middle">
		<button type="button" class="btn btn-default btn-block">
		<i class="pull-left fa fa-tag" aria-hidden="true"></i><?= $myrow ['price']; ?> <?= CURRENCY ?></button>
		<button type="button" class="pull-left btn btn-success btn-block"><i class="pull-left fa fa-hand-o-right" aria-hidden="true"></i>

		<?= $myrow ['spec_price']; ?> <?= CURRENCY ?></button></td>
		<td valign="middle"><input id="checkbox_<?= $myrow ['id']; ?>" type="checkbox"  name="checkbox" checked></td>
	</tr>
		
	<?  	} 
	
while ($myrow = mysql_fetch_array($result));
//else echo('<tr class="warning"><td colspan="5"><p>ничего нет!</p></td>	</tr>');
	?>
	</tbody>
	
</table>
</form>
<? $limit=pagination::pagin($_GET,$count_products, $view_pages); 	?>