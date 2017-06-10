<?
//if (($_SESSION['users_group']>0) AND ($_SESSION['users_group']<5)) {
 require_once (CLASS_PATH.'/pagination.class.php');
 if ($_GET['cat']!="") $where="cat={$_GET['cat']}";
 if ($_GET['subcat']!="") $where="subcat={$_GET['subcat']}";
 if ($_GET['product']!="") $where="name LIKE '%{$_GET['product']}%'";
$count_products=db::cound_bd('products', $where);
if ($where!='') $where="WHERE ".$where;
if ($_SESSION['user_group']<5) echo('<script src="'.JS_PATH.'/product.php"></script>')
?>
<style>
/* table               { border-collapse: collapse; width: 100%; margin-top: 109px; }
td                  { border: 1px solid #ccc; padding: 10px; }

thead               { width: 100%; position: fixed; height: 109px; top: 150px;
                      } */
</style>
	


<div class="page-header">
		<h1>товары</h1>
		</div>
		<div class="visible-xs alert alert-warning alert-dismissable"> 
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Рекомендуется просматривать в горизонтальном расположении устройства.<br>Поверните устройство и заново загрузите таблицу товаров через боковое меню
		</div>
		<? $limit=pagination::pagin($_GET,$count_products, $view_pages); 	?>
		
<table class="table table-striped table-responsive" >
<thead>
	<tr>
		<th><a title="Сортировка по ID" href="<?= Pagination::pagelink_desc($_GET, 'order', 'id') ?>"><strong>ID</strong> <br><span class="badge"><?= Pagination::sort_symbol($_GET,'order','id', 'sort-numeric-asc', 'sort-numeric-desc'); ?></span></a></th>
		<th><strong>Фото <wbr>товара</strong></th>
		<th><a title="Сортировка по категории" href="<?= Pagination::pagelink_desc($_GET, 'order', 'cat') ?>"><i class="pull-left fa fa-folder-open" aria-hidden="true"></i> <strong>Категория</strong> <span class="badge pull-right"><?= Pagination::sort_symbol($_GET,'order', 'cat', 'sort-alpha-asc', 'sort-alpha-desc'); ?></span></a><br><a title="Сортировка по подкатегории" href="<?= Pagination::pagelink_desc($_GET, 'order', 'subcat') ?>"><i class="pull-left fa fa-folder" aria-hidden="true"></i> <strong>Подкат.</strong> <span class="badge pull-right"><?= Pagination::sort_symbol($_GET,'order', 'subcat', 'sort-alpha-asc', 'sort-alpha-desc'); ?></span></a></th>
		<th><a title="Сортировка по наименованию" href="<?= Pagination::pagelink_desc($_GET, 'order', 'name') ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <strong> Наименование, модель</strong> <span class="badge"><?= Pagination::sort_symbol($_GET,'order', 'name', 'sort-alpha-asc', 'sort-alpha-desc'); ?></span></a><br><a title="Сортировка по производителю" href="<?= Pagination::pagelink_desc($_GET, 'order', 'manufacturer') ?>"><i class="fa fa-industry" aria-hidden="true"></i> <strong> Производитель</strong> <span class="badge"><?= Pagination::sort_symbol($_GET,'order', 'manufacturer', 'sort-alpha-asc', 'sort-alpha-desc'); ?></span></a></th>
		<th><a title="Сортировка по цене продажи" href="<?= Pagination::pagelink_desc($_GET, 'order', 'price') ?>"><i class="fa fa-tag" aria-hidden="true"></i> <strong>Цена</strong> <span class="badge"><?= Pagination::sort_symbol($_GET,'order','price', 'sort-numeric-asc', 'sort-numeric-desc'); ?></span></a><br><a title="Сортировка по рекомендуемой цене" href="<?= Pagination::pagelink_desc($_GET, 'order', 'spec_price') ?>"><i class="fa fa-hand-o-right" aria-hidden="true"></i> <strong><small>Топ-ценa</small></strong> <span class="badge"><?= Pagination::sort_symbol($_GET,'order','spec_price', 'sort-numeric-asc', 'sort-numeric-desc'); ?></span></a></th>
		<? if ($_SESSION['users_group']<5) { ?> 
		<th><a title="Сортировка по доступности товара" href="<?= Pagination::pagelink_desc($_GET, 'order', 'active') ?>"><strong>Доступность</strong> <span class="badge pull-right"><?= Pagination::sort_symbol($_GET,'order','spec_price', 'sort-numeric-asc', 'sort-numeric-desc'); ?></span></a></th><? } ?>
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
		do if (($_SESSION['users_group']<5) OR ($myrow['active']!=0)) { ?>
		<form id="product_form_<?= $myrow['id'] ?>" action="javascript:void(null);" method="post" enctype="multipart/form-data" onsubmit="new_image(<?= $myrow['id'] ?>)">
		<tr >
		<td valign="middle"><?= $myrow['id']; ?></td><? if ($myrow['pic']!="") $img_name=$myrow['pic']; else $img_name=IMG_PRODUCT_NAME ?>
		<td valign="middle">
		<a title="Кликните для увеличения картинки" href="<?= IMG_PRODUCT_PATH.$img_name ?>" data-fancybox="images" data-caption="<?= $myrow['name']; ?>">
		<img id="img_<?= $myrow['id']; ?>" class="img_product img-rounded img-responsive fleft" src="<?= IMG_PRODUCT_PATH.$img_name ?>"></a>
		<? if ($_SESSION['users_group']<5)  echo drop::refresh_img($myrow['id'], $img_name); ?>
		</td>
		<td valign="middle"><? 
		$cat_name=drop::category($myrow['cat']);
		$subcat_name=drop::subcategory($myrow['subcat']);
		
	 	if ($myrow['subcat']==0) { echo ('<a type="button" title="Показать все товары категории &laquo;'.$cat_name.'&raquo;" class="btn btn-default btn-block" href="/?type=products&cat='.$myrow['cat'].'" ><i class="pull-left fa fa-folder-open" aria-hidden="true"></i>'.$cat_name.'</a>');  }
		else { 
			echo ('<a type="button" title="Показать все товары категории &laquo;'.$cat_name.'&raquo;" class="btn btn-default btn-block" href="/?type=products&cat='.$myrow['cat'].'" ><i class="pull-left fa fa-folder-open" aria-hidden="true"></i>'.$cat_name.'</a><a type="button" title="Показать все товары подкатегории &laquo;'.$subcat_name['name'].'&raquo;" class="btn btn-default btn-block btn-sm" href="/?type=products&subcat='.$myrow['subcat'].'" ><i class="pull-left fa fa-folder" aria-hidden="true"></i>'.$subcat_name['name'].'</a>');  }
			?>
		
		</td>
		<td valign="middle"><a data-fancybox data-src="<?= ACTION_PATH ?>/one_product.php?id=<?= $myrow['id']; ?>" id="button_<?= $myrow['id']; ?>" type="button" class="fancybox btn btn-block <? if ($myrow['active']!='1') echo('btn-default'); else echo('btn-info');  ?>" href="javascript:;" title="<?= $myrow['name']; ?>"><div class="text-left"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <strong><?= $myrow['name']; ?></strong> 
		 <small><?= $myrow['model']; ?></small></div> </a>
		 <? if ($myrow['manufacturer']!="") echo("<i class=\"fa fa-industry\" aria-hidden=\"true\"></i> Производитель: {$myrow['manufacturer']}"); ?> </td>
		<td valign="middle">
		<button title="Цена продажи" type="button" class="btn btn-default btn-block">
		<i class="pull-left fa fa-tag" aria-hidden="true"></i><?= $myrow['price']; ?> <?= CURRENCY ?></button>
		<button title="Рекомендуемая цена" type="button" class="pull-left btn btn-success btn-block"><i class="pull-left fa fa-hand-o-right" aria-hidden="true"></i>

		<?= $myrow['spec_price']; ?> <?= CURRENCY ?></button></td>
		<? if ($_SESSION['users_group']<5) { ?> 
		<td valign="middle"><input onchange='product_form(<?= $myrow['id'] ?>)' id="checkbox_<?= $myrow['id']; ?>" type="checkbox"  name="checkbox" <? if ($myrow['active']=='1') echo("checked"); ?>><div class="active_<?= $myrow['id']; ?>"><? if ($myrow['active']=='1') echo('<font color="blue"><samll>Доступен к продаже</small></font>'); else echo ('<small>Не доступен к продаже</small>')?> </div></td> <? } ?>
	</tr>
	
		</form>
	<?  	} 
	
while ($myrow = mysql_fetch_array($result));
//else echo('<tr class="warning"><td colspan="5"><p>ничего нет!</p></td>	</tr>');
	?>
	</tbody>
	
</table>

<? $limit=pagination::pagin($_GET,$count_products, $view_pages); //	}?>