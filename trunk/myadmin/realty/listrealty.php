<table cellspacing="0" cellpadding="5" width="100%" height="100%">
	<tr>
		<td width="100%">
			<table cellspacing="0" cellpadding="0" width="100%" height="100%">
				<tr height="60">
					<td colspan="2" class="modulehead"><img src="images/config_002.png" align="left"><?=$pageTitle?></td>
				</tr>
				<tr>
					<td colspan="2" style="padding-bottom: 5px">
						<table width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<form name="frmSearch" method="post" action="<?=$searchFormActionTo?>">
								<td nowrap valign="bottom">							
									<div class="headlink"><?=$linkPath?></div>
									<div>
										<font style="font-weight:bold; color:#993300"><?=def_tukhoa?>: </font>
										<input name="KWD" class="textbox" size="20" maxlength="200" accesskey="k" value="<?=$KWD?>" onKeyUp="telexingVietUC(this)"> &nbsp;  
										<button type="submit" name="search" accesskey="t" style="margin:10px 3px 0px 10px">&nbsp; <?=def_tim?> &nbsp;</button>
									</div>								
								</td>
								</form>
	  						<td class="headlink" align="right"><?=global_btns(NULL,FORM_BLANK)?></td>		
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="headform">
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td width="275" style="font-weight:bold">
									<input type="checkbox" align="left" onClick="checkAll(this)"> 
									<a href="<?=$linktoOrderByName?>"><?=def_danhmuc?> <?=$senderArrow?></a>
								</td>
								<td width="65" align="center" style="font-weight:bold" nowrap><a href="<?=$linktoOrderByOrder?>"><?=def_thutu?> <?=$orderArrow?></a></td>
								<td width="50" align="center" style="font-weight:bold" nowrap><?=def_hien?></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="380" align="center" valign="top" height="100%" class="tbllist">
						<table width="100%" cellpadding="4" cellspacing="0" id="tblList">
							<form action="<?=$url?>&action=delete" method="post" name="frmList" onsubmit="return checkInput();">
							<?=$pageContent?>
							<tr height="25">
								<td width="100%" colspan="4"><?=paging($tRows,$curPg,$maxRows)?></td>
							</tr>
							<input type=hidden name="chon" value="<?=$chkid?>">
							<input type=hidden name="listId_O">
							<input type=hidden name="listId_V">
							<input type=hidden name="listOrder">
							<input type=hidden name="listView">
							<input type="hidden" name="orderBy" value="<?=$orderBy?>">
							<input type="hidden" name="vArrow" value="<?=$vArrow?>">
							</form>
						</table>
					</td>
					<td align="center" height="100%" valign="top" bgcolor="<?=$CL_SELECTED?>" class="tblinfo">
						<? include_once($rightContentFile)?>
					</td>
				</tr>
				<form name="frmPaging" method="post">
					<input type="hidden" name="curPg">
					<input type="hidden" name="CURID" value="<?=NULL?>">
					<input type="hidden" name="orderBy" value="<?=$orderBy?>">
					<input type="hidden" name="vArrow" value="<?=$vArrow?>">
				</form>
			</table>
		</td>
	</tr>
</table>