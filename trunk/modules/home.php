<?
if(!$_PAGE_VALID)
{
	exit();
}
$blockContent.= '<table width="100%" cellpadding="0" cellspacing="0" border="0" ;>
							<tr height="26">
								<td width="25" style="font-family:tahoma; font-size:11px;color:white;font-weight:bold; text-align:center;background-color:#2D427B">STT</td>
								<td width="70" style="font-family:tahoma; font-size:11px;color:white;font-weight:bold; text-align:center;background:url(../images/frame_bg.gif)">'.$define["var_sosim"].'</td>
								<td width="70" style="font-family:tahoma; font-size:11px;color:white; font-weight:bold;text-align:center;background:url(../images/frame_bg.gif)">'.$define["var_gia"].'</td>
								<td width="70" style="font-family:tahoma; font-size:11px;color:white;font-weight:bold;text-align:center;background:url(../images/frame_bg.gif)">'.$define["var_taikhoan"].'</td>
								<td width="70" style="font-family:tahoma; font-size:11px;color:white;font-weight:bold; text-align:center;background-color:#2D427B">Loại </td>
								<td width="30" style="font-family:tahoma; font-size:11px;color:white;font-weight:bold;text-align:center;background:url(../images/frame_bg.gif)">Đặt mua</td>
							</tr>';
	$count = 0;	
$sql = new mysql;
$conds = "language_id='".$lang."' AND homeblock_view = 1 ";
$others = "ORDER BY homeblock_order ASC";
$sql->set_query("vot_homeblock", "*", $conds, $others);

	while($sql->set_farray())
	{
		$tabId = $sql->farray["modules_id"];
		$moId = $sql->farray["modules_id"];
		$tabName = $sql->farray["homeblock_name"];
		$tabLink = $sql->farray["homeblock_linkto"];
		$typePos = $sql->farray["homeblock_istop"];

	/*			
$sqll = new mysql();
$conds = "modules_id='".$tabId."'";
$sqll->set_query("vot_modules", "*", $conds);
if($sql->set_farray())
{
	$curLevel = $sql->farray["modules_level"];
	$source = $sql->farray["modules_type"];
}
for($i = $curLvel+1; $i <= $maxLevel; $i++)
{
	$conds = "modules_parent IN ('".$tabId."') AND modules_view=1";
	$sqll->set_query("vot_modules", "*", $conds);
	while($sqll->set_farray())
	{
	$tabId .= "','".$sqll->farray["modules_id"];
	}
}*/
$sqql = new mysql();
$sqlnn="view = 1 AND category IN ('".$moId."')";$ngaunhien=rand(0,$demnn);
$oder = "ORDER BY thutu ASC, giaxuat DESC LIMIT $ngaunhien,".$config["site_Productmaxnum"]."";
	$sqql->set_query("product", "id", $sqlnn, $oder);
	$demnn =$sqql->nRows;
											
	/*luckymancvp*/		
											   
	$cond = "view = 1 AND category IN ('".$moId."')";
	if ($config["site_showproduct"] == 1)
		$cond .= " AND ihight = '1' ";
	
	$others = "ORDER BY thutu ASC, giaxuat DESC LIMIT 0,".$config["site_Productmaxnum"]."";
	
	
	if ($config["site_showproduct"] == 3)
		$others = "ORDER BY RAND() LIMIT 0,".$config["site_Productmaxnum"]."";
	if ($config["site_showproduct"] == 6)
		$others = "ORDER BY thutu ASC, giaxuat DESC LIMIT $ngaunhien,".$config["site_Productmaxnum"]."";
	if ($config["site_showproduct"] == 8)
		$others = "ORDER BY thutu ASC, giaxuat ASC LIMIT $ngaunhien,".$config["site_Productmaxnum"]."";
	
	$sqql->set_query("product", "DISTINCT sosim", $cond, $others);
	$tRows =$sqql->nRows;
						
	while($sqql->set_farray())
	{
				$count ++;
				$productName = $sqql->farray["sosim"];
				$productId = $opt->optionvalue("product", "id", "sosim='".$productName."'");
				$productName = str_replace("`","",$productName);
				$productName1 = str_replace(".","",$productName);
				$productName2 = str_replace(" ","",$productName1);
				$price = geld($opt->optionvalue("product", "giaxuat", "id='".$productId ."'"));

				$conds="(right(sosim, 2)=left(right(sosim,4),2) AND left(right(sosim,2),1)=left(right(sosim,3),1))";
				
				//$type =  $opt->optionvalue("product", "category", "id ='".$productId ."'");
				//$loai =  $opt->optionvalue("vot_modules","modules_name","modules_id = '".$type."'");
				//$taihkoan = geld($opt->optionvalue("product", "taikhoan", "id='".$productId ."'"));
				//Tu quy 
					
	//so taxi				$conds="((right(sosim,2)=left(right(sosim,4),2) AND left(right(sosim,4),2) =left(right(sosim,6),2) AND right(sosim,1)!=left(right(sosim,2),1)) OR (right(sosim,3)=left(right(sosim,6),3) AND right(sosim,1)!=left(right(sosim,2),1)))";
//	so tien				$conds="(right(sosim,1)=(left(right(sosim,2),1)+1) AND left(right(sosim,3),1) = (left(right(sosim,2),1)-1))";
//	so kep				$conds="( (right(sosim,1)=left(right(sosim,2),1) && left(right(sosim,3),1)=left(right(sosim,4),1)) && (right(sosim,2)!=left(right(sosim,3),2)))";
//	nam sinh				$conds="(right(sosim,4) > '1959' AND right(sosim,4) < '2010')";
//	ganh dao				$conds="(right(sosim,1) = left(right(sosim,4),1) AND left(right(sosim,3),1) = left(right(sosim,2),1)) AND right(sosim,1) != left(right(sosim,2),1)";
//	than tai				$conds="(right(sosim,4)='7997' || right(sosim,2) IN (39,79,38,78) || right(sosim,3) IN (799,399))";

				// toanvv
				if(substr($productName,-1)==substr($productName,-2,1) && substr($productName,-2,1) == substr($productName,-3,1) && substr($productName,-3,1) != substr($productName,-4,1))
				{
					$loai = "Tam Hoa - Tam Quý";
				}
				if(substr($productName,-2)== '68' || substr($productName,-2)== '86' || substr($productName,-3)== '688'|| substr($productName,-2)== '886')
				{
					$loai = "Lộc Phát";
				}
				if( (substr($productName,-2) == substr($productName,-4,2) && substr($productName,-4,2) == substr($productName,-6,2) && substr($productName,-1) != substr($productName,-2,1)) || ( substr($productName,-3) == substr($productName,-6,3) && substr($productName,-1) != substr($productName,-2,1)))
				{
					$loai = "Taxi";
				}
				if(substr($productName,-1) == substr($productName,-2,1) && substr($productName,-3,1) == substr($productName,-4,1) && substr($productName,-2)!= substr($productName,-3,2))
				{
					$loai = "Số kép 2 - kép 3";
				}
				
				if(substr($productName,-4) > '1959' && substr($productName,-4) < '2011')
					{
					$loai = " Năm sinh - Kỷ niệm";
					}
				if(substr($productName,-1) == substr($productName,-4,1) && substr($productName,-3,1) == substr($productName,-2,1) && substr($productName,-1) != substr($productName,-2,1))
				{
					$loai = "Gánh đảo";
				}
				if(substr($productName,-4) == '7997' || (substr($productName,-2) == '39' || substr($productName,-2) == '79' || substr($productName,-2) == '38' || substr($productName,-2) == '78' ) || substr($productName,-3) == '799' ||substr($productName,-3) == '399')
					{
					$loai = "Thần Tài";
					}
				if(substr($productName,-2) == substr($productName,-4,2)  &&  substr($productName,-2,1)== substr($productName,-3,1) )
					{
					$loai = "Tứ Quý - Ngũ Quý";
					}
				if(substr($productName,-1) == (substr($productName,-2,1)+1) && substr($productName,-3,1) == (substr($productName,-2,1)-1) )
					{
					$loai = "Số tiến";
					}
				
				//////////////logoooooooo
				if(strlen($productName2) > 3) 
					{
					$logo = substr($productName2, 0, 3);
					}
					
				if($logo=='090' || $logo == '093')
					{
					$taihkoan = "<img src=\"".$_IMG_DIR."/mobi.gif\" border=0>";
					}
				else if($logo=='098' || $logo == '097')
					{
					$taihkoan = "<img src=\"".$_IMG_DIR."/viettel.gif\" border=0>";
					}	
				else if($logo=='091' || $logo == '094')
					{
					$taihkoan = "<img src=\"".$_IMG_DIR."/vina.gif\" border=0>";
					}	
				else if($logo=='095')
					{
					$taihkoan = "<img src=\"".$_IMG_DIR."/Sfone.gif\" border=0>";
					}	
				else if($logo=='092')
					{
					$taihkoan = "<img src=\"".$_IMG_DIR."/vn-mobile.gif\" border=0>";
					}
				else if($logo=='012' || $logo=='016')
					{
						if(strlen($productName2) > 4) 
						{
						$logo = substr($productName2, 0, 4);
						}
							if($logo=='0123' || $logo=='0124' || $logo=='0127' || $logo == '0125' || $logo == '0129' )
								{
								$taihkoan = "<img src=\"".$_IMG_DIR."/vina.gif\" border=0>";
								}
							else if($logo=='0163' || $logo=='0164' || $logo=='0165' || $logo=='0166' || $logo=='0167' || $logo == '0168' || $logo == '0169')
								{
								$taihkoan = "<img src=\"".$_IMG_DIR."/viettel.gif\" border=0>";
								}	
								else if($logo=='0119')
								{
								$taihkoan = "<img src=\"".$_IMG_DIR."/beeline.gif\" border=0>";
								}
							else 
								{
								$taihkoan = "<img src=\"".$_IMG_DIR."/mobi.gif\" border=0>";
								}	
					}		
				else
					{
					$taihkoan = "<img src=\"".$_IMG_DIR."/vnpt.gif\" border=0>";
					}		
				
		$Linkto = "$_URL_BASE/index.php/order/$productId/sim-so-dep-$productName.html";
/*luckymancvp *  */
$blockContent.= "
				<tr height=\"24\">
					<td width=\"25\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:13px;color:#000000; text-align:center;\">".$count."</td>
					<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:13px;color:#000000; text-align:center;font-weight:bold\"><a href=\"".$Linkto."\" style=\"color:#0055A8 \" >".$productName."</a></td>
					<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:arial; font-size:13px;color:#000000; text-align:center;\">".$price." </td>
					<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:11px;color:#000000;text-align:center;\">".$taihkoan."</td>
					<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:11px;color:#000000;text-align:center;\">".$loai."</td>
					<td width=\"30\" style=\"border-right:0px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:11px;color:#000000; text-align:center;font-weight:bold\" class=\"datmua\"><a href=\"".$Linkto."\"><img src=\" ".$_IMG_DIR.'/cart_icon.png'."\"> </a></td>
				</tr>";		
	 }
	 
}
$blockContent.='</table></td></tr><tr><td height="30" style="background-image:url('.$_IMG_DIR.'/pagetitle_1.gif); background-repeat:repeat-y; padding-left:5px;"><span style="text-align:right; padding-left:270px"><a style="text-align:right;color:#ff6603; font-weight:bold; font-family:tahoma" href="'.$_URL_BASE.'/index.php/57/all-product">'.$define["var_tatca"].'</a></span></td></tr><tr><td valign="top" style="padding-bottom:10px"></td><tr></table>';	
require_once("$_HTML_DIR/center_content_home.php");

?>