<div id="middle-right3"><!-- pháº§n tin tá»©c -->
                    <p class="title">Tin khuyáº¿n máº¡i</p>
<?
if(!$_PAGE_VALID)
{
	exit();
}
$sql = new mysql;
$froms = "vot_news";
$conds = "language_id='".$lang."' AND news_view=1";
$others = "ORDER BY news_date DESC,news_visited DESC LIMIT 5";
$sql->set_query($froms, "*", $conds, $others);
$count =0;
while($sql->set_farray())
{
	$count ++;
	
	$infoId = $sql->farray["news_id"];
	$modId = $sql->farray["modules_id"];
	$infoName = $sql->farray["news_name"];
	$infoVisited = $sql->farray["news_visited"];
	$detail = $sql->farray["news_detail"];
	$posImg = strpos($detail,"img");
	if($posImg == false){$str="$_IMG_DIR./noimage.jpg";}
	else{
	$pos5 = $posImg+500;
	$str3 = substr($detail,$posImg,$pos5);
	$pos = strpos($str3,"src");
	
	$str2 = substr($str3,$pos,300);
	$pos1 = strpos($str2,'"');
	$pos2 = strpos($str2,'"',5);
	$pos3 = $pos2-5;
	$pos4 = $pos1 + 1;
	$str = substr($str2,$pos4,$pos3);
	}
	$linkto = "$_URL_BASE/index.php/$modId/$infoId/".str_replace(" ", "_", $sql->farray["news_name"]);
	//$listnew .= "<div class=\"newnews\"><a  href=\"$linkto\">* $infoName</a></div>";
	//$listnew .= "	<div><img src=\"$_IMG_DIR/line_newnews.jpg\" border=\"0\" style=\"margin:3px 0px 7px 0px\"></div>";
	if($count < 5)
	{
?>	<div class="news-box">
                       
                       
                      <img src="<?php echo $str?>" style="height: 90%;width: 70%;border-image: 3px solid black ;" alt="Link error"/>  <a href="<?php echo $linkto?>">*<?php echo $infoName ?></a>
                     
    
    </div>   
	
<?php
	}
}
 ?>	

  </div>