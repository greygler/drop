<? $products=lp_crm::getProducts(CRM,CRM_KEY); ?>
<div class="page-header">
		<h1>товары</h1>
		</div>
		<div class="visible-xs alert alert-warning alert-dismissable"> 
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Рекомендуется просматривать в горизонтальном расположении устройства.<br>Поверните устройство и заново загрузите таблицу товаров через боковое меню
		</div>
<table class="table table-striped table-responsive" >
	<tr valign="middle" class="warning">
		<td valign="middle"><small>ID</small></td>
		<td valign="middle"><small>фото</small></td>
		<td valign="middle"><small>Категория</small></td>
		<td valign="middle"><small>Наименование</small></td>
		<td valign="middle"><small>Цена</small></td>
		<td valign="middle"><small>Рекомендуемая цена</small></td>
	</tr>
	<? if ($products['status']=='ok') foreach ($products['data'] as $key => $value) { ?>
		<tr>
		<td valign="middle"><p align="text-center"><?= $value ['id']; ?></p></td>
		<td valign="middle"><img class="img_product img-rounded img-responsive" src="img_product/noimg.png"></td>
		<td valign="middle"><p align="text-center"><? 
		if ($categories['data'][$value['category_id']]['name']!="") echo $categories['data'][$value['category_id']]['name'];
		else echo $value['category_id'];
		?></p></td>
		<td valign="middle"><p align="text-left"><?= $value ['name']; ?></p></td>
		<td valign="middle"><p align="text-center"><?= $value ['price']; ?></p></td>
		<td valign="middle"><p align="text-center"><?= $value ['spec_price']; ?></p></td>
	</tr>
		
	<? }
else echo('<tr class="warning"><td colspan="5"><p>ничего нет!</p></td>	</tr>');
	?>
	
</table>