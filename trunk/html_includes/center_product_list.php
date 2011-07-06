<?
if(!$_PAGE_VALID)
{
	exit();
}
?>
<script language="javascript">
var oldObjId = null;
function expandLeftMenu(objId)
{
	if(oldObjId!=null && objId != oldObjId)
	{
		getObjectById('leftMenuItem_'+oldObjId).className = 'leftMenuItem';
		getObjectById('subLeftMenu_'+oldObjId).style.display = 'none';
	}
	if(getObjectById('subLeftMenu_'+objId).style.display == 'none')
	{
		getObjectById('leftMenuItem_'+objId).className = 'leftMenuItemExpand';
		getObjectById('subLeftMenu_'+objId).style.display = '';
	}
	else
	{
		getObjectById('leftMenuItem_'+objId).className = 'leftMenuItem';
		getObjectById('subLeftMenu_'+objId).style.display = 'none';
	}
	oldObjId = objId;
}
</script>
	<div id="middle-content">
	<?=$contentDetail?>
	<?=paging($tRows,$curPg,$maxRows,$curURL)?>
	</div>
<?
if(!$curLeftMenu)
{
	$conds = "language_id='".$lang."' AND modules_parent=0 AND modules_view=1 AND modules_pos = '0,1,0'";
	$others = "ORDER BY modules_order ASC LIMIT 1";
	$curLeftMenu = $opt->optionvalue("vot_modules", "modules_id", $conds, $others);	
}
if($curLeftMenu)
{	
	expandLeftMenu($curLeftMenu);
}
?>	
