<?
if(!$_PAGE_VALID)
{
	exit();
}
$sql = new mysql;
$froms = "product";
$conds="(giaxuat <= 300000)AND (left(sosim,3)='097'OR left(sosim,3)='098' OR left(sosim,4)='0165' OR left(sosim,4)='0166' OR left(sosim,4)='0167' OR left(sosim,4)='0168' OR left(sosim,4)='0169')";
$others = "ORDER BY giaxuat LIMIT 10";
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
			 
				$listsimreViettel .= '	<p>
									<a href="'.$Linksim.'" >'.$productName.'</a>
									<span>'.$price.'</span>
									</p>
								';
							$counttt++;
				}
		?>

				<div class="sim-list" >
				<a class="first">Sim rẻ Viettel</a>
					<?=$listsimreViettel?>
				 <a class="last" href="<?=$_URL_BASE?>/index.php/52/sim-re-Viettel">Xem thêm &raquo;</a>	
				</div>
