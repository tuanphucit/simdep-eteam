<?
if(!$cateId || !validGetVar($cateId))
{
	redirect("$_URL_BASE/");
}

$nCols = 4;
$count = 1;
$colWidth = round(100/$nCols);
$maxRows = 50;

$checked = array(0 => NULL, 1 => "checked");

$maxImgW = 127;
$maxImgH = 165;

$listCateId = $cateId;
$listParCate = $cateId;
$loai = NULL;
if(!$itemId || !validGetVar($itemId))
{
	if(checkSubCate($cateId) > 0)
	{
	$contentTitle = NULL;
		$curLevel = 0;
		$maxLevel = $opt->optionvalue("vot_modules", "MAX(modules_level)", "language_id='".$lang."' AND modules_view=1");
		$listCateId = NULL;
		$conds = "modules_id='".$cateId."'";
		$sql->set_query("vot_modules", "*", $conds);
		if($sql->set_farray())
		{
			$curLevel = $sql->farray["modules_level"];
		}
		for($i = $curLevel+1; $i <= $maxLevel; $i++)
		{
			$conds = "modules_parent IN ('".$listParCate."') AND modules_level='".$i."' AND modules_view=1";
			$others = "ORDER BY modules_order ASC";
			$sql->set_query("vot_modules", "*", $conds, $others);
			//$listParCate = NULL;
			while($sql->set_farray())
			{
				$subCateId = $sql->farray["modules_id"];
				$subCateName = $sql->farray["modules_name"];
				
				$subCateLink = $sql->farray["modules_linkto"];
				if(checkSubCate($subCateId))
				{
					if($listParCate != NULL) $listParCate .= "','".$subCateId;
					else $listParCate .= $subCateId;
				}
				else
				{
					if($listCateId != NULL) $listCateId .= "','".$subCateId;
					else $listCateId .= $subCateId;
				}
			}
		}
	}
    $contentTitle = "".$define["var_danhsachsodep"]." ".$subPageTitle."";
	$pageTitle = NULL;

	switch ($listCateId)
{
	case '28':
	$kieusim="Đầu Số Vinaphone 091";
	$conds="(left(right(sosim,10),3)='091')";
	break;
	
	case '7':
	$kieusim = "Sim Viettel";
	$conds="(left(sosim,3)='097'OR left(sosim,3)='098' OR left(sosim,4)='0165' OR left(sosim,4)='0166' OR left(sosim,4)='0167' OR left(sosim,4)='0168' OR left(sosim,4)='0169')";
	$loai = NULL;	
	break;
	case '29':
	$kieusim="Đầu Số Mobifone 090";
	$conds="(left(right(sosim,10),3)='090')";
	break;
	case '30':
	$kieusim="Đầu Số Viettel 098";
	$conds="(left(right(sosim,10),3)='098')";
	break;
	/*case 'dau-090':
	$kieusim="Đầu Số Mobifone 090";
	$conds="WHERE (left(sosim,3)='090')";
	break;
	case 'dau-0933':
	$kieusim="Đầu Số Mobifone 0933";
	$conds="WHERE (left(sosim,4)='0933')";
	break;
	case 'dau-097':
	$kieusim="Đầu Số Viettel 097";
	$conds="WHERE (left(sosim,3)='097')";
	break;
	case 'dau-098':
	$kieusim="Đầu Số Viettel 098";
	$conds="WHERE (left(sosim,3)='098')";
	break;*/
	
	//tim sim theo gia
	case '45':
	$kieusim="Sim dưới 500.000";
	$conds="(giaxuat <= 500000)";
	break;
	
	case '44':
	$kieusim="Từ 500k >> 1 Triệu";
	$conds="(giaxuat >= 500000) AND (giaxuat <= 1000000)";
	break;
	
	case '46':
	$kieusim="Từ 1 Triệu >> 2 Triệu";
	$conds="(giaxuat >= 1000000) AND (giaxuat <= 2000000)";
	break;
	
	case '47':
	$kieusim="Từ 2 Triệu >> 5 Triệu";
	$conds="(giaxuat >= 2000000) AND (giaxuat <= 5000000)";
	break;
	
	case '48':
	$kieusim="Từ 5 Triệu >> 10 Triệu";
	$conds="(giaxuat >= 5000000) AND (giaxuat <= 10000000)";
	break;
	
	case '49':
	$kieusim="Từ 10 Triệu >> 20 Triệu";
	$conds="(giaxuat >= 10000000) AND (giaxuat <= 20000000)";
	break;
	
	case '50':
	$kieusim="Từ 20 Triệu >> 50 Triệu";
	$conds="(giaxuat >= 20000000) AND (giaxuat <= 50000000)";
	break;
	
	case '51':
	$kieusim="Từ 50 Triệu trở lên";
	$conds="(giaxuat >= 50000000)";
	break;
	
	case '57':
	$conds = "";
	break;
	
	case '58':
	$kieusim = " tu 50 triệu >> 100 triệu";
	$conds = "(giaxuar >=50000000) AND (giaxuat <= 100000000)";
	break;
	
	case '59':
	$kieusim = "Dưới 1 triệu ";
	$conds = "(giaxuat <= 1 triệu)";
	break;
	
	//protnc@gmail.com
	//danh muc sim re 
	case '52':
	$kieusim="Số Đẹp Giá Rẻ Viettel";
	$conds="(giaxuat <= 300000)AND (left(sosim,3)='097'OR left(sosim,3)='098' OR left(sosim,4)='0165' OR left(sosim,4)='0166' OR left(sosim,4)='0167' OR left(sosim,4)='0168' OR left(sosim,4)='0169')";
	break;
	case '53':
	$kieusim="Số Đẹp Giá Rẻ Mobile";
	$conds="(giaxuat <= 300000)AND (left(sosim,3)='090'OR left(sosim,3)='093' OR left(sosim,4)='0120' OR left(sosim,4)='0121' OR left(sosim,4)='0122' OR left(sosim,4)='0126' OR left(sosim,4)='0128')";
	break;
	case '54':
	$kieusim="Số Đẹp Giá Rẻ Vinaphone";
	$conds="(giaxuat <= 300000)AND (left(sosim,3)='091'OR left(sosim,3)='094' OR left(sosim,4)='0123' OR left(sosim,4)='0125' OR left(sosim,4)='0127')";
	break;
	case '55':
	$kieusim="Số Đẹp Giá Rẻ VietnamMobile";
	$conds="(giaxuat <= 300000)AND (left(sosim,3)='092' OR left(sosim,4)='0188')";
	break;
	case '13':
	$conds="(right(sosim, 2)=left(right(sosim,4),2) AND left(right(sosim,2),1)=left(right(sosim,3),1))";
	$kieusim="Số Tứ Quý - Ngũ Quý";
	$order="ORDER by right(sosim,4) DESC, left(right(sosim,9),4) DESC";
	$loai = "Tứ Quý - Ngũ Quý";
	break;
	/*case '27':
	$conds="(right(sosim,1)=left(right(sosim,2),1) AND (right(sosim, 2)=left(right(sosim,4),2) || right(sosim, 2)=left(right(sosim,6),2))";
	$kieusim="Số Tứ Quý - Ngũ Quý";
	$order="ORDER by right(sosim,4) DESC, left(right(sosim,9),4) DESC";
	break;*/
	case '14':
	$conds="(right(sosim,1)=left(right(sosim,2),1) AND left(right(sosim,2),1)=left(right(sosim,3),1) AND left(right(sosim,3),1)!=left(right(sosim,4),1))";
	$kieusim="Số Tam Hoa - Tam Quý";
	$order="ORDER by right(sosim,3) DESC, left(right(sosim,9),4) ASC";
	$loai = "Tam Hoa - Tam Quý";
	break;
	case '15':
	$conds="(right(sosim,2) IN(68,86) || right(sosim,3) IN(688,866))";
	$order="ORDER by giaxuat DESC, left(right(sosim,9),4) ASC";
	$kieusim="Số Lộc Phát - Phát Lộc";
	$loai = "Lộc Phát - Phát Lộc";
	break;
	case '19':
	$conds="((right(sosim,2)=left(right(sosim,4),2) AND left(right(sosim,4),2) =left(right(sosim,6),2) AND right(sosim,1)!=left(right(sosim,2),1)) OR (right(sosim,3)=left(right(sosim,6),3) AND right(sosim,1)!=left(right(sosim,2),1)))";
	$kieusim="Số Taxi";
	$order="ORDER by giaxuat DESC, left(right(sosim,9),4) ASC";
	$loai = "Taxi";
	break;
	case '20':
	$conds="(right(sosim,1)=(left(right(sosim,2),1)+1) AND left(right(sosim,3),1) = (left(right(sosim,2),1)-1))";
	$kieusim="Số Tiến";
	$order="ORDER by giaxuat DESC, left(right(sosim,9),4) ASC";
	$loai = "Số Tiến";
	break;
	case '26':
	$conds="( (right(sosim,1)=left(right(sosim,2),1) && left(right(sosim,3),1)=left(right(sosim,4),1)) && (right(sosim,2)!=left(right(sosim,3),2)))";
	$kieusim="Số Kép 2 - Kép 3";
	$order="ORDER by giaxuat DESC, left(right(sosim,9),4) ASC";
	$loai = "Kép 2 - Kép 3";
	break;
	case '16':
	$conds="(right(sosim,4) > '1959' AND right(sosim,4) < '2010')";
	$kieusim="Số Năm Sinh - Kỷ Niệm";
	$order="ORDER by right(sosim,4) DESC, left(right(sosim,9),4) ASC";
	$loai = "Năm Sinh - Kỷ Niệm";
	break;
	case '21':
	$conds="(right(sosim,1) = left(right(sosim,4),1) AND left(right(sosim,3),1) = left(right(sosim,2),1)) AND right(sosim,1) != left(right(sosim,2),1)";
	$kieusim="Số Gánh - Số Đảo";
	$order="ORDER by giaxuat DESC, left(right(sosim,9),4) ASC";
	$loai = "Số Gánh - Số Đảo";
	break;
	case '17':
	$conds="(right(sosim,4)='7997' || right(sosim,2) IN (39,79,38,78) || right(sosim,3) IN (799,399))";
	$kieusim="Số Thần Tài - Ông Địa";
	$order="ORDER by giaxuat DESC, right(sosim,2) DESC";
	$loai = "Thần Tài - Ông Địa";
	break;

	default:
		$conds = "category IN ('".$listCateId."') AND view=1";
		$loai = NULL;
		break;
}

	
	$others = "ORDER BY giaxuat DESC";
	$sql->set_query("product", "DISTINCT sosim", $conds, $others);
	$searchResult = $tRows = $sql->nRows;	
	if(!$curPg) 
	{
		$curPg = 1;
	}
	else
	{
		$numPgs = ceil($tRows/$maxRows);
		if($curPg > $numPgs) $curPg = $numPgs;
	}
	$curRow = ($curPg - 1) * $maxRows + 1;
	if($tRows > 0)
	{
		$contentDetail = '<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
							<tr>
								<td height="3" colspan=8></td>
							</tr>
							<tr height="26">
								<td width="25" style="font-family:tahoma; font-size:11px;color:white;font-weight:bold; text-align:center;background-color:#2D427B">STT</td>
								<td width="70" style="font-family:tahoma; font-size:11px;color:white;font-weight:bold; text-align:center;background:url('.$_IMG_DIR.'/frame_bg.gif)">'.$define["var_sosim"].'</td>
								<td width="70" style="font-family:tahoma; font-size:11px;color:white; font-weight:bold;text-align:center;background:url('.$_IMG_DIR.'/frame_bg.gif)">'.$define["var_gia"].'</td>
								<td width="70" style="font-family:tahoma; font-size:11px;color:white;font-weight:bold;text-align:center;background:url('.$_IMG_DIR.'/frame_bg.gif)">'.$define["var_taikhoan"].'</td>
								<td width="70" style="font-family:tahoma; font-size:11px;color:white;font-weight:bold; text-align:center;background-color:#2D427B">Loại </td>
								<td width="30" style="font-family:tahoma; font-size:11px;color:white;font-weight:bold;text-align:center;background:url('.$_IMG_DIR.'/frame_bg.gif)">Đặt mua</td>
							</tr>';
		
		$low = $curRow; 
		$curRow = 1;
		while (($sql->set_farray()) && ($curRow<=$tRows) && ($curRow<=$curPg*$maxRows))
		{
			$curRow++;			                           
			if($curRow > $low)
			{
				$productName = $sql->farray["sosim"];
				$productId = $opt->optionvalue("product", "id", "sosim='".$productName."'");
				$productName = str_replace("`","",$productName);
				$productName1 = str_replace(".","",$productName);
				$productName2 = str_replace(" ","",$productName1);
				$price = geld($opt->optionvalue("product", "giaxuat", "id='".$productId ."'"));
				
				
					if(substr($productName,-4) > '1959' && substr($productName,-4) < '2011')
						{
						$loai = " Năm Sinh - Kỷ Niệm";
						}
					else if(substr($productName,-1)==substr($productName,-2,1) && substr($productName,-2,1) == substr($productName,-3,1) && substr($productName,-3,1) != substr($productName,-4,1))
					{
						$loai = "Tam Hoa - Tam Quý";
					}
					else if(substr($productName,-2)== '68' || substr($productName,-2)== '86' || substr($productName,-3)== '688'|| substr($productName,-2)== '886')
					{
						$loai = "Lộc Phát";
					}
					else if( (substr($productName,-2) == substr($productName,-4,2) && substr($productName,-4,2) == substr($productName,-6,2) && substr($productName,-1) != substr($productName,-2,1)) || ( substr($productName,-3) == substr($productName,-6,3) && substr($productName,-1) != substr($productName,-2,1)))
					{
						$loai = "Taxi";
					}
					else if(substr($productName,-1) == substr($productName,-2,1) && substr($productName,-3,1) == substr($productName,-4,1) && substr($productName,-2)!= substr($productName,-3,2))
					{
						$loai = "Số Kép 2 - Kép 3";
					}
					
					
					else if(substr($productName,-1) == substr($productName,-4,1) && substr($productName,-3,1) == substr($productName,-2,1) && substr($productName,-1) != substr($productName,-2,1))
					{
						$loai = "Gánh Đảo";
					}
					else if(substr($productName,-4) == '7997' || (substr($productName,-2) == '39' || substr($productName,-2) == '79' || substr($productName,-2) == '38' || substr($productName,-2) == '78' ) || substr($productName,-3) == '799' ||substr($productName,-3) == '399')
						{
						$loai = "Thần Tài";
						}
					else if(substr($productName,-2) == substr($productName,-4,2)  &&  substr($productName,-2,1)== substr($productName,-3,1) )
						{
						$loai = "Tứ Quý - Ngũ Quý";
						}
					else if(substr($productName,-1) == (substr($productName,-2,1)+1) && substr($productName,-3,1) == (substr($productName,-2,1)-1) )
						{
						$loai = "Số Tiến";
						}
					else {
						$loai = "Sim dễ nhớ";
					}
				
				
					
				//logo	
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
					$contentDetail .= "
									<tr height=\"24\">
										<td width=\"25\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:13px;color:#000000; text-align:center;font-weight:bold\">".$count."</td>
										<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:15px;color:#000000; text-align:center;font-weight:bold;letter-spacing:1px\"><a href=\"".$Linkto."\" style=\"color:red \" >".$productName."</a></td>
										<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:14px;color:#000000; text-align:center;\">".$price." (vn&#273;)</td>
										<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:11px;color:#000000; text-align:center;\">".$taihkoan."</td>
										<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:11px;color:#000000;text-align:center;\">".$loai."</td>
										<td width=\"30\" style=\"border-right:0px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:11px;color:#000000; text-align:center;font-weight:bold\" class=\"datmua\"><a href=\"".$Linkto."\"><img src=\" ".$_IMG_DIR.'/cart_icon.png'."\"> </a></td>
									</tr>";		
					if($count % $nCols == 0)
					{
						$contentDetail .= '</tr><tr>';
					}
					$count ++;
				
			}
		}
		$contentDetail .= '</tr></table>';
	}
	else
	{
	$contentDetail .= noResultPage();
	}
	$contentDetail2=$contentDetail;
	require_once("$_HTML_DIR/center_product_list.php");
}
?>
