<?
class Pagination{

public function  pagelink($params)
{
 $link='/?'.http_build_query($params);
 return $link; 
}
public function pagelink_desc($params, $param, $element)
{
if ($params[$param]==$element){
		if ($params['desc']!='') $params['desc']=''; else $params['desc']='1';
	}
	
		
$params[$param]=$element;
	return Pagination::pagelink($params);
}

public function  pagin($get_params, $count_records, $view_pages ) 
// Передаем содержимое $_GET, общее колличество записей и массив колличества отображаемых страниц
// Возвращаем массив с первым номером, с которого начинается выборка ['begin'] и колличеством отображаемых полей ['count'] 
{
if ($get_params['page_no']!="") $page_no=$get_params['page_no']; else $page_no=1; 
if (($get_params['pages']!="") AND ($get_params['pages']!='all'))  $limit=$get_params['pages']; 
else 
	if ($get_params['pages']!='all')
	$limit=$view_pages['0']; else $limit=$count_records;
$count_pages=ceil($count_records/$limit);
if ($page_no==1) $begin=0; else $begin=(($page_no-1)*$limit);
?>
<? if (($get_params['pages']<$count_records) AND ($count_records>$limit))  { ?>
<ul class="pagination">
  <li <? if ($page_no==1) {echo('class="disabled"'); $href="#";$ps=". В данном случае выбор не возможен!"; } else {$get_params['page_no']=$page_no-1; $href=Pagination::pagelink($get_params); $page_no_p=$page_no-1; $ps="&nbsp;".$page_no_p;} ?>><a href="<?= $href  ?>" title="Предыдущая страница<?= $ps; ?>">&laquo;</a></li>
  <? for ($i=1; $i<=$count_pages; $i++ ) { ?>
  <li <? if ($i==$page_no) {echo('class="active"'); $str="Текущая страница";} else $str="Перейти к странице {$i}"; ?>>
  <a title="<?= $str ?>" href="<? $get_params['page_no']=$i; echo Pagination::pagelink($get_params) ?>"><?= $i ?> <span class="sr-only">(current)</span></a></li>
  <? } ?>
  <!-- <li><a href="#">2 <span class="sr-only">(current)</span></a></li> -->
  <li <? if ($page_no==$count_pages) { echo('class="disabled"'); $href="#";$ss=". В данном случае выбор не возможен!";} else{ $get_params['page_no']=$page_no+1; $href=Pagination::pagelink($get_params); $page_no_s=$page_no+1; $ss="&nbsp;".$page_no_s; }  ?>><a href="<?= $href  ?>" title="Следующая страница<?= $ss; ?>">&raquo;</a></li>
</ul>
<? } else $style_form="padding-bottom: 15px"; ?>

<form style="<?= $style_form ?>" role="form" class="page_form" action="<?= $_SERVER["PHP_SELF"] ?>"> 
<? foreach($get_params as $key => $value) if (($key!="pages") AND ($key!="page_no"))  echo('<input type="hidden" value="'.$value.'" name="'.$key.'">'."\n"); ?>
<select class="form-control" size="1" name="pages" onchange="this.form.submit()" title="Колличество отображаемых на странице строк">
<? foreach($view_pages as $key => $value) {?>
	<option <? if ($limit==$value) echo ("selected"); ?> value="<?= $value ?>"><?= $value ?></option>
	<? } ?>
	<option <? if ($limit==$count_records) echo ("selected"); ?> value="all">Все</option>
	</select>
	
	</form>

<?
$limit_array['begin']=$begin;
$limit_array['count']=$limit;
return $limit_array;
} } ?>