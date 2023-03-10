<style>
.font_sp{font-family:'Spoqa Han Sans Neo'}
#noticePage {
	height:calc(100vh - env(safe-area-inset-top));
	height:calc(100vh - constant(safe-area-inset-top));
	background: #4d4d4d;
	border-radius:12px;
	overflow:hidden;
	float:left;
	position: relative;
    width: 100%;
	margin-top: env(safe-area-inset-top);
	margin-top: constant(safe-area-inset-top);
}
.talkProfile {
	width:50px;
	height:50px;
	background: url('/app/skin/basic/svg/talkProfileIcon.svg');
	float: left;
	margin: 8px 8px 8px 15px;
}
.triangle-isosceles {
	max-width:80%;
	width:fit-content;
	position:relative;
	padding:15px;
	margin:8px 0 8px;
	color:#000;
	background:#f4f4f4; /* default background for browsers without gradient support */
	border-radius:6px;
	word-break:break-all;
	word-wrap:break-word;
}
.dropzone .dz-preview.dz-image-preview
,.dropzone .dz-progress 
,.dropzone .dz-file-preview{
	display:none;
}
.talk_content_wrap{font-size: 1.3em;}
.talk_button{padding: 10px;border: 1px solid #ebebeb;color: #848484;border-radius: 10px;-webkit-appearance: none;font-size: 14px;}
.talk_input_bg{
	position: fixed;
	bottom: 0;
	background-color: #ffffff;
	width: 100%;
	height: calc(75px + constant(safe-area-inset-bottom));
	height: calc(75px + env(safe-area-inset-bottom));
}
.fc_pink {color:#e61e6e;}
.purposeTextBox{
	width: 40%;
    height: 20px;
    float: left;
    text-align: center;
	padding: 10px 15px 30px 15px;
}
.purposeTextBox:nth-child(odd) {
	border-right: solid 1px #9e9e9e36;
}
.priceRangeImg{
	width: 45px;
	height: 40px;
}
.purposeImg{
	width: 40px;
	height: 40px;
}
.productTypeTextBox{
	width: 40%;
    height: 20px;
    float: left;
    text-align: center;
	padding: 10px 15px 30px 15px;
}
.productTypeImg{
	width: 40px;
	height: 40px;
}
.productTypeTextBox:nth-child(odd) {
	border-right: solid 1px #9e9e9e36;
}
#talk_input_flower_Wrap{
    background-color: #ffffff;
    z-index: 99999;
    position: fixed;
    bottom: -1px;
    width: 100vw;
	padding:0 8px;
	box-shadow: 0px 3px 5px 1px #282828;
}
#talk_input_purposeDiv{
	height: calc(64vh - env(safe-area-inset-top));
	height:calc(64vh - constant(safe-area-inset-top));
}
#talk_input_productTypeDiv{
	height: calc(42vh - env(safe-area-inset-top));
	height:calc(42vh - constant(safe-area-inset-top));
}
#talk_input_priceRangeDiv{
	height: calc(57vh - env(safe-area-inset-top));
	height:calc(57vh - constant(safe-area-inset-top));
}

.flowerPurpose{
	padding: 10px;
	width: 100%;
    border: 1px solid #ebebeb!important;
    color: #848484;
    border-radius: 10px!important;
    -webkit-appearance: none!important;
    font-size: 14px;
	text-align: center;
}
.flowerProductType{
	padding: 10px;
	width: 100%;
    border: 1px solid #ebebeb!important;
    color: #848484;
    border-radius: 10px!important;
    -webkit-appearance: none!important;
    font-size: 14px;
	text-align: center;
}
.priceRangeTextBox{
    padding: 0px 45px;
    
}
.flowerPriceRange{
	padding: 10px;
	width: 95%;
    border: 1px solid #ebebeb!important;
    color: #848484;
    border-radius: 10px!important;
    -webkit-appearance: none!important;
    font-size: 14px;
	text-align: center;
}
.flowerFont{
	font-weight: 900;
    color: #292929;
    font-size: 1.2em;
    line-height: 3em;
}
.flowerPriceFont{
	font-weight: 900;
    color: #292929;
    font-size: 1.2em;
}

::placeholder { font-weight: 900!important;color: #292929!important;opacity:0.3!important; }


</style>
<form name="requestForm" id="requestForm" action="request_proc.php" method="post" enctype="multipart/form-data">
	<input name="purposeInput" type="hidden" class="purposeInput" value="">
	<input name="productTypeInput" type="hidden" class="productTypeInput" value="">
	<input name="priceRangeInput" type="hidden" class="priceRangeInput" value="">
	<div id="calendarForm" style="display:none">
		<?
			$times = mktime();
			//????????????
			$startHour = 10;
			//????????????
			$lastHour = 20;
			//???????????? ?????????
			$gapHour = 4;
			//????????? ???????????????
			$gapDay = 0;
			$todayDate = date("Y-m-d", $times+86400+(3600*$gapHour)); 
			$realHour = date("H", $times);
			$nowHour = $realHour + $gapHour;
			if ($nowHour < $startHour){
				$nowHour = $startHour;
			}
			else if($nowHour  >= $lastHour){
				$nowHour = $startHour;
				$todayDate = date("Y-m-d", $times+86400+(3600*24)); 
				$gapDay = 1;
			}
		?>
		<div style="width:100%;">
			<input type="text" name="receiveDateInput" maxLength="10" style="width:46%;float:left;margin-right:10px;padding: 10px;border: 1px solid #ebebeb;color: #848484;border-radius: 10px;-webkit-appearance: none;font-size: 14px;" class="talk_button receiveDate" placeholder="??????(??? <?=date($todayDate)?>)" value="<?=date($todayDate)?>" readonly/>
			<select name="receiveTimeInput" class="talk_button receiveTime" style="width:46%;float:left;">
				<?for( $i=$startHour ; $i<=20 ; $i++ ){
					$time_str01 = sprintf('%02d',$i) . ':00';
				?>
					<option value="<?=$time_str01?>"  <? if($i == $nowHour){ echo "selected"; } ?>><?=$time_str01?></option>
				<?}?>
			</select>
		</div>
		
	</div>
	<div id="closeForm" style="display:none">
		<?
			//????????????
			$closeStartHour = 7;
			//????????????
			$closeLastHour = 20;
			//????????? ???????????????
			$closeGapDay = 0;
			$todayDate = date("Y-m-d", $times+(3600* $gapDay )); 
			$realHour = date("H", $times);
			$nowHour = $realHour + $closeGapDay ;
			if ($nowHour < $closeStartHour){
				$nowHour = $closeStartHour;
			}
			else if($nowHour  >= $closeLastHour){
				$nowHour = $closeStartHour;
				$todayDate = date("Y-m-d", $times+(3600*24)); 
				$gapDay = 1;
			}
		?>
		<div>
			<input type="text" name="closeDateInput" maxLength="10" style="width:46%;margin-right:10px; float:left;padding: 10px;border: 1px solid #ebebeb;color: #848484;border-radius: 10px;-webkit-appearance: none;font-size: 14px;" class="closeDate" placeholder="??????(??? <?=date($todayDate)?>)" value="<?=date($todayDate)?>" readonly/>
			<select name="closeTimeInput" class="talk_button closeTime" style="width:46%;float:left;">
				<?for( $i=$closeStartHour ; $i<=$closeLastHour ; $i++ ){
					$time_str01 = sprintf('%02d',$i). ':00';
				?>
					<option value="<?=$time_str01?>" ><?=$time_str01?></option>
				<?}?>
			</select>
		</div>
	</div>	
	<div id="receiveTypeForm" style="display:none">
		<table cellpadding="0" cellspacing="0" border="0" class="receive_type_select" style="width:100%">
			<tr>
				<td style="width:50%;text-align: center;" onclick="stepProc(this);" selval="0" >
					<img src="skin/basic/svg/receiveType01.svg" style="height: 30px;margin:5px;vertical-align: middle;">
					<span>??????</span>
				</td>
				<td style="width:50%;text-align: center;" onclick="stepProc(this);" selval="1">
					<img src="skin/basic/svg/receiveType02.svg" style="width:30px;margin:5px;vertical-align: middle;">
					<span>??????</span>
				</td>
			</tr>
		</table>
	</div>
	<div id="addrForm" style="display:none">
		<table cellpadding="0" cellspacing="0" border="0" style="width:97%">
			<tr>
				<td onclick="stepProc(this);" style="text-align: center;">
					<div class="talk_button">????????? ??????</div>
				</td>
			</tr>
		</table>
	</div>
	<div id="prodNumForm" style="display:none">
		<table cellpadding="0" cellspacing="0" border="0" style="width:100%">
			<tr>
				<td colspan="2">
					<div class="order_quantity">
						(<span class="quantityTypeText"></span>)
						<input type="button" value="-" class="qty_button" onClick="quantityControlForm('minus',this);" />
						<input class="qty_input" type="number" name="prodNumInput" size="2" value="1" />
						<input type="button" value="+" class="qty_button" onClick="quantityControlForm('plus',this);" />???
					</div>
				</td>
			</tr>
		</table>
	</div>
	<div id="purposeForm" style="display:none;">
		<table cellpadding="0" cellspacing="10" border="0" style="width:100%;">
		<tr>
			<td style="width:50%" >
				<input onclick="purposeInptClickEvent()" class="flowerPurpose" type="text" readonly placeholder="??? ??????">
			</td>
			<td style="width:50%" >
				<input  onclick="productTypeInptClickEvent()" class="flowerProductType" type="text" readonly placeholder="??? ??????">
				
			</td>
		</tr>
		</table>
	</div>
	<div id="purposeDiv" style="display:none;">
		<table cellpadding="0" cellspacing="10" border="0" style="width:100%;">
			<tr style="width:100%">
				<div class="purposeWrap" style="margin: 10px;">
				<?
					$sql = "SELECT * FROM item_mst WHERE keyText='purpose' ORDER BY sortNum";
					$result1=mysql_query($sql,get_db_conn());
					$i = 1;
					while($row1=mysql_fetch_object($result1)) {
						if($row1->seq < 15){
						?>		
						<div class="purposeTextBox" style="border-bottom:solid 1px #9e9e9e36;" value="<?=$row1->seq?>">
							<div style="justify-content: space-between;display: flex;"><div class="flowerFont"><?=$row1->valText?></div><div><img class="purposeImg" src="/app_beta/skin/basic/svg/purpose_<?=$i?>.svg" alt=""></div></div>
						</div>
						<?
						}
						else{
						?>
						<div class="purposeTextBox"  value="<?=$row1->seq?>">
							<div style="justify-content: space-between;display: flex;"><div class="flowerFont"><?=$row1->valText?></div><div><img class="purposeImg" src="/app_beta/skin/basic/svg/purpose_<?=$i?>.svg" alt=""></div></div>
						</div>
						<?	
						}
						$i++;
					}
					mysql_free_result($result1);
					?>
				</div>
			</tr>
			<tr>
				
			</tr>
		</table>
	</div>
	<div id="productTypeDiv" style="display:none;">
		<table cellpadding="0" cellspacing="10" border="0" style="width:100%;">
			<tr style="width:100%">
				<div class="productTypeWrap" style="margin: 10px;">
				<?
					$sql = "SELECT * FROM `item_mst` WHERE  keyText = 'productType'AND seq !=29 order by sortNum";
					$result2=mysql_query($sql,get_db_conn());
					$i = 1;
					while($row2=mysql_fetch_object($result2)) {
						if($i < 9){
						?>		
						<div class="productTypeTextBox" style="border-bottom: solid 1px #9e9e9e36" value="<?=$row2->seq?>">
							<div style="justify-content: space-between;display: flex;"><div class="flowerFont"><?=$row2->valText?></div><div><img class="productTypeImg" src="/app_beta/skin/basic/svg/productType_<?=$i?>.svg" alt=""></div></div>
						</div>
						<?
						}
						else{
						?>
						<div class="productTypeTextBox"  value="<?=$row2->seq?>">
							<div style="justify-content: space-between;display: flex;"><div class="flowerFont"><?=$row2->valText?></div><div><img class="productTypeImg" src="/app_beta/skin/basic/svg/productType_<?=$i?>.svg" alt=""></div></div>
						</div>
						<?	
						}
						$i++;
					}
					mysql_free_result($result2);
					?>
				</div>
			</tr>
			<tr>
				
			</tr>
		</table>
	</div>
	<div id="priceRangeForm" style="display:none">
		<table cellpadding=0 cellspacing=0 border=0 style="width:100%;">
			<tr>
				<td>
					<input  onclick="priceRangeInptClickEvent()" class="flowerPriceRange" type="text" num="" readonly placeholder="??? ??????">
				</td>
			</tr>
		</table>
	</div>	
	<div id="priceRangeDiv" style="display:none">
		<table cellpadding=0 cellspacing=0 border=0 style="width:100%;">
			<tr>
			<div class="priceRangeWrap" style="margin: 10px;">
				<?
					$i = 2;
					$col_num = 0;
					$priceRangeTextArr = array('????????? ????????? ?????????','???????????? ????????????','???????????? ?????????','??????????????? ????????????');

					$sql = "SELECT * FROM `item_mst` WHERE  keyText = 'priceRange' order by sortNum";
					$result3=mysql_query($sql,get_db_conn());
					while($row3=mysql_fetch_object($result3)) {
						$priceSubFont = "";
						
						if ($col_num > 3) {
							$style1="padding:0px;";
							$style2="margin-top:12px;";
						} else {
							$priceSubFont = $priceRangeTextArr[$col_num];
						}
						$priceFont = $row3->valText;
				?>		
						<div class="priceRangeTextBox" value="<?=$row3->seq?>">
							<div style="justify-content: space-between;padding:10px 0;display: flex;border-bottom: solid 1px #9e9e9e36;<?=$style1?>">
								<div class="flowerPriceFontWrap">
									<p class="flowerPriceFont" style="<?=$style2?>">
										<?=$priceFont?>
									</p>
									<?
									if(strlen($priceSubFont) > 0){
									?>
									<p class="flowerPriceSubFont"><?=$priceSubFont?></p>
									<?
									}
									?>
								</div>
								<div><img class="priceRangeImg" src="/app_beta/skin/basic/svg/priceRange_<?=$i?>.svg" alt=""></div>
							</div>
						</div>
				<?
						$i++;
						$col_num++;
					}
					mysql_free_result($result3);
				?>
				</div>
			</tr>
		</table>
	</div>	
	<div id="styleForm" style="display:none">
		<table cellpadding="0" cellspacing="0" border="0" class="styleForm_select" style="width:96%">
			<tr>
				<td style="text-align: center;" onclick="stepProc(this);">
					<div class="talk_button" id="styleSelecter">
						<span>????????? ????????????</span>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<div id="commentForm" style="display:none">
		<textarea class="talk_button" name="commentInput" id="commentInput" placeholder="Ex) ????????? ??? ????????? ???????????? ????????? ??????????????????" style="border: 1px solid #ebebeb; height: 40px; line-height:1.6em;"></textarea>
	</div>
	<div id="confirmForm" style="display:none;">
		<table cellpadding="0" cellspacing="0" border="0"  style="width:100%;margin: 5px 0;">
			<tr>
				<td style="width:50%;text-align: center;">
					<a onclick="resultHide();" class="basic_button fullsize" style="width:90%;text-align:center;">????????????</a>
				</td>
				<td style="width:50%;text-align: center;">
					<a onclick="CheckRequestForm();" class="basic_button fullsize" style="width:90%;text-align:center;background:#e61e6e;color:#ffffff;">????????????</a>
				</td>
			</tr>
		</table>
	</div>
	<div id="procForm" style="display:none">
		<table cellpadding="0" cellspacing="0" border="0"  style="width:100%;margin: 5px 0;">
			<tr>
				<td style="text-align: center;">
					<div class="basic_button fullsize" style="width:90%;text-align:center;background:gray;color:#ffffff;">?????? ??????????????????</div>
				</td>
			</tr>
		</table>
	</div>
	<script>
		var step = 0;
		var modStep = -1;
		var styleSelect = false;
		var htmlArr = new Array();
		var htmlModArr = new Array();
		var htmlBtn = new Array();
		var stepPer = new Array();
		var weekArr = new Array("?????????","?????????","?????????","?????????","?????????","?????????","?????????");
		
		htmlArr[0] = "<?=$_ShopInfo->memname?>???, ????????????????<br>?????? ???????????????<br>??? ?????? ????????? ???????????????.<br>?????? ???????????? ???????????????????";
		htmlArr[1] = "???????????? ???????????? ???????????????????<br>?????? ????????? ?????????????????? 3?????? ??????,<br> ##suggestCloseDateTime##???<br>?????? ??? ?????????.";
		htmlArr[2] = "?????????, ?????? ?????? ???????????????????";
		htmlArr[3] = "???????????? ??????????????????.<br>?????? ????????? ????????? ????????? ????????????????";
		htmlArr[4] = "????????? ???????????? ????????? ?????????.";
		htmlArr[5] = "???????????? ?????????<br>???????????? ????????? ????????????!<br>???????????? ???????????? ?????????,<br>????????? ?????? ???????????????.";
		htmlArr[6] = "????????????????????? ?????? ?????????<br>???????????? ???????????????!";
		htmlArr[7] = "?????????????????????! ??????????????? <br>???????????? ????????? ????????? ?????????.";
		htmlModArr[0] = "????????????";
		htmlModArr[1] = "????????? ????????????"
		htmlModArr[2] = "????????????";
		htmlModArr[3] = "??????/????????????";
		htmlModArr[4] = "???????????????";
		htmlModArr[5] = "???????????????";
		htmlModArr[6] = "????????????";
		htmlBtn[0] = $("#calendarForm").html();
		htmlBtn[1] = $("#closeForm").html();
		htmlBtn[2] = $("#receiveTypeForm").html();
		htmlBtn[2] = $("#addrForm").html();
		htmlBtn[3] = $("#purposeForm").html();
		htmlBtn[4] = $("#priceRangeForm").html();
		htmlBtn[5] = $("#styleForm").html();
		htmlBtn[6] = $("#commentForm").html();
		htmlBtn[7] = $("#confirmForm").html();
		stepPer[0] = 12;
		stepPer[1] = 26;
		stepPer[2] = 38;
		stepPer[3] = 52;
		stepPer[4] = 64;
		stepPer[5] = 78;
		stepPer[6] = 90;
		stepPer[7] = 100;
		var purposeDiv =$("#purposeDiv").html();
		var productTypeDiv =$("#productTypeDiv").html();
		var priceRangeDiv =$("#priceRangeDiv").html();
		
		function sendMessage(editFlag){
			var messageStr = $( "input[name=inputMessage]").val();
			var requestStep = 0;
			var requestImage = "";
			if(modStep < 0){
				requestStep = step;
			}
			else{
				requestStep = modStep;
			}
			if( messageStr != ""){
				
				if(requestStep == 5 && !editFlag){
					for(var i = 1 ; i <= 3 ; i++){
						var styleImageSrc = $("#styleImage" + i).val();
						if(styleImageSrc != ""){
							requestImage += "<div style=\"float:left;width:80px;height:90px;margin-left:5px;margin-top:5px;background:#ffffff url('/data/style/" + styleImageSrc + "') no-repeat;background-size:cover;background-position:center\"></div>"
						}
					}
				}
				var html = "<div style=\"clear:both;\"></div>";
				if(!editFlag){
					html += "<div style=\"display: flex;justify-content: flex-end;\"class=\"edit\" onclick=\"editStep('"+ requestStep +"')\"><img style =\"width:25px;margin-right: 10px;\"  src=\"/app/skin/basic/svg/talk_edit.svg\">";
				}
				html += "<div class=\"triangle-isosceles right\">";
				html += messageStr;
				html += "<div style=\"overflow:hidden\">";
				html += requestImage;
				html += "</div>";
				html += "</div>";
				html += "</div>";
				$( "#talk_content_wrap" ).append(html);
				fnMove();
				receiveMessage(messageStr);
				$( "input[name=inputMessage]").val("")
			}
			if(!editFlag){
				if(modStep < 0){
					step++;
				}
				else{
					if(modStep == 0){
						modStep++;
					}
					else{
						modStep = -1;
					}
				}
			}
		}
		
		function editStep(requestStep){
			$("#procBtnTd").show();
			modStep = requestStep;
			$("input[name=inputMessage]").val(htmlModArr[requestStep]);
			if(requestStep == 3){
				$('.flowerPurpose').val("");
				$('.purposeInput').val("");
				$('.flowerProductType').val("");
				$('.productTypeInput').val("");
			} else if(requestStep == 4){
				$('.flowerPriceRange').val("");
				$('.priceRangeInput').val("");
			}
			sendMessage(true);
		}
		function receiveMessage(messageStr){
			var requestStep = 0;
			if( messageStr != "" || step == 6 ){
				var formData = $("form[name=requestForm]").serialize() ;
				$.ajax({
					type : 'post',
					url : '/api/talk_response.php',
					data : formData,
					dataType : 'json',
					error: function(xhr, status, error){
						var html = "<div class=\"triangle-isosceles left\">";
						html += "???????????? ??????????????? ???????????????. ?????? ????????? ?????????";
						html += "</div>";
						$( "#talk_content_wrap" ).append(html);		
					},
					success : function(json){
						if(json["result"] == "Y"){
							if(step == 6){
								$("#comment").val(messageStr);
							}
							if(modStep < 0){
								requestStep = step;
							}
							else{
								requestStep = modStep;
							}
							printMsg(requestStep);
						}
						else{
							var html = "<div class=\"triangle-isosceles left\">";
							html += "???????????? ??????????????? ???????????????. ?????? ????????? ?????????";
							html += "</div>";
							$( "#talk_content_wrap" ).append(html);					
						}
					}
				});
				fnMove();
				$( "input[name=inputMessage]").val("")
			}
		}
		function printMsg(requestStep){
			if(requestStep < 7){
				var requestMsg = htmlArr[requestStep];
				if(requestStep == 1){
					var suggestCloseDateTime = "";
					var receiveTimeArr = $("#receiveTime").val().split(":");
					var receiveTimeText = getHourText(parseInt(receiveTimeArr[0]) - 3);
					var receiveDate = $("#receiveDate").val();
					var receiveDateObj = new Date(receiveDate);
					var nowDate = new Date();
					var week = weekArr[receiveDateObj.getDay()];
					var year = receiveDateObj.getFullYear();
					var month = ("0" + (receiveDateObj.getMonth() + 1)).slice(-2);
					var day = ("0" + receiveDateObj.getDate()).slice(-2);
					var receiveDateStr = year + "???&nbsp;" + month + "???&nbsp;" + day + "???";
					suggestCloseDateTime = receiveDateStr + " " + week + " " + receiveTimeText;
					requestMsg = requestMsg.replace("##suggestCloseDateTime##",suggestCloseDateTime);
				}
				var html = "<div style=\"clear:both;\"></div>";
				html += "<div class=\"talkProfile\">";
				html += "</div>";
				html += "<div class=\"triangle-isosceles left\">";
				html += "<span class=\"comment\">";
				html += requestMsg;
				html += "</span>";
				html += "</div>";
		//		html += "<div class=\"btn_box left\">";
		//		html += htmlBtn[requestStep];
		//		html += "</div>";
				$("#talk_content_wrap" ).append(html);
				$(".comment").last().show(600);
				setTalkInput(requestStep);
				if(requestStep == 0){
					setReceiveCalendar();
				}
				else if(requestStep == 1){
					setCloseCalendar();
					$("input[name=closeDateInput]").val($("#receiveDate").val());
					var receiveTimeArr = $("#receiveTime").val().split(":");
					var closeTime = parseInt(receiveTimeArr[0]) - 3
					var receiveTimeText = closeTime>9?closeTime + ":00":"0"+closeTime + ":00";
					$("select[name=closeTimeInput]").val(receiveTimeText);
				}
			}
			else{
				setTalkInput(requestStep);
				resultShow();
				var receiveDateArr = $("#receiveDate").val().split("-");
				var receiveTimeArr = $("#receiveTime").val().split(":");
				var receiveTime = getHourText(parseInt(receiveTimeArr[0]));
				var closeDateArr = $("#closeDate").val().split("-");
				var closeTimeArr = $("#closeTime").val().split(":");
				var closeTime = getHourText(parseInt(closeTimeArr[0]));
				
				$(".receiveDateTimeConf").last().html(receiveDateArr[0] + "??? " + receiveDateArr[1] + "??? " + receiveDateArr[2] + "??? " + receiveTime);
				$(".closeDateTimeConf").last().html(closeDateArr[0] + "??? " + closeDateArr[1] + "??? " + closeDateArr[2] + "??? " + closeTime);
				//$(".addrConf").last().html($("#addr1").val() + " " + $("#addr2").val() + "<br>" + $("#rcvName").val() + "&nbsp;" + $("#tel").val());
				$(".addrConf").html($("#addrConfVal").val());

				$(".purposeConf").last().html($("#purposeText").val());
				$(".productTypeConf").last().html($("#productTypeText").val());
				$(".priceRangeConf").last().html($("#priceRangeText").val());
				$(".styleConf").last().html($("#styleText").val());
				var styleImage1 = "/data/style/" + $("#styleImage1").val();
				var styleImage2 = "/data/style/" + $("#styleImage2").val();
				var styleImage3 = "/data/style/" + $("#styleImage3").val();
				
				if($("#styleImage1").val()){
					$(".styleImageConf1").css("background","#ffffff url('" + styleImage1 + "') no-repeat")
				}
				if($("#styleImage2").val()){
					$(".styleImageConf2").css("background","#ffffff url('" + styleImage2 + "') no-repeat")
				}
				if($("#styleImage3").val()){
					$(".styleImageConf3").css("background","#ffffff url('" + styleImage3 + "') no-repeat")
				}
				$(".commentConf").last().html($("#comment").val());
			}
		}
		
		function setTalkInput(requestStep){
			$("#talk_input_td").html(htmlBtn[requestStep]);
			switch(requestStep){
				case 3:
					$("#talk_input_purposeDiv").html(purposeDiv);
					// $('#talk_input_purposeDiv').show();
					purposeClickEvent();
					$("#talk_input_productTypeDiv").html(productTypeDiv);
					productTypeClickEvent();
					break;
				case 4:
					$("#talk_input_priceRangeDiv").html(priceRangeDiv);
					// $('#talk_input_priceRangeDiv').show();
					priceRangeClickEvent();
					break;
				case 5:
					$("#talk_input_style").html(htmlBtn[requestStep]);
					break;
			}
		}
		
		function purposeClickEvent(){
			$('.purposeTextBox').click(function(){
				var purposeVal = $(this).attr('value');
				var purposeText = $(this).text().replace(/(^\s*)|(\s*$)/g,"");

				$('.flowerPurpose').val(purposeText);
				$('.purposeInput').val(purposeVal);
				$('#talk_input_purposeDiv').hide();
			});
		}

		function productTypeClickEvent(){
			$('.productTypeTextBox').click(function(){
				var productTypeVal = $(this).attr('value');
				var productTypeText = $(this).text().replace(/(^\s*)|(\s*$)/g,"");
				$('.flowerProductType').val(productTypeText);
				$('.productTypeInput').val(productTypeVal);
				$('#talk_input_productTypeDiv').hide();
			});
		}

		function priceRangeClickEvent(){
			$('.priceRangeTextBox').click(function(){
				var priceRangeVal = $(this).attr('value');
				var priceRangeText = $(this).find('.flowerPriceFont').text().trim();				
				if($('.flowerPriceFontWrap').children('div').hasClass('flowerPriceSubFont')){
					$('.flowerPriceFont').addclass('checked');
				}
				$('.flowerPriceRange').val(priceRangeText);
				$('.priceRangeInput').val(priceRangeVal);
				$(this).parent().parent().hide();
			});
		}

		function purposeInptClickEvent(){
			$('#talk_input_purposeDiv').show();
		}
		function productTypeInptClickEvent(){
			$('#talk_input_productTypeDiv').show();
		}
		function priceRangeInptClickEvent(){
			$('#talk_input_priceRangeDiv').show();
		}
		

		function fnMove(){
			var scrollPosition = $("#talk_content_wrap").height();
			$('#talk_wrap').animate({scrollTop : scrollPosition}, 200);
		}
		function talkOn(){
			$('#requestFormContent').css("height","100vh");
			$('#talk_wrap').css("height","calc(100vh - 120px)");
			$('#gotop').slideUp(200);
			$('#top').slideUp(200);
			$('.bot_copy').slideUp(200);
			$('#talk_input_wrap').animate({bottom : "-=60"}, 200);
			
		}
		function talkOff(){
			$('#requestFormContent').css("height","calc(100vh - 60px)");
			$('#talk_wrap').css("height","calc(100vh - 240px)");
			$('#gotop').slideDown(200);
			$('#top').slideDown(200);
			$('.bot_copy').slideDown(200);
			$('#talk_input_wrap').animate({bottom : "+=60"}, 200);
			fnMove();
		}
		function stepProc(obj){
			var noticeFlg = $('#noticeFlg').val();
			if (noticeFlg == 0) {
				$('#requestFormContent').hide();
				$('.talk_input_bg').hide();
				$('#noticePage').show();
				noticeFlg++;
				$('#noticeFlg').val(noticeFlg);
			} else {
				var requestStep = 0;
				if(modStep < 0){
					requestStep = step;
				}
				else{
					if(modStep == 0){
						requestStep = modStep;
					}
					else{
						requestStep = modStep;
					}
				}
				if(requestStep == 0){
					var receiveDate = $(obj).parent().parent().parent().find("input[name=receiveDateInput]").val();
					var receiveTime = $(obj).parent().parent().parent().find("select[name=receiveTimeInput]").val();
					$("#receiveDate").val(receiveDate);
					$("#receiveTime").val(receiveTime);
					
					var receiveDateObj = new Date(receiveDate);
					var week = weekArr[receiveDateObj.getDay()];
					var year = receiveDateObj.getFullYear();
					var month = ("0" + (receiveDateObj.getMonth() + 1)).slice(-2);
					var day = ("0" + receiveDateObj.getDate()).slice(-2);
					var receiveDateStr = year + "???&nbsp;" + month + "???&nbsp;" + day + "???";
					var receiveTimeArr = $("#receiveTime").val().split(":");
					receiveTimeText = getHourText(parseInt(receiveTimeArr[0]));
					var limitTime = parseInt(receiveTimeArr[0]) - 3;
					var receiveCompText = receiveDate + " " + (limitTime > 9 ? limitTime : "0" + limitTime) + ":00:00";
					if('<?=date("Y-m-d H:i:m")?>' > receiveCompText){
						alert("???????????? ?????????????????? 3?????? ???????????? ???????????????.");
						return;
					}
					
					
					$("input[name=inputMessage]").val('"'+ receiveDateStr + " " + week + " " + receiveTimeText +'"');
				}
				else if(requestStep == 1){
					var closeDate = $(obj).parent().parent().parent().find("input[name=closeDateInput]").val();
					var closeTime = $(obj).parent().parent().parent().find("select[name=closeTimeInput]").val();
					$("#closeDate").val(closeDate);
					$("#closeTime").val(closeTime);
					var closeTimeArr = $("#closeTime").val().split(":");
					
					var receiveDate = $("#receiveDate").val();
					var receiveTime = $("#receiveTime").val();
					var receiveTimeArr = $("#receiveTime").val().split(":");
					var receiveCompText = receiveDate + " " + receiveTimeArr[0];
					var limitTime = (parseInt(closeTimeArr[0])+3)
					var closeCompText = closeDate + " " + (limitTime > 9 ? limitTime : "0" + limitTime);
					var closeNowCompText = closeDate + " " + (closeTimeArr[0] > 9 ? closeTimeArr[0] : "0" + closeTimeArr[0]) + ":00:00";
					if('<?=date("Y-m-d H:i:m")?>' > closeNowCompText){
						alert("????????? ??????????????? ???????????? ???????????? ???????????????.");
						return;
					}
					if(receiveCompText < closeCompText){
						alert("????????? ??????????????? ?????????????????? ?????? 3?????? ????????? ???????????????.");
						return;
					}
					var closeDateObj = new Date(closeDate);
					var week = weekArr[closeDateObj.getDay()];
					var year = closeDateObj.getFullYear();
					var month = ("0" + (closeDateObj.getMonth() + 1)).slice(-2);
					var day = ("0" + closeDateObj.getDate()).slice(-2);
					var closeDateStr = year + "???&nbsp;" + month + "???&nbsp;" + day + "???";
					
					var closeTime = getHourText(parseInt(closeTimeArr[0]));
					$("input[name=inputMessage]").val('"' + closeDateStr + " " + week + " " + closeTime + '"');
				}
				else if(requestStep == 2){
					ReceiverShow();
				}
				else if(requestStep == 3){
					var purpose = $('.purposeInput').val();
					var productType = $('.productTypeInput').val();
					//var productType = $(obj).parent().parent().parent().find("select[name=productTypeInput]").val();
					var purposeText = $('.flowerPurpose').val();
					var productTypeText =$('.flowerProductType').val();
					// var purposeText = $(obj).parent().parent().parent().find("select[name=purposeInput] option:selected" ).text();
					//var productType = $(obj).parent().parent().parent().find("select[name=productTypeInput]").val();
					// var productTypeText = $(obj).parent().parent().parent().find("select[name=productTypeInput] option:selected" ).text();

					$("#purpose").val(purpose);
					$("#purposeText").val(purposeText);
					$("#productType").val(productType);
					$("#productTypeText").val(productTypeText);
					for(var i = 1 ; i < 12 ; i++){
						$(".typeImage" + i).hide();
					}
					$(".typeImage" + (productType - 18)).show();
					$("input[name=inputMessage]").val('"' + purposeText + "/" + productTypeText + '"');

					if($(".flowerPurpose").val().length == 0 || $(".purposeInput").val().length == 0 ){
						alert("??? ????????? ????????? ?????????");
						return;
					}
					if($(".flowerProductType").val().length == 0 || $(".productTypeInput").val().length == 0 ){
						alert("??? ????????? ????????? ?????????");
						return;
					}
				}
				
				else if(requestStep == 4){
					var priceRange = $('.priceRangeInput').val();
					var priceRangeText = $('.flowerPriceRange').val();
					// var priceRangeText = $(obj).parent().parent().parent().find("select[name=priceRangeInput] option:selected" ).text();
		//			var style = $(obj).parent().parent().parent().find("select[name=styleInput]").val();
		//			var styleText = $(obj).parent().parent().parent().find("select[name=styleInput] option:selected" ).text();
					$("#priceRange").val(priceRange);
					$("#priceRangeText").val(priceRangeText);
					$("input[name=inputMessage]").val('"' + priceRangeText + '"');
		//			$("#style").val(style);
		//			$("#styleText").val(styleText);
					if($(".flowerPriceRange").val().length == 0 || $(".priceRangeInput").val().length == 0 ){
						alert("??? ????????? ????????? ?????????");
						return;
					}
				}
				else if(requestStep == 5){
					if(!styleSelect) {
						styleShow();
						styleSelect = true;
					}
					else{
						if($("#style1").val() == ""){
							alert("?????? ?????? ????????? ???????????? ????????? ?????????")
						}
						else{
							styleHide();
							var styleText = "";
							for(var i = 1 ; i <= 3 ; i++){
								if($("#style" + i).val() == "")break;
								styleText += ((styleText!='')?'/':'') + $("#styleText" + i).val();
							};
							$("#styleText").val(styleText);
							$("input[name=inputMessage]").val('"' + styleText + '"');
							setProgress(stepPer[step]);
							sendMessage(false);
							styleSelect = false;
						}
					}
				}else if(requestStep == 6){
					var comment = $(obj).parent().parent().find("textarea[name=commentInput]").val();
					if(comment == ""){
						comment = "??????";
					}
					$("#comment").val(comment);
					$("input[name=inputMessage]").val('"' + comment + '"' );
				}
				if(requestStep != 2 && requestStep != 5){
					setProgress(stepPer[step]);
					sendMessage(false);
				}
			}
		}
		function setProgress(per){
			var ratioText = per + "%";
			$('#progress01').progress({
				percent: per,
				text: {
				  ratio: ratioText
				}
			});
		}
		function backProc(obj){
			var receiveBox = $(obj).parent().parent().parent().parent();
			$("input[name=inputMessage]").val("????????????");
			$(receiveBox).hide(100,function(){sendMessage();});
		}
		function addAddr(name,tel1,tel2,post,addr1,addr2){
			setPoint(addr1);
			
			$('#zip').remove();
			$('#addr1').remove();
			$('#addr2').remove();
			$('#tel').remove();
			$('#rcvName').remove();
			$('#addrConfVal').remove();
			
			var html ="			<input type=\"hidden\" name=\"zip\" id=\"zip\" value=\"" + post + "\"/>";
			html += "			<input type=\"hidden\" name=\"addr1\" id=\"addr1\" value=\"" + addr1 + "\"  />";
			html += "			<input type=\"hidden\" name=\"addr2\" id=\"addr2\" value=\"" + addr2 + "\"  />";
			html += "			<input type=\"hidden\" name=\"tel\" id=\"tel\" value=\"" + tel1 + "\"  />";
			html += "			<input type=\"hidden\" name=\"rcvName\" id=\"rcvName\" value=\"" + name + "\"  />";
			var strDiv = addr1 + ' ' + addr2 + '<br/>' + name + ' ' + tel1;
			html += "			<input type=\"hidden\" name=\"addrConfVal\" id=\"addrConfVal\" value=\"" + strDiv + "\"  />";
			$("form[name=requestForm]").append(html);
			$("input[name=inputMessage]").val('"' + addr1 + " " + addr2 + "<br>" + name + "&nbsp;" + tel1 + '"');
			setProgress(stepPer[step]);
			sendMessage(false);
		}
		
	//	receiveTypeSel(this,'0')
	//	function receiveTypeSel(obj,val){
	//		var btnObjs = $(obj).parent().find(".typeBtn");
	//		var inputObj = $("#receiveType").val(val);
	//		btnObjs.each(function(obj) {
	//			$(this).removeClass("select")
	//		})
	//		$(obj).addClass("select")
	//	}

		
		function selectStyleText(obj){
			var styleGroup = $(obj).parent();
			var selStyleCnt = styleGroup.find(".select").length
			
			for(var i = 1 ; i <= styleGroup.find(".select").length ; i++){
				$("#style" + i).val("");
				$("#styleText" + i).val("");
			};
			
			if($(obj).hasClass("select")){
				$(obj).removeClass("select")
			}
			else{
				if(selStyleCnt >= 3){
					alert("???????????? ?????? 3????????? ?????? ???????????????");
				}
				else{
					$(obj).addClass("select");
				}
			}
			for(var i = 1 ; i <= styleGroup.find(".select").length ; i++){
				$("#style" + i).val(styleGroup.find(".select").eq(i-1).attr("val"));
				$("#styleText" + i).val($.trim(styleGroup.find(".select").eq(i-1).html()));
			};

		}
		
		function selectStyleImage(obj){
			var styleGroup = $(obj).parent().parent();
			var selStyleImageCnt = styleGroup.find(".selImage").length;
			var showFlag = $(obj).find(".p_prmsg").is(':visible');
			
			for(var i = 1 ; i <= styleGroup.find(".selImage").length ; i++){
				$("#styleImage" + i).val("");
			};
			
			if(showFlag){
				$(obj).find(".p_prmsg").hide();
				$(obj).removeClass("selImage");
			}
			else{
				if(selStyleImageCnt >= 3){
					alert("????????? ???????????? ?????? 3????????? ?????? ???????????????");
				}
				else{
					$(obj).find(".p_prmsg").show();
					$(obj).addClass("selImage");
				}
			}
			
			for(var i = 1 ; i <= styleGroup.find(".selImage").length ; i++){
				$("#styleImage" + i).val($.trim(styleGroup.find(".selImage").eq(i-1).attr("value")));
			};
	//		$("#styleSelecter").html("<img src=\""+src+"\" style=\"height:50px;\">");
		}
		
		function setPoint(ao_addr) {
			var pointx = "";
			var pointy = "";
			naver.maps.Service.geocode({
					address: ao_addr
				}, function(status, response) {
					if (status !== naver.maps.Service.Status.OK) {
						return alert('Something wrong!');
					}

					var result = response.result, // ?????? ????????? ????????????
						items = result.items; // ?????? ????????? ??????
						pointx = items[0].point.x;
						pointy = items[0].point.y;
						$('#ao_addr_pointx').val(pointx);
						$('#ao_addr_pointy').val(pointy);
				});
		   
		}
	</script>
	<input type="hidden" name="type" />
	<input type="hidden" name="targetVender" value="" />
	<input type="hidden" name="orderType" value="2" />
	<INPUT type="hidden" name="receiveDate" id="receiveDate" />
	<INPUT type="hidden" name="receiveTime" id="receiveTime" />
	<INPUT type="hidden" name="closeDate" id="closeDate" />
	<INPUT type="hidden" name="closeTime" id="closeTime" />
	<input type="hidden" name="receiveType" id="receiveType" value="0"  />
	<input type="hidden" name="receiveTypeText" id="receiveTypeText"/>
	<input type="hidden" name="prodNum" id="prodNum" value="1"  />
	<INPUT type="hidden" name="purpose" id="purpose"/>
	<INPUT type="hidden" name="purposeText" id="purposeText"/>
	<INPUT type="hidden" name="productType" id="productType"/>
	<INPUT type="hidden" name="productTypeText" id="productTypeText"/>
	<INPUT type="hidden" name="priceRange" id="priceRange"/>
	<INPUT type="hidden" name="priceRangeText" id="priceRangeText"/>
	<INPUT type="hidden" name="style1" id="style1"/>
	<INPUT type="hidden" name="styleText1" id="styleText1"/>
	<INPUT type="hidden" name="styleImage1" id="styleImage1"/>
	<INPUT type="hidden" name="style2" id="style2"/>
	<INPUT type="hidden" name="styleText2" id="styleText2"/>
	<INPUT type="hidden" name="styleImage2" id="styleImage2"/>
	<INPUT type="hidden" name="style3" id="style3"/>
	<INPUT type="hidden" name="styleText3" id="styleText3"/>
	<INPUT type="hidden" name="styleText" id="styleText"/>
	<INPUT type="hidden" name="styleImage3" id="styleImage3"/>
	<INPUT type="hidden" name="comment" id="comment"/>
	<INPUT type="hidden" name="ao_addr_pointx" id="ao_addr_pointx"/>
	<INPUT type="hidden" name="ao_addr_pointy" id="ao_addr_pointy"/>
	
	<div id="noticePage">	
		<input type="hidden" id="noticeFlg" value="0">
		<div class="popCloseBtn" onclick="talkRequestClose()">??</div>
		<div id="titleWrap" class="titleWrap">
			<h2>?????? ????????????</h2>
		</div>
		<div class="noticeContent" style="margin-top:10%;margin-left:10%;width:80%;">
			<div class="noticeHeader" style="text-align:center;border-radius:25px 25px 0px 0px;width:100%;height:35px;background-color:white;padding-top:20px;">
				<font style="font-size:1.3rem;font-weight:500;color:black;">??? ????????? ?????????!</font>
			</div>
			<div class="noticeBody" style="width:100%;height:295px;background-color:#fFE6E6;padding-top:10px;padding-bottom:10px;">
				<div style="clear:both;"></div>
				<table style="width:100%;">
					<tr>
						<td rowspan="3" style="width:25%;vertical-align:top;">
							<div class="talkProfile" style="float:left;"></div>
						</td>
						<td>
							<div class="triangle-isosceles first_isosceles left">
								<span class="comment" style="display: inline;font-size:1.0rem;">
									<font class="fc_pink" style="font-weight:500">?????? ??????</font>???<br>
									???????????? ?????? ???????????????<br>
									????????? ????????? ???????????????.<br>
								</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="triangle-isosceles left">
								<span class="comment" style="display: inline;font-size:1.0rem;">
									????????? <font style="font-weight:500">???????????? ??????</font>??????,<br>
									????????? ?????????<br>
									?????? ????????? ??? ????????? :(<br>
								</span>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="triangle-isosceles left">
								<span class="comment" style="display: inline;font-size:1.0rem;">
									<font class="fc_pink" style="font-weight:500">????????????</font><font style="font-weight:500"> ?????? ????????????</font><br>
									??????????????? ??? ?????? ????????????<br>
									????????? ????????? ????????? ??? ????????????!<br>
								</span>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<div class="noticeBottom noticeConfirm" style="text-align:center;padding-top:20px;border-radius:0px 0px 25px 25px;width:100%;height:40px;background-color:#e61e6e;">
				<font style="color:white;font-size:1.3rem;font-weight:500">?????? ???, ?????? ??????</font>
			</div>
		</div>
	</div>
	
	<div id="requestFormContent">

		<!-- ???????????? -->
		<input type="hidden" name="msg_type" value="1" />
		<input type="hidden" name="addorder_msg" value="" />
		<input type="hidden" name="sumprice" value="<?=$basketItems['sumprice']?>" />

		<div class="popCloseBtn" onclick="talkRequestClose()">??</div>
		<div id="titleWrap" class="titleWrap">
			<h2>?????? ????????????</h2>
		</div>
		<div class="ui small pink progress" id="progress01" style="background:none;margin:0px;">
			<div class="bar">
				<div class="progress"></div>
			</div>
		</div>
		<!-- ????????? START -->
		<div id="talk_wrap" class="talk_wrap" style="">
			<div id="talk_content_wrap" class="talk_content_wrap">
			</div>
		</div>
		<div style="widht:100vw;display:none;" id="sytle_wrap">
			<!-- ????????? START -->
			<div id="style_wrap_content" class="style_wrap">
			
				<div style="clear:both;"></div>
				<div class="talkProfile">
				</div>
				<div class="triangle-isosceles left">
					???????????? 3????????? ?????? ??? ?????????.
				</div>
				<div style="clear:both;">
				<?
					$sql = "SELECT * FROM item_mst WHERE keyText='style' ";
					//echo $sql;
					$result4=mysql_query($sql,get_db_conn());
					while($row4=mysql_fetch_object($result4)) {
				?>
						
					<a class="styleTextBtn" val="<?=$row4->seq?>" style="margin:3px;" onclick="selectStyleText(this)">
					  <?=$row4->valText?>
					</a>
				<?	}
					mysql_free_result($result4);
				?>
				</div>
				<div style="clear:both;"></div>
				<div style="margin-top:11px;">
					<div class="talkProfile">
					</div>
					<div class="triangle-isosceles left">
						?????? ?????? ?????????<br>????????? ????????? 3????????? ???????????????!<br>?????????????????? ???????????? ???????????????.<br>?????? ????????? ??????????????????.
					</div>
				</div>	
				<div style="clear:both;"></div>
				<!-- <span style="color:#E61E6E;">????????? ???????????????. ???????????? ??????????????? ?????? ????????? ???????????????.</span> -->
				<div id="styleImageWrap" style="margin-top: 10px;">
					<div class="pr_type_list_table addImageBtn" style="float:left">
						<div class="dropzone typelist_attach" id="fileDropzone" style="background:#ffffff url('/app/skin/basic/svg/plus_photo.svg') no-repeat;background-size: 60% auto;background-position:center">
							<input name="file" type="file" id="file" accept="image/*" style="display:none;" />
						</div>
					</div>
					<?for($i = 1 ;$i < 38; $i++){?> 
						<div class="pr_type_list_table typeImage1" style="float:left">
							<div class="typelist_image_wrap" style="background:#ffffff url('/data/style/1<?=str_pad($i, 2, "0", STR_PAD_LEFT)?>.jpg') no-repeat;background-size:cover;background-position:center" onclick="selectStyleImage(this)" value="1<?=str_pad($i, 2, "0", STR_PAD_LEFT)?>.jpg">
								<div class="p_prmsg">
									<!-- <i class="check icon" style="margin-top:40px;"></i>
									<div>????????????</div> -->
								</div>
							</div>
						</div>
					<?}?>
					<?for($i = 1 ;$i < 12; $i++){?> 
						<div class="pr_type_list_table typeImage2" style="float:left">
							<div class="typelist_image_wrap" style="background:#ffffff url('/data/style/2<?=str_pad($i, 2, "0", STR_PAD_LEFT)?>.jpg') no-repeat;background-size:cover;background-position:center" onclick="selectStyleImage(this)" value="2<?=str_pad($i, 2, "0", STR_PAD_LEFT)?>.jpg">
								<div class="p_prmsg">
									<i class="check icon" style="margin-top:40px;"></i>
									<div>????????????</div>
								</div>
							</div>
						</div>
					<?}?>
					<?for($i = 1 ;$i < 21; $i++){?> 
						<div class="pr_type_list_table typeImage3" style="float:left">
							<div class="typelist_image_wrap" style="background:#ffffff url('/data/style/3<?=str_pad($i, 2, "0", STR_PAD_LEFT)?>.jpg') no-repeat;background-size:cover;background-position:center" onclick="selectStyleImage(this)" value="2<?=str_pad($i, 2, "0", STR_PAD_LEFT)?>.jpg">
								<div class="p_prmsg">
									<i class="check icon" style="margin-top:40px;"></i>
									<div>????????????</div>
								</div>
							</div>
						</div>
					<?}?>
					<?for($i = 1 ;$i < 24; $i++){?> 
						<div class="pr_type_list_table typeImage5" style="float:left">
							<div class="typelist_image_wrap" style="background:#ffffff url('/data/style/5<?=str_pad($i, 2, "0", STR_PAD_LEFT)?>.jpg') no-repeat;background-size:cover;background-position:center" onclick="selectStyleImage(this)" value="2<?=str_pad($i, 2, "0", STR_PAD_LEFT)?>.jpg">
								<div class="p_prmsg">
									<i class="check icon" style="margin-top:40px;"></i>
									<div>????????????</div>
								</div>
							</div>
						</div>
					<?}?>
				</div>
			</div>
			<!-- ????????? END -->
		</div>
		<div style="width:100vw;display:none;" id="result_wrap">
			<!-- ????????? START -->
			<div id="result_wrap_content" class="result_wrap">
			
				<div style="clear:both;"></div>
				<div class="talkProfile">
				</div>
				<div class="triangle-isosceles left">
					?????????????????????!<br>??????????????? ???????????? ?????? ??????????????????.

				</div>
				
				<div id="resultForm">
					<div style="clear:both;"></div>
					<div class="resultWrapTitle">
						<div>?????????</div>
					</div>
					<div class="subTitle">
						<div class="subTitleIcon"></div>
						<div class="subTitleText">?????? ????????? ????????????</div>
					</div>
					<div class="resultContent">
						<div class="contentText">
							<span style="font-size: 1.2em;font-weight: 600;color: #282828;" class="closeDateTimeConf"></span>
						</div>
						<div>
							<div class="contentInfoIcon"></div>
							<div class="contentInfoText red">
								??????????????? ????????? ???????????? ???????????????!
							</div>
						</div>
						<div style="overflow:hidden;margin-left:12px;">
							<div class="resultBanner productTypeConf"></div>
							<div class="resultBanner purposeConf"></div>
							<div class="resultBanner priceRangeConf"></div>
							<div class="resultBanner styleConf"></div>
						</div>
						<div style="overflow:hidden;margin-left:10px;">
							<div class="pr_type_list_table" style="float:left">
								<div class="typelist_image_wrap styleImageConf1" >
								</div>
							</div>
							<div class="pr_type_list_table" style="float:left">
								<div class="typelist_image_wrap styleImageConf2" >
								</div>
							</div>
							<div class="pr_type_list_table" style="float:left">
								<div class="typelist_image_wrap styleImageConf3" >
								</div>
							</div>
						</div>
					</div>
					<div class="subTitle">
						<div class="subTitleIcon"></div>
						<div class="subTitleText">???????????? </div>
					</div>
					<div class="resultContent">
						<div class="contentText">
							<span class="receiveDateTimeConf"></span>
						</div>
						<div>
							<div class="contentInfoIcon"></div>
							<div class="contentInfoText red">
								????????? ??????, ????????? ????????? ????????? ????????????!
							</div>
						</div>
						<div>
							<div class="contentInfoText black">
								<span class="addrConf"></span>
							</div>
						</div>
					</div>
					<div class="subTitle">
						<div class="subTitleIcon"></div>
						<div class="subTitleText">????????????</div>
					</div>
					<div class="resultContent">
						<div class="contentText">
							<span class="commentConf"></span>
						</div>
					</div>
				</div>
			</div>
			<!-- ????????? END -->
		</div>
		<!-- ????????? END -->
		<!-- ????????? START -->
	
		<div class="talk_input_bg" style="position: fixed;bottom: 0;background-color: #ffffff;width: 100%;height: calc(75px + env(safe-area-inset-bottom));">
			<div id="talk_input_flower_Wrap">
				<div id="talk_input_purposeDiv" style="display:none;"></div>
				<div id="talk_input_productTypeDiv" style="display:none;"></div>
				<div id="talk_input_priceRangeDiv" style="display:none;"></div>
			</div>
			<div class="talk_input_wrap" id="talk_input_wrap">
				<table class="talk_table">
					<tr>
						<td style="width:auto" id="talk_input_td">
							
						</td>
						<td style="width:40px" id="procBtnTd">
							<a onclick="stepProc(this);" class="basic_button grayBtn" id="procBtn" style="border-radius:5px;padding:3px;background:#e51e6e;text-align:center;">
								<img src="/app/skin/basic/svg/arrow.svg" style="width:30px">
							</a>
						</td>
					</tr>
				</table>
				<input type="hidden" name="inputMessage" id="inputMessage">
			</div>
		</div>
		<!-- ????????? End -->
		<Script>
			$(document).ready(function() {
				$(".move_scroll").hide();
				resetTalk("","");
				
				var noticeFlg = $('#noticeFlg').val();
				if (noticeFlg == 0) {
					$('#noticePage').hide();
				}
				
				setNoticeConfirmClickEvent();

				if($('.flowerPriceFontWrap').children('div').hasClass('flowerPriceSubFont')){
					$('.flowerPriceFont').addclass('checked');
				}
			});
			function setNoticeConfirmClickEvent() {
				$('.noticeConfirm').click(function() {
					$('#requestFormContent').show();
					$('.talk_input_bg').show();
					$('#noticePage').hide();
				});
			}
			function resetTalk(vidx,brand_name){
				$("#talk_content_wrap").html("");
				$("input[name=targetVender]").val(vidx);
				
				step = 0;
				$('#progress01').progress({
					percent: 0
				});
				if(vidx != ""){
					htmlArr[0] = "<b>" + brand_name + "</b>?????????<br>????????? ???????????????!<br>?????? ???????????? ????????????????";
				}
				else{
					htmlArr[0] = "<?=$_ShopInfo->memname?>???, ????????????????<br>?????? ???????????????<br>??? ?????? ????????? ???????????????.<br>?????? ???????????? ???????????????????";

				}
				printMsg(0);
			}
			function quantityControlForm(mode, obj){
				if(mode != null || mode != 'undifined'){
					var quantituObj = $(obj).parent().find(".qty_input");
					if(mode == 'plus'){
						quantituObj.val(parseInt(quantituObj.val()) + 1);
					}

					if(mode == 'minus'){
						if(quantituObj.val() > 1){
						quantituObj.val(parseInt(quantituObj.val()) - 1);
						}else{
							alert("?????? ??????????????? ????????? 1??? ?????????.");
						}
					}
				}
			}
			function styleShow(){
				$("#sytle_wrap").show();
				$("#talk_wrap").hide();
				$("#result_wrap").hide();
				
			}
			function styleHide(){
				$("#sytle_wrap").hide();
				$("#talk_wrap").show();
				$("#result_wrap").hide();
			}
			function resultShow(){
				$("#procBtnTd").hide();
				$("#sytle_wrap").hide();
				$("#talk_wrap").hide();
				$("#result_wrap").show();
				
			}
			function resultHide(){
				$("#sytle_wrap").hide();
				$("#talk_wrap").show();
				$("#result_wrap").hide();
			}
			//????????? ?????????
			function ReceiverCheck(){
				window.open("mydelivery.php","addrbygone","width=100,height=100,toolbar=no,menubar=no,scrollbars=yes,status=no");
			}
		</script>
		
		<script type="text/javascript">

			//?????? ??????
			function setReceiveCalendar(){
				$(".receiveDate").last().datepicker({
					dateFormat: 'yy-mm-dd',
					prevText: '?????? ???',
					nextText: '?????? ???',
					monthNames: ['1???','2???','3???','4???','5???','6???','7???','8???','9???','10???','11???','12???'],
					monthNamesShort: ['1???','2???','3???','4???','5???','6???','7???','8???','9???','10???','11???','12???'],
					dayNames: ['???','???','???','???','???','???','???'],
					dayNamesShort: ['???','???','???','???','???','???','???'],
					dayNamesMin: ['???','???','???','???','???','???','???'],
					showMonthAfterYear: true,
					changeMonth: true,
					changeYear: true,
					yearSuffix: '???',
					minDate: '+<?=$gapDay?>d',
					yearRange: "-100:+0"
				});
			}
			
			function setCloseCalendar(){
				var receiveDate = $("#receiveDate").val();
				$(".closeDate").last().datepicker({
					dateFormat: 'yy-mm-dd',
					prevText: '?????? ???',
					nextText: '?????? ???',
					monthNames: ['1???','2???','3???','4???','5???','6???','7???','8???','9???','10???','11???','12???'],
					monthNamesShort: ['1???','2???','3???','4???','5???','6???','7???','8???','9???','10???','11???','12???'],
					dayNames: ['???','???','???','???','???','???','???'],
					dayNamesShort: ['???','???','???','???','???','???','???'],
					dayNamesMin: ['???','???','???','???','???','???','???'],
					showMonthAfterYear: true,
					changeMonth: true,
					changeYear: true,
					yearSuffix: '???',
					minDate: '+<?=$gapDay?>d',
					maxDate: receiveDate,
					yearRange: "-100:+0"
				});
			}
			//-->
		</script>
		
		
		<div id="delivery_popup" style="display: none; position: fixed; padding-top:calc(60px + env(safe-area-inset-top));padding-top:calc(60px + constant(safe-area-inset-top)); box-sizing: border-box; background: rgba(0, 0, 0, 0.7); z-index: 999; width: 100%; height: 100%; border: 0px solid rgb(221, 221, 221); left: 0%; top: 0%;">
			<div id="btnCloseLayer" style="position:absolute;right:0px;top:0px;left:0px;bottom:0px;z-index:0;" onclick="ReceiverClose()">
				<div style="position:absolute;top:calc(3% + env(safe-area-inset-top));top:calc(3% + constant(safe-area-inset-top));right:3%;color:#fff;font-size:4em;font-weight:500;">??</div>
			</div>
			<div style="border-radius:8px;position: relative; width: 100%; height: 100%; background-color: rgb(255, 255, 255); z-index: 0; overflow: hidden auto; min-width: 300px; margin: 0px; padding: 0px;">
				<iframe frameborder="0" id="delivery_content" src="about:blank" style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%; border: 0px none; margin: 0px; padding: 0px; overflow: hidden; min-width: 300px;"></iframe>
			</div>
		</div>
		<script>

			function CheckRequestForm() {
				if($("input[name=receiveDate]").val().length==0) {
					alert("???????????? ?????????");
					return;
				}
				if($("input[name=receiveTime]").val().length==0) {
					alert("???????????? ?????????");
					return;
				}
				if($("input[name=addr1]").val().length==0) {
					alert("?????? ?????????");
					return;
				}
				if($("input[name=purpose]").val().length==0) {
					alert("?????? ?????????");
					return;
				}
				if($("input[name=productType]").val().length==0) {
					alert("?????? ?????????");
					return;
				}
				if($("input[name=priceRange]").val().length==0) {
					alert("????????? ?????????");
					return;
				}
				if($("input[name=style1]").val().length==0) {
					alert("????????? ?????????");
					return;
				}

				document.requestForm.type.value="insert";
				$("#talk_input_td").html($("#procForm").html());
				var formData = $("form[name=requestForm]").serialize();
				$.ajax({
					type : 'post',
					url : '/api/request_insert.php',
					data : formData,
					dataType : 'json',
					error: function(xhr, status, error){
						alert("????????? ???????????? ????????? ??????????????????.");
						$("#talk_input_td").html($("#confirmForm").html());
					},
					success : function(json){
						if(json["result"] == "Y"){
							location.replace("/app/proposalList.php");
						}
						else if(json["result"] == "E"){
							alert("???????????? ????????? ??????????????????. ?????? ??????????????????");
						$("#talk_input_td").html($("#confirmForm").html());
						}
					}
				});
			}

			//????????? ?????????
			function ReceiverShow(){
				$("#delivery_popup").show();
				$("#delivery_content").attr("src","/app/mydeliveryModal.php");
			}
			function ReceiverClose(){
				$("#delivery_popup").hide();
				$("#delivery_content").attr("src","about:blank");
			}
			function setFilesName(){
				alert("sfn")
			}
			function submitForm(){
				alert("submitForm")
			}
			
			function getHourText(receiveTimeHour){
				var receiveTime;
				if(receiveTimeHour < 12 ){
					receiveTime = "?????? " +  receiveTimeHour + "???";
				}
				else if(receiveTimeHour == 12 ){
					receiveTime = "?????? 12???";
				}
				else{
					receiveTime = "?????? " + (receiveTimeHour - 12) + "???";
				}
				return receiveTime;
			}
			Dropzone.autoDiscover = false;
			$("#fileDropzone").dropzone({
				url: '/api/style_upload_proc.php',
				maxFilesize: 5000,
				acceptedFiles: 'image/*',
				maxFiles: 3,
				addRemoveLinks: true,
				init: function() {
					var fileDropzone = this;
					
					// Append all the additional input data of your form here!
					this.on("sending", function(file, xhr, formData) {
						formData.append("token", $("input[name=token]").val());
					});
					// Append all the additional input data of your form here!
					this.on("success",  function(file, json) {
						json = $.parseJSON( json )
						var styleGroup = $("#styleImageWrap");
						var selStyleImageCnt = styleGroup.find(".selImage").length;
						if(selStyleImageCnt > 2){
							alert("????????? ???????????? ?????? 3????????? ?????? ???????????????");
						}
						else{
							for(var i = 1 ; i <= styleGroup.find(".selImage").length ; i++){
								$("#styleImage" + i).val("");
							};
							var imageHtml = "<div class=\"pr_type_list_table\" style=\"float:left\">";
							imageHtml += "	<div class=\"typelist_image_wrap selImage\" style=\"background:#ffffff url('/data/style/" + json.file_name + "') no-repeat;background-size:cover;background-position:center\" onclick=\"selectStyleImage(this)\" value=\"" + json.file_name + "\">";
							imageHtml += "		<div class=\"p_prmsg\" style=\"display: block;\">";
							imageHtml += "			<i class=\"check icon\" style=\"margin-top:40px;\"></i>";
							imageHtml += "			<div>????????????</div>";
							imageHtml += "		</div>";
							imageHtml += "	</div>";
							imageHtml += "</div>";
							var styleGroup = $("#styleImageWrap");
							var selStyleImageCnt = styleGroup.find(".selImage").length;
							$(".addImageBtn").after(imageHtml);
							for(var i = 1 ; i <= styleGroup.find(".selImage").length ; i++){
								$("#styleImage" + i).val($.trim(styleGroup.find(".selImage").eq(i-1).attr("value")));
							};
						}
					});

					this.on("maxfilesexceeded", function() {
						// Gets triggered when there was an error sending the files.
						// Maybe show form again, and notify user of error
						alert("????????? ???????????? ?????? 3????????? ????????? ???????????????");
					});
					
				}
			});
		</script>
	</div>
</form>
