<?php 
	$conds = "language_id = $lang AND html_id = 'pagebanner'";
	$pageBanner = $opt->optionvalue("vot_html","html_detail",$conds);
	$conds = "language_id = $lang AND html_id = 'footer'";
	$pageBottom = $opt->optionvalue("vot_html","html_detail",$conds);
?>
  <body>
        <div id="header">
            <div id="banner"><!-- Phần này đang để background -->
				<?=$pageBanner?>
            </div><!-- End #banner -->
            <div id="menu">
                <ul>
                     <li><a href="<?=$_URL_BASE?>/index.php">Trang chủ</a></li>
                    <li><a href="<?=$_URL_BASE?>/index.php/8/Vinaphone">Vinaphone</a></li>
                    <li><a href="<?=$_URL_BASE?>/index.php/9/Mobifone">Mobiphone</a></li>
                    <li><a href="<?=$_URL_BASE?>/index.php/7/Viettel">Viettel</a></li>
                    <li><a href="<?=$_URL_BASE?>/index.php/41/Vietnamobile">Vietnamobile</a></li>
                    <li><a href="<?=$_URL_BASE?>/index.php/3/tin-tuc">Tin Tức</a></li>
                    <li><a href="<?=$_URL_BASE?>/index.php/2/huong-dan-mua-sim">Hướng dẫn mua sim</a></li>
                    <li><a href = "<?=$_URL_BASE?>/index.php/25/phong-thuy"> Phong thủy</a></li>
					<li><a href = "<?=$_URL_BASE?>/index.php/contact"> Liên hệ</a></li>
				
					
                </ul>
            </div><!-- End #menu -->
            
			
			<div id="top1"><!-- phần này chứa ô tìm kiếm và slideshow ảnh -->
                <div id="top1-left">
                    <form name="searchFrom" onSubmit="return doSubmitsearchForm()" action="<?=$_URL_BASE?>/index.php/timkiem" method="post">
                        <div>
			<input type="text" id="searchKeyword" name="searchKeyword" value="<?=$define["var_nhaptukhoa"]?>"onblur="if(this.value=='')this.value='<?=$define["var_nhaptukhoa"]?>';"onfocus="if(this.value=='<?=$define["var_nhaptukhoa"]?>')this.value='';">
						 <input type="radio" name="simLength" value = "1"/>
                            <label>10 số</label>
                            <input type="radio" name="simLength" value = "2" />
                            <label>11 số</label>
                            <input type="radio" name="simLength" value ="" checked  />
                            <label>Tất cả </label>
							</div>
							<div>
						<select name="mang">
								<option value= ""> Chọn mạng...</option>
								<option value="viettel"> Viettel</option>
								<option value="mobi"> Mobiphone</option>
								<option value="vina"> Vinaphone</option>
								<option value="vietnammobile"> Vietnammobile</option>
							</select>
						<select name="gia">
								<option value= ""> Chọn khoảng giá...</option>
								<option value="<500"> Dưới 500 ngàn</option>
								<option value="500->1000"> 500 ngàn -> 1 triệu</option>
								<option value="1->2"> 1 triệu -> 2 triệu</option>
								<option value="2->5"> 2 triệu -> 5 triệu</option>
								<option value="5->10"> 5 triệu -> 10 triệu</option>
								<option value="10->20"> 10 triệu -> 20 triệu</option>
								<option value="20->50"> 20 triệu -> 50 triệu</option>
								<option value="50->100"> 50 triệu -> 100 triệu</option>
								<option value=">100"> Trên 100 triệu </option>
								
							</select>
						 
                           <input class="search-button" type="submit" name="submit" value="Tìm kiếm" />
                        </div>

                    </form>
                    <p>* Để tìm sim bắt đầu bằng 0935, quý khách nhập vào <a href="#">0935*</a></p>
                    <p>* Để tìm sim có đuôi là 88 và có đầu số 098, nhập vào <a href="#">098*88</a></p>
				</div><!-- End #top1-left-->

                <div id="top1-right">
                    <img name="slideshow1" alt="slideshow" src="<?=$_IMG_DIR?>/slideshow1.gif" />
                    <img name="slideshow2" alt="slideshow" src="<?=$_IMG_DIR?>/slideshow2.gif" />
                    <img name="slideshow3" alt="slideshow" src="<?=$_IMG_DIR?>/slideshow3.jpg" />
                    <img name="slideshow4" alt="slideshow" src="<?=$_IMG_DIR?>/slideshow4.gif" />
                    <img name="slideshow5" alt="slideshow" src="<?=$_IMG_DIR?>/slideshow5.jpg" />
                    <div class="number-list">
                        <a name="slideshow1">1</a>
                        <a name="slideshow2">2</a>
                        <a name="slideshow3">3</a>
                        <a name="slideshow4">4</a>
                        <a name="slideshow5">5</a>
                    </div>
                </div><!-- End #top1-right -->
            </div><!-- End #top1 -->
           


		   <div id="top2"><!-- phần này show ra các loại sim và đặt sim theo yêu cầu -->
               <div class="top2-box top2-box1">
                    <p>Tìm nhanh theo loại</p>
                    <a href="<?=$_URL_BASE?>/index.php/13/sim-tu-quy">Sim Tứ Quý</a>
                    <a href="<?=$_URL_BASE?>/index.php/20/sim-so-tien">Sim Số Tiến</a>
                    <a href="<?=$_URL_BASE?>/index.php/17/sim-than-tai">Sim Thần Tài</a>

                    <a href="<?=$_URL_BASE?>/index.php/15/sim-loc-phat">Sim Lộc Phát</a>
                    <a href="<?=$_URL_BASE?>/index.php/26/sim-kep">Sim Số Kép</a>
                    <a href="<?=$_URL_BASE?>/index.php/21/sim-ganh-dao">Sim Gánh Đảo</a>

                    <a href="<?=$_URL_BASE?>/index.php/14/sim-tam-hoa">Sim Tam Hoa</a>
                    <a href="<?=$_URL_BASE?>/index.php/19/sim-taxi">Sim Taxi</a>
                    <a href="<?=$_URL_BASE?>/index.php/16/sim-nam-sinh">Sim năm sinh</a>

                </div>
                <div class="top2-box top2-box2">
                    <p>Tìm nhanh theo giá tiền</p>
					<a href="<?=$_URL_BASE?>/index.php/45/duoi-500-ngan">Dưới 500 ngàn</a>
                    <a href="<?=$_URL_BASE?>/index.php/44/tu-500-1-trieu">500 ngàn -> 1 triệu</a>
                    <a href="<?=$_URL_BASE?>/index.php/46/tu-1-2-trieu">1 triệu -> 2 triệu</a>
                    <a href="<?=$_URL_BASE?>/index.php/47/tu-2-5-trieu">2 triệu -> 5 triệu</a>
                    <a href="<?=$_URL_BASE?>/index.php/48/tu-5-10-trieu">5 triệu -> 10 triệu</a>
                    <a href="<?=$_URL_BASE?>/index.php/49/tu-10-trieu-20-trieu">10 triệu -> 20 triệu</a>
                    <a href="<?=$_URL_BASE?>/index.php/50/tu-20-trieu-50-trieu">20 triệu -> 50 triệu</a>
                    <a href="<?=$_URL_BASE?>/index.php/51/tu-50-trieu-tro-len">Trên 50 triệu</a>

                </div>



				<div class="top2-box top2-box3">
                    <p>Tìm nhanh theo đầu số</p>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0912">Số đẹp 0912</a>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0913">Số đẹp 0913</a>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0914">Số đẹp 0914</a>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0915">Số đẹp 0915</a>

                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0902">Số đẹp 0902</a>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0902">Số đẹp 0903</a>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0904">Số đẹp 0904</a>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0905">Số đẹp 0905</a>
					
					
                </div>
                <div class="top2-box top2-box4">
                    <a class="top2-box4-title">Tìm nhanh </a>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0973">Số đẹp 0973</a>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0974">Số đẹp 0974</a>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0975">Số đẹp 0975</a>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0976">Số đẹp 0976</a>

                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0922">Số đẹp 0922</a>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0928">Số đẹp 0928</a>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0929">Số đẹp 0929</a>
                    <a href="<?=$_URL_BASE?>/index.php/timnhanh/0923">Số đẹp 0923</a>
                </div>
            </div><!-- End #top2 -->
        </div><!-- End #header -->
        <div id="middle">
            <? if(is_file("$contentFile")) require_once("$contentFile");?>
			<div id="middle-right">
                <div id="middle-right1" class="right sim-list"><!-- đây là phần sim đẹp đặc biệt -->
                	
                      <?php include "$_HTML_DIR/simvip.php";?>
                </div><!-- End #middle-right1 -->
                <div id="middle-right2" class="right sim-list"><!-- phần các đơn hàng mới *chỉ có phần này là fix chiều cao để chứa phần thông tin chạy lên -->
                   
                    
                         <?php include "$_HTML_DIR/danhsachkhachhang.php";?>
                    
                </div><!-- End #middle-right2 -->
                <div id="middle-right3"><!-- phần tin tức -->
                    <?php include "$_HTML_DIR/tinmoi.php";?>
                </div><!-- End #middle-right3 -->
            </div><!-- End #middle-right -->
            <div class="clear"></div>
        </div><!-- End #middle -->
        <div id="footer">
            <div id="footer-nav">
                <p class="footer-nav-title">Sim số đẹp &ndash; giá sinh viên</p>
                <?php include "$_HTML_DIR/simreViettel.php";?>
                <?php include "$_HTML_DIR/simreMobi.php";?>
                 <?php include "$_HTML_DIR/simreVina.php";?>
                  <?php include "$_HTML_DIR/simreVmobi.php";?>
                <div class="adv"><!-- Phần này chứa các flash quảng cáo -->
                    <embed height="120" width="210" type="application/x-shockwave-flash" 
                           src="<?=$_IMG_DIR?>/adv.swf" 
                           pluginspage="http://www.macromedia.com/go/getflashplayer" 
                           wmode="transparent" play="true" quality="high" />
                    <embed height="120" width="210" type="application/x-shockwave-flash" 
                           src="<?=$_IMG_DIR?>/adv.swf" 
                           pluginspage="http://www.macromedia.com/go/getflashplayer" 
                           wmode="transparent" play="true" quality="high" />
                    <embed height="120" width="210" type="application/x-shockwave-flash" 
                           src="<?=$_IMG_DIR?>/adv.swf" 
                           pluginspage="http://www.macromedia.com/go/getflashplayer" 
                           wmode="transparent" play="true" quality="high" />
                </div>
            </div><!-- End #footer-nav -->
            <?=$pageBottom?>
        </div><!-- End #footer -->
    </body>
