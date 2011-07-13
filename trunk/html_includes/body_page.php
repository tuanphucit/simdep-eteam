
  <body>
        <div id="header">
            <div id="banner"><!-- Phần này đang để background -->

            </div><!-- End #banner -->
            <div id="menu">
                <ul>
                     <li><a href="<?=$_URL_BASE?>/index.php">Trang chủ</a></li>
                    <li><a href="<?=$_URL_BASE?>/index.php/8/Vinaphone">Vinaphone</a></li>
                    <li><a href="<?=$_URL_BASE?>/index.php/9/Mobifone">Mobiphone</a></li>
                    <li><a href="<?=$_URL_BASE?>/index.php/7/Viettel">Viettel</a></li>
                    <li><a href="<?=$_URL_BASE?>/index.php/index.php/41/Vietnamobile">Vietnamobile</a></li>
                    <li><a href="<?=$_URL_BASE?>/index.php/3/tin-tuc">Tin Tức</a></li>
                    <li><a href="<?=$_URL_BASE?>/index.php/2/huong-dan-mua-sim">Hướng dẫn mua sim</a></li>
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
		<div>
				<select name="linkExchange" onChange="window.location.href='<?=$_URL_BASE?>/index.php/timnhanh/'+this.value;" style="padding-top:3px;height:22px;color:#000000;width:90px;padding-left:4px; font-size:11px;font-family:tahoma">
							<option value="">Vinaphone</option>
							<option value="0949">Đầu 0949</option>
							<option value="0948">Đầu 0948</option>
							<option value="0947">Đầu 0947</option>
							<option value="0946">Đầu 0946</option>
							<option value="0945">Đầu 0945</option>
							<option value="0944">Đầu 0944</option>
							<option value="0943">Đầu 0943</option>
							<option value="0942">Đầu 0942</option>
							<option value="0919">Đầu 0919</option>
							<option value="0918">Đầu 0918</option>
							<option value="0917">Đầu 0917</option>
							<option value="0916">Đầu 0916</option>
							<option value="0915">Đầu 0915</option>
							<option value="0914">Đầu 0914</option>
							<option value="0913">Đầu 0913</option>
							<option value="0912">Đầu 0912</option>
							<option value="0129">Đầu 0129</option>
							<option value="0127">Đầu 0127</option>
							<option value="0125">Đầu 0125</option>
							<option value="0123">Đầu 0123</option>
						</select>
						<select name="linkExchange" onChange="window.location.href='<?=$_URL_BASE?>/index.php/timnhanh/'+this.value;" style="padding-top:3px;height:22px;color:#000000;width:90px;padding-left:4px; font-size:11px;font-family:tahoma">
							<option value="">Mobifone</option>
							<option value="0939">Đầu 0939</option>
							<option value="0938">Đầu 0938</option>
							<option value="0937">Đầu 0937</option>
							<option value="0936">Đầu 0936</option>
							<option value="0935">Đầu 0935</option>
							<option value="0934">Đầu 0934</option>
							<option value="0933">Đầu 0933</option>
							<option value="0932">Đầu 0932</option>
							<option value="0909">Đầu 0909</option>
							<option value="0908">Đầu 0908</option>
							<option value="0907">Đầu 0907</option>
							<option value="0906">Đầu 0906</option>
							<option value="0905">Đầu 0905</option>
							<option value="0904">Đầu 0904</option>
							<option value="0903">Đầu 0903</option>
							<option value="0902">Đầu 0902</option>
							<option value="0128">Đầu 0128</option>
							<option value="0126">Đầu 0126</option>
							<option value="0122">Đầu 0122</option>
							<option value="0121">Đầu 0121</option>
						</select>
						<select name="linkExchange" onChange="window.location.href='<?=$_URL_BASE?>/index.php/timnhanh/'+this.value;" style="padding-top:3px;height:22px;color:#000000;width:90px;padding-left:4px; font-size:11px;font-family:tahoma">
							<option value="">Viettel</option>
							<option value="0989">Đầu 0989</option>
							<option value="0988">Đầu 0988</option>
							<option value="0987">Đầu 0987</option>
							<option value="0986">Đầu 0986</option>
							<option value="0985">Đầu 0985</option>
							<option value="0984">Đầu 0984</option>
							<option value="0983">Đầu 0983</option>
							<option value="0982">Đầu 0982</option>
							<option value="0979">Đầu 0979</option>
							<option value="0978">Đầu 0978</option>
							<option value="0977">Đầu 0977</option>
							<option value="0976">Đầu 0976</option>
							<option value="0975">Đầu 0975</option>
							<option value="0974">Đầu 0974</option>
							<option value="0973">Đầu 0973</option>
							<option value="0972">Đầu 0972</option>
							<option value="0169">Đầu 0169</option>
							<option value="0168">Đầu 0168</option>
							<option value="0167">Đầu 0167</option>
							<option value="0166">Đầu 0166</option>
							<option value="0165">Đầu 0165</option>
						</select>
						<select name="linkExchange" onChange="window.location.href='<?=$_URL_BASE?>/index.php/timnhanh/'+this.value;" style="padding-top:3px;height:22px;color:#000000;width:100px;padding-left:4px; font-size:11px;font-family:tahoma">
							<option value="">Vietnammobile</option>
							<option value="0929">Đầu 0929</option>
							<option value="0928">Đầu 0928</option>
							<option value="0927">Đầu 0927</option>
							<option value="0926">Đầu 0926</option>
							<option value="0925">Đầu 0925</option>
							<option value="0924">Đầu 0924</option>
							<option value="0923">Đầu 0923</option>
							<option value="0922">Đầu 0922</option>
							<option value="0921">Đầu 0921</option>
							<option value="0920">Đầu 0920</option>
							<option value="0188">Đầu 0188</option>
						</select>
						</div>             
			 </div><!-- End #top1-left -->
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

                <div class="top2-box top2-box4">
                    <p> Hỗ Trợ trực tuyến</p>
					
					<a class="top2-box4-title" href="ymsgr:sendim?toanvuviet"> Mr.Toan
					<img src="http://opi.yahoo.com/online?u=toanvuviet&m=g&t=2" border="0"/>
					</a>
					
					<a class="top2-box4-title" href="ymsgr:sendim?loc8meng2"> Mr.Loc <br>
					<img src="http://opi.yahoo.com/online?u=loc8meng2&m=g&t=2" border="0"/>
					</a>
					<a class="top2-box4-title" href="ymsgr:sendim?svcoi"> Mr.Chung <br>
					<img src="http://opi.yahoo.com/online?u=svcoi&m=g&t=2" border="0"/>
					</a>
					
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
            <div id="footer-info"><!-- Phần cuối cùng của trang chứa tên trang web, bản quyền, thông tin địa chỉ ... -->
                <div>
                    <a class="no1" href="#">Trang chủ</a>
                    <a class="no2">www.simsodep.com - Đẹp từ A đến Z</a>
                    <a class="no3" href="#">Lên đầu trang &uArr;</a>
                </div>
                <p>Sim số đẹp từ A đến Z</p>
                <p>Phát triển bới eTeam.vn</p>
                <p>Địa chỉ : abc Hà Nội. Điện thoại : 0123456789</p>
            </div><!-- End #footer-info -->
        </div><!-- End #footer -->
    </body>
