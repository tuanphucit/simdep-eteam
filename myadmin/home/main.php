<div>
  <form name="searchSim"  action="<?$_URL_BASE?>/myadmin/index.php?module=home" method="post">
	  	<input type=  "text" name = "search_sim" >
		<input type = "submit" value = "Search">
	</form>
</div>
<?php
	$search_sim = $_POST['search_sim'];
	$search_sim = str_replace("*", "%", $search_sim);
	if(count(explode("%",$search_sim)==1))
		$search_sim = "%".$search_sim."%";
	$cond = "SELECT *,REPLACE( sosim,'.','' ) FROM `product` WHERE `sosim` LIKE '".$search_sim."'";
	
	if($search_sim != NULL){
		mysql_connect("localhost","root","root");
		mysql_select_db("simsodep");

		$result = mysql_query($cond);
		
		echo $price;
			echo '<table border="1">
			<tr>
			<th>Số Sim</th>
			<th>Kho</th>

			</tr>';
			
		while($result1= mysql_fetch_array($result)){
			//echo $result1["sosim"]; 
			//echo $result1["kho"];echo "<br>";
			echo "<tr>
			<td>".$result1["sosim"]."</td>
			<td>".$result1["kho"]."</td>

			</tr>";
		}

			echo '</table>';
			$search_sim = NULL;
		}
		
		$searchKeyword = $_POST['search_sim'];

$nCols = 4;

$count = 1;

$colWidth = round(100/$nCols);

$maxRows = 50;

$searchKeyword = $_POST['search_sim'];
$searchKeyword1 = "`".$searchKeyword;

$checked = array(0 => NULL, 1 => "checked");

$maxImgW = 127;

$maxImgH = 165;


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
	
	//echo $conds;
	$others = "ORDER BY giaxuat DESC";

	$table = "
		(
		SELECT * , REPLACE( REPLACE( sosim,  '.',  '' ) ,  ' ',  '' ) AS sosim_dauchamcach
		FROM product
		WHERE 1
		) AS A
	";
	
	$sql->set_query($table, "DISTINCT A.sosim", $conds, $others);

	

	$searchResult = $tRows = $sql->nRows;
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
								<td width="70" style="font-family:tahoma; font-size:11px;color:white;font-weight:bold; text-align:center;background-color:#2D427B">Loai</td>
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

				
		$productName = preg_replace($strArrTobeRep,$strArrRep,$productName);
		//$productName = str_replace("$searchKeyword", "<span style=\"color:#fe0002;text-decoration:underline\">$searchKeyword</span>",$productName);

					$contentDetail .= "

										<tr height=\"24\">
										<td width=\"25\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:13px;color:#000000; text-align:center;font-weight:bold\">".$count."</td>
										<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:11px;color:#000000; text-align:center;font-weight:bold\"><a href=\"".$Linkto."\">".$productName."</a></td>
										<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:arial; font-size:13px;color:#000000; text-align:center;\">".$price." (vn&#273;)</td>
										<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:11px;color:#000000;text-align:center;\">".$taihkoan."</td>
										<td width=\"70\" style=\"border-right:1px solid #c4c4c4;border-bottom:1px solid #c4c4c4;font-family:tahoma; font-size:11px;color:#000000;text-align:center;\">".$loai."</td>
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
?>
<table width="90%" cellpadding="0" cellspacing="0" align="center">
	<tr height="50"><td class="modulehead">Ch&#224;o m&#7915;ng qu&#7843;n tr&#7883; vi&#234;n <strong><?=$usrname?></strong>!</td></tr>
	<tr>
		<td width="100%">					
			<div id="MAIN" class="maindiv" style="width: 200px; height: 200px; position:relative; border:0px">
			<table cellspacing="0" cellpadding="0" width="100%">
				<tr height="30">
					<td class="rowinfo">
						<div>
							C&#7843;m &#417;n b&#7841;n &#273;&#227; tham gia c&#244;ng vi&#7879;c qu&#7843;n tr&#7883; site!
							V&#7899;i acount n&#224;y b&#7841;n c&#243; c&#225;c quy&#7873;n sau:
						</div>
						<ul>
							<li>Xem t&#7845;t c&#7843; c&#225;c th&#244;ng tin.</li>
							<? if($usrper["canAdd"]==YES){?><li>Th&#234;m c&#225;c th&#244;ng tin cho site.</li><? }?>
							<? if($usrper["canEdit"]==YES){?><li>Ch&#7881;nh s&#7917;a l&#7841;i c&#225;c th&#244;ng tin &#273;&#227; &#273;&#432;a.</li><? }?>
							<? if($usrper["canDel"]==YES){?><li>Xo&#225; c&#225;c th&#244;ng tin &#273;&#227; &#273;&#432;a.</li><? }?>
							<? if($usrper["canUser"]==YES){?><li>Qu&#7843;n l&#253; th&#244;ng tin c&#7911;a c&#225;c th&#224;nh vi&#234;n kh&#225;c trong ban qu&#7843;n tr&#7883;.</li><? }?>
						</ul>
					</td>
				</tr>
				<tr>
					<td>
						<table cellpadding="5" cellspacing="1" width="100%" bgcolor="#FFFFFF">
							<tr><td style="background-color:#D8D8EB; font-weight:bold" colspan="2">M&#7897;t s&#7889; th&#244;ng tin quan tr&#7885;ng</td></tr>
							<tr bgcolor="#E6E6F2" nowrap>
								<td>&#272;ang l&#224;m vi&#7879;c v&#7899;i ng&#244;n ng&#7919;:</td>
								<td width="60%"><? if($sql->dbcon) echo $myOpt->optionvalue("vot_language","language_name","language_id='".$LANG."'")?></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</div>
		</td>
	</tr>
</table>
