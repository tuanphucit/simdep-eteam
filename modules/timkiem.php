<?

if(!$_PAGE_VALID)

{

	exit();

}

$nCols = 4;

$count = 1;

$colWidth = round(100/$nCols);

$maxRows = 75;

$searchKeyword1 = "`".$searchKeyword;

$checked = array(0 => NULL, 1 => "checked");

$maxImgW = 127;

$maxImgH = 165;

$sim_length = $_POST['simLength'];

$price = $_GET['price'];

$mang = $_POST['mang'];

$gia = $_POST['gia'];



$listCateId = $cateId;

$listParCate = $cateId;



	$subPageTitle = $define["var_ketquatimkiem"];

	$conds = "view=1";

	/*luckymancvp
	 * 
	 */
	if($searchKeyword != $define["var_nhaptukhoa"])

		{
			$searchKeyword = str_replace(".", "", $searchKeyword);
			$searchKeyword = str_replace(" ", "", $searchKeyword);
			if($chuoi == "chuoicuoi")

				{
				
				$conds .= " AND (sosim_dauchamcach LIKE '%".$searchKeyword."')";

				}

			else if($chuoi == "chuoidau")

				{

				$conds .= " AND (sosim_dauchamcach LIKE '".$searchKeyword."%' || sosim_dauchamcach LIKE '".$searchKeyword1."%')";

				}

			else

				{
					/*Luckymancvp
					 * 
					 */
					
				$searchKeyword = str_replace("*", "%", $searchKeyword);
				if ( count(explode("%",$searchKeyword)) == 1)
					$searchKeyword = "%".$searchKeyword."%";
				$conds .= " AND (sosim_dauchamcach LIKE \"$searchKeyword\")";
				/*echo "
					<script>
						alert('$conds');
					</script>
				";*/
				
				}	

		}
	
	
	if($gia != NULL){
		if($gia =="<500")
				{
				$conds .= " AND (giaxuat <= 500000)";
				}
		if($gia =="500->1000")
				{
				$conds .= " AND (giaxuat >= 500000) AND (giaxuat <= 1000000)";
	
			}
		if($gia =="1->2")
				{
				$conds .= " AND (giaxuat >= 1000000) AND (giaxuat <= 2000000)";
				}
		if($gia =="2->5")
				{
				$conds .= " AND (giaxuat >= 2000000) AND (giaxuat <= 5000000)";
				}
		if($gia =="5->10")
				{
				$conds .= " AND (giaxuat >= 5000000) AND (giaxuat <= 10000000)";
				}
		if($gia =="10->20")
				{
				$conds .= " AND (giaxuat >= 10000000) AND (giaxuat <= 20000000)";
				}
		if($gia =="20->50")
				{
				$conds .= " AND (giaxuat >= 20000000) AND (giaxuat <= 50000000)";
				}
		if($gia =="50->100")
				{
				$conds .= " AND (giaxuat >= 50000000) AND (giaxuat <= 100000000)";
				}

		if($gia ==">100")
				{
				$conds .= " AND (giaxuat >= 100000000)";
				}


}
	if($mang != NULL){
		if($mang == "viettel"){
			$conds  .=" AND ((left(sosim,3)='097'OR left(sosim,3)='098' OR left(sosim,4)='0165' OR left(sosim,4)='0166' OR left(sosim,4)='0167' OR left(sosim,4)='0168' OR left(sosim,4)='0169'))";

		}
		if($mang == "mobi"){
			$conds  .=" AND ((left(sosim,3)='090'OR left(sosim,3)='093' OR left(sosim,4)='0120' OR left(sosim,4)='0121' OR left(sosim,4)='0122' OR left(sosim,4)='0126' OR left(sosim,4)='0128'))";

		}
		if($mang == "vina"){
			$conds  .=" AND ((left(sosim,3)='091'OR left(sosim,3)='094' OR left(sosim,4)='0123' OR left(sosim,4)='0125' OR left(sosim,4)='0127'))";

		}
		if($mang == "vietnammobile"){
		$conds  .=" AND ((left(sosim,3)='092' OR left(sosim,4)='0188'))";

	}
	}
	if($sim_length != NULL){
		if($sim_length == 1){
			$conds .= " AND (left(sosim,2)='09')";

		}	
	
		else if($sim_lengh == 2){
			$conds .= " AND (left(sosim,2)='01')";
		}
		
		}
	//if($price == 1){
	//	$conds .= " AND (giaxuat >= 100000) AND (giaxuat <= 500000)";
	//}

	if($chonmang != NULL)

		{

			

			$conds .= " AND category IN ('".$chonmang."')";

		}

	if($price != NULL)

		{

			if($price=="100.000->500.000")

				{

				

				$conds .= " AND (giaxuat >= 100000) AND (giaxuat <= 500000)";

				}

			else if($price=="500.000->1000.000")

				{

				$conds .= " AND (giaxuat >= 500000) AND (giaxuat <= 1000000)";

				}

			else if($price == "1000.000->5000.000")

				{

				$conds .= " AND (giaxuat >= 1000000) AND (giaxuat <= 5000000)";

				}	

			else if($price == "5000.0000->10.000.000")

				{

				$conds .= " AND (giaxuat >= 5000000) AND (giaxuat <= 10000000)";

				}	

			else 

				{

				$conds .= " AND (giaxuat >= 10000000)"; 

				}	

		}

	//echo $conds;

	$others = "ORDER BY id DESC";

	$table = "
		(
		SELECT * , REPLACE( REPLACE( sosim,  '.',  '' ) ,  ' ',  '' ) AS sosim_dauchamcach
		FROM product
		WHERE 1
		) AS A
	";
	
	$sql->set_query($table, "DISTINCT A.sosim", $conds, $others);

	

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
								<td width="30" style="font-family:tahoma; font-size:11px;color:white;font-weight:bold;text-align:center;background:url('.$_IMG_DIR.'/frame_bg.gif)">Đặt mua</td>
							</tr>';

		

		$low = $curRow; 

		$curRow = 1;
		
		/*Luckymancvp
		 * 
		 */
		$strArr = explode("%",$searchKeyword);
		$strArrRep     = array();
		$strArrTobeRep = array();
		for ($i = 0; $i< count($strArr); $i++)
			if ($strArr[$i] != "") {
				$strArrRep[]      = "<span style=\"color:#fe0002;text-decoration:underline\">$strArr[$i]</span>";
				$strArrTobeRep[]  = '/'.$strArr[$i].'/';
			}
		
		while (($sql->set_farray()) && ($curRow<=$tRows) && ($curRow<=$curPg*$maxRows))

		{

			$curRow++;			                           

			if($curRow > $low)

			{

				$productName = $sql->farray["sosim"];

				$productId = $opt->optionvalue("product", "id", "sosim='".$productName."'");

				$productName_dauchamcach = str_replace(" ", "", str_replace(".", "", $productName));
				
				$productName = $productName_dauchamcach;

				$price = geld($opt->optionvalue("product", "giaxuat", "id='".$productId ."'"));

				//$taihkoan = geld($opt->optionvalue("product", "taikhoan", "id='".$productId ."'"));

				if(strlen($productName_dauchamcach) > 3) 

					{

					$logo = substr($productName_dauchamcach, 0, 3);

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

						if(strlen($productName) > 4) 

						{

						$logo = substr($productName, 0, 4);

						}

							if($logo=='0127' || $logo=='0123' || $logo == '0125' || $logo == '0129' )

								{

								$taihkoan = "<img src=\"".$_IMG_DIR."/vina.gif\" border=0>";

								}

							else if($logo=='0165' || $logo=='0166' || $logo=='0167' || $logo == '0168' || $logo == '0169')

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

				
		$productName = preg_replace($strArrTobeRep,$strArrRep,$productName);
		//$productName = str_replace("$searchKeyword", "<span style=\"color:#fe0002;text-decoration:underline\">$searchKeyword</span>",$productName);

					$contentDetail .= "

										<tr height=\"24\">
										<td width=\"25\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:13px;color:#000000; text-align:center;font-weight:bold\">".$count."</td>
										<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:11px;color:#000000; text-align:center;font-weight:bold\"><a href=\"".$Linkto."\">".$productName."</a></td>
										<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:arial; font-size:13px;color:#000000; text-align:center;\">".$price." (vn&#273;)</td>
										<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:11px;color:#000000;text-align:center;\">".$taihkoan."</td>
										<td width=\"30\" style=\"border-right:0px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:11px;color:#000000; text-align:center;font-weight:bold\" class=\"datmua\"><a href=\"".$Linkto."\"><img src=\" ".$_IMG_DIR.'/cart_icon.png'."\"> </a></td>
									</tr>

											

										
											";		

					if($count % $nCols == 0)

					{

						$contentDetail .= '</tr><tr>';

					}

					$count ++;

				

			}

		}

		$contentDetail .= '</tr></table>';

	}else

			{

				$contentDetail .= '	<table width="100%" height="300" border="0" cellspacing="0" cellpadding="5">

									<tr>

										<td align="center" style="color:#FF6600; font-size:16px; font-weight:bold">'.$define["var_khongtimthayketquatimkiem"].'</td>

									</tr>

								</table>';

			}	

$contentTitle = "".$define["var_timkiem"]." ".$searchKeyword."";

			

require_once("$_HTML_DIR/center_product_list.php");

?>

