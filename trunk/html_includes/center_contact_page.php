<?
if(!$_PAGE_VALID)
{
	exit();
}
?>
<script language="javascript">
function doContactSubmit()
{
	var myFrm = document.frmContact;
	if(myFrm.fullname.value == '')
	{
		alert('<?=$define["var_vuilongnhaphoten"]?>');
		myFrm.fullname.focus();
		return false;
	}
	if(!isEmail(myFrm.email.value))
	{
		alert('<?=$define["var_vuilongkiemtralaimail"]?>');
		myFrm.email.focus();
		return false;
	}
	if(myFrm.securityCode.value == '')
	{
		alert('<?=$define["var_vuilongnhapmabaove"]?>');
		myFrm.securityCode.focus();
		return false;
	}
	return true;
}
</script>
<div id="middle-content">
<!-- Contact  -->
 <div id="contact">
                    <div id="map">
                        <div id="map-canvas"></div>
                        <!-- map css -->
                        <link rel="stylesheet" type="text/css" href="http://www.google.com/uds/css/gsearch.css" />
                        <link rel="stylesheet" type="text/css" href="http://www.google.com/uds/solutions/localsearch/gmlocalsearch.css" />
                        <link rel="stylesheet" type="text/css" href="http://www.google.com/uds/solutions/mapsearch/gsmapsearch.css" />

                        <!-- map js -->
                        <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAlXwQNVL6R0pjorvSTlfROxTeKrZhl51VDpvn_eQuCQRbHGfDOBT5IWZ6YNdfXsaaQmyeSzySZOVnaA" type="text/javascript"></script>
                        <script src="http://www.google.com/uds/api?file=uds.js&v=1.0&key=ABQIAAAAlXwQNVL6R0pjorvSTlfROxTeKrZhl51VDpvn_eQuCQRbHGfDOBT5IWZ6YNdfXsaaQmyeSzySZOVnaA" type="text/javascript"></script>
                        <script src="http://www.google.com/uds/solutions/localsearch/gmlocalsearch.js" type="text/javascript"></script>
                        <script type="text/javascript" language="javascript" src="/js/map_javascript.js"></script>
                    </div><!-- End #map -->
                    <div class="type">
                        Bộ gõ
                        <input name="type" type="radio" onclick="Mudim.SetMethod(0);" checked />Tắt
                        <input name="type" type="radio" onclick="Mudim.SetMethod(1);" />VNI
                        <input name="type" type="radio" onclick="Mudim.SetMethod(2);" />Telex
                        <input name="type" type="radio" onclick="Mudim.SetMethod(3);" />Viqr
                        <input name="type" type="radio" onclick="Mudim.SetMethod(4);" />Tổng hợp
                        <input name="type" type="radio" onclick="Mudim.SetMethod(5);" />Tự động
                    </div>
            </div>
<?
if($doAction == 'send' && $isSent == 1)
{
?>
						<table width="70%" height="100" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center"><?=$sentContent?></td>
							</tr>
						</table>
<?
}
?>
						<div class="itemName"><?//=$contentDetail?></div>
<?
if($errorMess)
{
?>
						<div id="messError" style="font-size:11px; color:#FF0000" align="center"><?=$errorMess?></div>
<?
}
?>
						<div id="myContactForm" style="text-align:center; padding-left:10px;padding-top:15px">
							<form name="frmContact" action="<?=$_URL_BASE?>/index.php/contact" method="post" onSubmit="return doContactSubmit()">
								<table width="80%" align="center" cellpadding="3" cellspacing="0"  border="0">
									<tr>
										<td align="right" width="30%" nowrap style="font-size:11px" class="itemname"> Tên khách hàng&nbsp;(<font color="#FF3300">*</font>):</td> </td>
										<td><input name="fullname" maxlength="100" class="textbox" value="<?=$fullname?>" style="width:260px; height:21px;margin-top:3px;">
									</tr>
									<tr>
										<td align="right" width="30%" nowrap style="font-size:11px" class="itemname"><?=$define["var_diachi"]?> : </td>
										<td><input name="address" maxlength="255" class="textbox" value="<?=$address?>" style="width:260px; height:21px;margin-top:3px;"></td>
									</tr>
									<tr>
										<td align="right" width="30%" nowrap style="font-size:11px" class="itemname"><?=$define["var_dienthoai"]?> : </td>
										<td><input name="tel" maxlength="30" class="textbox" value="<?=$tel?>" style="width:260px; height:21px;margin-top:3px;"></td>
									</tr>
									<tr>
										<td align="right" width="30%" nowrap style="font-size:11px" class="itemname"><?=$define["var_email"]?> &nbsp;(<font color="#FF3300">*</font>): </td>
										<td><input name="email" maxlength="50" class="textbox" value="<?=$email?>" style="width:260px; height:21px;margin-top:3px;"></td>
									</tr>
									<tr>
										<td align="right" width="30%" nowrap sstyle="font-size:11px" class="itemname"><?=$define["var_fax"]?> : </td>
										<td><input name="fax" maxlength="30" class="textbox" value="<?=$fax?>" style="width:260px; height:21px;margin-top:3px;"></td>
									</tr>
									<tr>
										<td align="right" width="30%" nowrap style="font-size:11px" class="itemname"></td>
										<td><img src="<?=$_URL_BASE?>/captcha/CaptchaSecurityImages.php?width=120&height=40&characters=6" /></td>
									</tr>
									<tr>
										<td align="right" width="30%" nowrap style="font-size:11px" class="itemname"><?=$define["var_mabaove"]?> &nbsp;(<font color="#FF3300">*</font>): </td>
										<td><input name="securityCode" maxlength="6" class="textbox" style="width:100px; height:21px;margin-top:3px;"></td>
									</tr>
									<tr>
										<td align="right" width="30%" nowrap valign="top" style="font-size:11px" class="itemname"><?=$define["var_noidungyeucau"]?> : </td>
										<td><textarea name="request" rows="7" class="textBox" style="width:260px;margin-top:3px;"><?=$request?></textarea></td>
									</tr>
									<tr>
										<td width="30%" align="center">&nbsp;</td>
										<td nowrap>
											<button type="submit" name="sbmt"><?=$define["var_gui"]?></button> &nbsp;&nbsp;
											<button type="reset" name="rest"><?=$define["var_nhaplai"]?></button>
										</td>
									</tr>
									<tr>
										<td width="30%">&nbsp;</td>
										<td nowrap style="font-size:11px;marker-top:7px " class="itemname">(<font color="#FF3300">*</font>) <?=$define["var_truongbatbuoc"]?></td>
									</tr>
								</table>
								<input type="hidden" name="doAction" value="send">
							</form>
						</div>
					</td>
				</tr>
			</table>
		
		</div>
<?
if($errorMess)
{
?>
<script language="javascript">
window.scrollTo(messError.offsetLeft, messError.offsetTop);
document.frmContact.securityCode.focus();
</script>
<?
}
?>
