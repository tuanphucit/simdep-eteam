<?
if(!$_PAGE_VALID)
{
	exit();
}
$sql = new mysql;
$froms = "product";
$conds="(giaxuat >= 50000000)";
$others = "ORDER BY giaxuat DESC LIMIT 10";
$sql->set_query($froms, "DISTINCT sosim", $conds, $others);
$titemR = $sql->nRows;
$counttt =0;

while($sql->set_farray())
{
			
			$counttt++;
				$productName = $sql->farray["sosim"];
				$productId = $opt->optionvalue("product", "id", "sosim='".$productName."'");
				$productName = str_replace("`","",$productName);
				$productName1 = str_replace(".","",$productName);
				$productName2 = str_replace(" ","",$productName1);
				$price = geld($opt->optionvalue("product", "giaxuat", "id='".$productId ."'"));

				  if($counttt == 0)
				    {
						$listVarNames .= "ctl00_C1_rr_frame".$counttt;
					}
					else
					{
						$listVarNames .= "','ctl00_C1_rr_frame".$counttt;
					}
				$Linksim = "$_URL_BASE/index.php/order/$productId/sim-so-dep-$productName.html";
			 
				$listsimvip .= '	<p>
									<a href="'.$Linksim.'" >'.$productName.'</a>
									<span>'.$price.'</span>
									</p>
								';
							$counttt++;
				}
		?>

				<div id="middle-right3" >
				<a class="first">Sim đẹp đặc biệt</a>
					<?=$listsimvip?>
				 <a class="last" href="<?=$_URL_BASE?>/index.php/51/sim-dep-dac-biet">Xem thêm &raquo;</a>	
				</div>
