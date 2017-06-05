<?
 require_once ($_SERVER['DOCUMENT_ROOT'].'/class/pagination.class.php');
 if ($_GET['cat']!="") $where="cat={$_GET['cat']}";
 if ($_GET['subcat']!="") $where="subcat={$_GET['subcat']}";
$count_products=db::cound_bd('products', $where);
if ($where!='') $where="WHERE ".$where;
?>
<script>
function product_form(id) {
	//alert($('#checkbox_'+id).is(':checked'));
	if (!$('#checkbox_'+id).is(':checked')) 
		var active='0'; else var active='1';
 	 
        $.ajax({
          type: 'POST',
          url: '/action/update_active.php',
          data:
		  {
			  id : id,
			  active : active,
		  },
          success: function(data) { 
		  //alert(data);
		  if (data=='ok'){
			  if (active!='0') {
			  $('.active_'+id).html('<font color="blue"><samll>Доступен к продаже</small></font>');
			  $('#button_'+id).removeClass('btn-default');
			  $('#button_'+id).addClass('btn-info');
			  }
			  else {
				  $('.active_'+id).html('<small>Не доступен к продаже</small>');
				  $('#button_'+id).addClass('btn-default');
			      $('#button_'+id).removeClass('btn-info');
			  }
			  
		  }
		  else $('.active_'+id).html('<font color="red">Ошибка!</font>'); 
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
		<th><a title="Сортировка по ID" href="<?= Pagination::pagelink_desc($_GET, 'order', 'id') ?>"><strong>ID</strong></a></th>
		<th><strong>Фото<br>товара</strong></th>
		<th><a title="Сортировка по категории" href="<?= Pagination::pagelink_desc($_GET, 'order', 'cat') ?>"><i class="pull-left fa fa-folder-open" aria-hidden="true"></i> <strong>Категория</strong></a><br><a title="Сортировка по подкатегории" href="<?= Pagination::pagelink_desc($_GET, 'order', 'subcat') ?>"><i class="pull-left fa fa-folder" aria-hidden="true"></i> <strong>Подкатегория</strong></a></th>
		<th><a title="Сортировка по наименованию" href="<?= Pagination::pagelink_desc($_GET, 'order', 'name') ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <strong> Наименование, модель</strong></a><br><a title="Сортировка по производителю" href="<?= Pagination::pagelink_desc($_GET, 'order', 'manufacturer') ?>"><i class="fa fa-industry" aria-hidden="true"></i> <strong> Производитель</strong></a></th>
		<th><a title="Сортировка по цене продажи" href="<?= Pagination::pagelink_desc($_GET, 'order', 'price') ?>"><i class="fa fa-tag" aria-hidden="true"></i> <strong>Цена продажи</strong></a><br><a title="Сортировка по рекомендуемой цене" href="<?= Pagination::pagelink_desc($_GET, 'order', 'spec_price') ?>"><i class="fa fa-hand-o-right" aria-hidden="true"></i> <strong>Рекомендуемая цена</strong></th>
		<th><a title="Сортировка по доступности товара" href="<?= Pagination::pagelink_desc($_GET, 'order', 'active') ?>"><strong>Доступность</strong></a></th>
	</tr>
</thead>
<tbody>
	<? 
	if ($_GET['order']!="") $order_by="ORDER BY {$_GET['order']}";
	if ($_GET['desc']!="") $order_by.=" DESC";
	
	$db="SELECT * FROM products {$where} {$order_by} LIMIT {$limit['begin']}, {$limit['count']}";
	//echo $db;
	$result = mysql_query($db);
		$myrow = mysql_fetch_array($result);
		do { ?>
		<tr >
		<td valign="middle"><?= $myrow['id']; ?></td>
		<td valign="middle"><img class="img_product img-rounded img-responsive" src="img_product/noimg.png"></td>
		<td valign="middle"><? 
		$cat_name=drop::category($myrow['cat']);
		$subcat_name=drop::subcategory($myrow['subcat']);
		
	 	if ($myrow['subcat']==0) { echo ('<a type="button" title="Показать все товары категории &laquo;'.$cat_name.'&raquo;" class="btn btn-default btn-block" href="/?type=products&cat='.$myrow['cat'].'" ><i class="pull-left fa fa-folder-open" aria-hidden="true"></i>'.$cat_name.'</a>');  }
		else { 
			echo ('<a type="button" title="Показать все товары категории &laquo;'.$cat_name.'&raquo;" class="btn btn-default btn-block" href="/?type=products&cat='.$myrow['cat'].'" ><i class="pull-left fa fa-folder-open" aria-hidden="true"></i>'.$cat_name.'</a><a type="button" title="Показать все товары подкатегории &laquo;'.$subcat_name['name'].'&raquo;" class="btn btn-default btn-block btn-sm" href="/?type=products&subcat='.$myrow['subcat'].'" ><i class="pull-left fa fa-folder" aria-hidden="true"></i>'.$subcat_name['name'].'</a>');  }
			?>
		
		</td>
		<td valign="middle"><a id="button_<?= $myrow['id']; ?>" type="button" class="btn btn-block <? if ($myrow['active']!='1') echo('btn-default'); else echo('btn-info');  ?>" href="#" title="<? if ($myrow['description']!="") echo("Краткое описание:\n");else echo("Краткое описание отсутствует"); ?><?= $myrow['description']; 
		
		?>">
		<div class="text-left"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <strong><?= $myrow['name']; ?></strong> 
		 <small><?= $myrow['model']; ?></small></div> </a>
		 <? if ($myrow['manufacturer']!="") echo("<i class=\"fa fa-industry\" aria-hidden=\"true\"></i> Производитель: {$myrow['manufacturer']}"); ?> </td>
		<td valign="middle">
		<button title="Цена продажи" type="button" class="btn btn-default btn-block">
		<i class="pull-left fa fa-tag" aria-hidden="true"></i><?= $myrow['price']; ?> <?= CURRENCY ?></button>
		<button title="Рекомендуемая цена" type="button" class="pull-left btn btn-success btn-block"><i class="pull-left fa fa-hand-o-right" aria-hidden="true"></i>

		<?= $myrow['spec_price']; ?> <?= CURRENCY ?></button></td>
		<td valign="middle"><input onchange='product_form(<?= $myrow['id'] ?>)' id="checkbox_<?= $myrow['id']; ?>" type="checkbox"  name="checkbox" <? if ($myrow['active']=='1') echo("checked"); ?>><div class="active_<?= $myrow['id']; ?>"><? if ($myrow['active']=='1') echo('<font color="blue"><samll>Доступен к продаже</small></font>'); else echo ('<small>Не доступен к продаже</small>')?> </div></td>
	</tr>
		
	<?  	} 
	
while ($myrow = mysql_fetch_array($result));
//else echo('<tr class="warning"><td colspan="5"><p>ничего нет!</p></td>	</tr>');
	?>
	</tbody>
	
</table>
</form>
<? $limit=pagination::pagin($_GET,$count_products, $view_pages); 	?>