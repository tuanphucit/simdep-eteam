<script language="javascript" src="../js/modalbox/prototype.js"></script>
<script language="javascript" src="../js/modalbox/scriptaculous.js"></script>
<script language="javascript" src="../js/modalbox/modalbox.js"></script>
<style type="text/css">@import url("../css/modalbox.css");</style>
<table width="100%" cellpadding="0" cellspacing="0">
	<tr height="30"><td><?=private_btns()?></td></tr>
	<tr>
		<td width="100%">					
			<div id="MAIN" class="maindiv" style="width: 200px; height: 200px; position:relative; border:0px">
			<table width="100%" cellspacing="0" cellpadding="0">
				<form action="<?=$url?>&action=update" name="frmEdit" method="post" enctype="multipart/form-data">
				<tr height="30" bgcolor="<?=$CL_SELECTED?>">
					<td class="rowinfohead" nowrap width="20%"><b><?=def_tendanhmuc?>:</b></td>
					<td width="80%" class="rowinfo">
						<input type="text" name="nname" size="20" maxlength="255" value="<?=$cur_name?>" readonly="1" class="textbox">
					</td>
				</tr>
				<tr>
					<td class="rowinfohead"><?=def_anh?>: </td>
					<td class="rowinfo">
						<div id="CURIMAGE">
							<a href="preview_image.php?src=../<?=$image?>" title="<?=$cur_name?>" onClick="Modalbox.show(this.href, {title: this.title,overlayClose: false}); return false;">
								<img src="../<?=$thumb?>" border="0" alt="<?=$cur_name?>">
							</a>
						</div>
						<div><input type="file" name="image" size="20" class="textbox" style="display:none; margin-top:10px"></div>
					</td>
				</tr>
				<!--
				<tr height="30" bgcolor="<?=$CL_SELECTED?>">
					<td class="rowinfohead" nowrap width="20%"><b><?=def_chuthich?>:</b></td>
					<td width="80%" class="rowinfo">
						<input type="text" name="note" size="40" maxlength="255" value="<?=$note?>" readonly="1" class="textbox">
					</td>
				</tr>
				-->
				<tr>
					<td class="rowinfohead"><?=def_thutu?>: </td>
					<td class="rowinfo"><input name="order" type="text" value="<?=$cur_order?>" class="textbox" size="5" maxlength="11" readonly="1"></td>
				</tr>
				<tr>
					<td class="rowinfohead"><?=def_hien?>: </td>
					<td class="rowinfo"><input name="view" type="checkbox" <?=$cur_view?> value="1" disabled></td>
				</tr>
				<input type="hidden" name="CURID" value="<?=$CURID?>">
				<input type="hidden" name="old_thumb" value="<?=$thumb?>">
				<input type="hidden" name="old_image" value="<?=$image?>">
				</form>
			</table>
			</div>
		</td>
	</tr>
</table>
