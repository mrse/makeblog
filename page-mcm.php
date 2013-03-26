<?php
/**
 * Template Name: MCM - Raspberry Pi
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 * 
 */
make_get_header() ?>
		
	<div class="single">
	
		<div class="container">

			<div class="row">

				<div class="span12">
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
				</div>
			
			</div>
			
			<div class="row">
				
				<div class="span8">
					
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/RASPBERRYPI_AD.jpg" alt="Raspberry Pi Design Contest">
					
				</div>
				
				<div class="span4">
					
					<div class="sidebar-ad">
					
						<!-- Beginning Sync AdSlot 2 for Ad unit header ### size: [[300,250]]  -->
						<div id='div-gpt-ad-664089004995786621-2'>
							<script type='text/javascript'>
								googletag.display('div-gpt-ad-664089004995786621-2');
							</script>
						</div>
						<!-- End AdSlot 2 -->

					</div>
					
				</div>
				
			</div>
			
			<div class="tabbable">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#1" data-toggle="tab">About</a></li>
					<li class=""><a href="#3" data-toggle="tab">Prizes</a></li>
					<li class=""><a href="#2" data-toggle="tab">Submit Your Build</a></li>
					<li class=""><a href="#gallery" data-toggle="tab">Gallery of Pi</a></li>
					<li class=""><a href="#rules" data-toggle="tab">Rules</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="1">
					
						<h2>About</h2>
						<p>MAKE's Raspberry Pi Design Contest is a celebration of the innovation inspired by this affordable single-board computer that's taking the maker world by storm. Each entry should use the Raspberry Pi as an intrinsic part of the project, but may include other circuitry, software, mechanical, or sculptural parts as needed.</p>

						<p>We've partnered with <a href="http://www.mcmelectronics.com/">MCM</a> to give away over $3,500 worth of prize packages!</p>
						
						<p>The deadline to submit an entry is 11:59pm PT on April 11th.</p>

						<p>Pi Projects will be entered into one of the following four categories, and evaluated by a panel of judges using the criteria below.</p>

						<h4>Pi Project Categories:</h4>
						
						<ul>
							<li><strong>Artistic</strong>: Use the physical computing of Raspberry Pi as a component of your music, animation, sound, performance, or art installation.</li>
							<li><strong>Utility</strong>: Detail your amazingly useful, day-to-day application for this inexpensive Linux-based computer.</li>
							<li><strong>Education</strong>: Show us a compelling idea for how the Pi can be utilized for education, whether in a classroom or a community workshop setting.</li>
							<li><strong>Enclosure</strong>: Raspberry Pi are bare PCBs with exposed ports. Do you have a design for a case that's more clever or cool than all the rest?</li>
						</ul>

						<h4>Entries will be judged by the following criteria:</h4>
						<ul>
							<li><strong>Documentation (30%)</strong>: Supporting material such as a blog, flickr set of photos, YouTube video, etc.
							<li><strong>Project Success (30%)</strong>: Did your project achieve its goal?
							<li><strong>Unique Application (40%)</strong>: Novel use of the Pi.
						</li>
					
					</div>
					
					<div class="tab-pane" id="3">
						
						<h2>Prizes</h2>
						
						<div class="row">
						
							<div class="span6">
								
								<p>Four (4) Category Prize Winners will each receive an MCM Raspberry Pi Prize Package (total estimated retail value of $615.91).</p>
									
								<p>One (1) Grand Prize winner will receive an MCM Raspberry Pi Prize Package &amp; a Printrbot Jr. 3D Printer (Total estimated retail value of $1,114.91)</p>

								<p>The MCM Raspberry Pi Prize Package includes: USB DMM, DC Power Supply, Digital Soldering Iron, Gertboard, Pi Face, Pi View, Wi-Pi Wireless Adapter, &amp; Raspberry Pi Iron-On Skill Badge.</p>	
								
							</div>
							
							<div class="span6">
						
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/MCM_Prizes_photoshopped.jpg" alt="MCM Grand Prize" class="pull-right">		
								
							</div>
							
						</div>
						
					</div>
					
					<div class="tab-pane" id="2">
					
						<style>.wufoo{letter-spacing:.01em}.wufoo li{width:64%}.info{display:inline-block;clear:both;margin:0 0 5px 0;padding:0 1% 1.1em 1%;border-bottom:1px dotted #ccc}.info[class]{display:block}.hideHeader .info,#payment.hideHeader li.first{display:none}.info h2{font-weight:normal;font-size:160%;margin:0 0 5px 0;clear:left}.info div{font-size:95%;line-height:135%;color:#555}form ul{margin:0;padding:0;list-style-type:none}* html form ul{width:99%;zoom:1}form li{margin:0;padding:6px 1% 9px 1%;clear:both;background-color:transparent;position:relative;-webkit-transition:background-color 350ms ease-out;-moz-transition:background-color 350ms ease-out;-o-transition:background-color 350ms ease-out;transition:background-color 350ms ease-out}form ul:after,form li:after,form li div:after{content:".";display:block;height:0;clear:both;visibility:hidden}* html form li{height:1%;margin-bottom:-3px}* + html form li{height:1%;margin-bottom:-3px}* html form li div{display:inline-block}* + html form ul,* + html form li div{display:inline-block}form li div{margin:0;padding:0;color:#444}form li span{margin:0 .3em 0 0;padding:0;float:left;color:#444}form li div span{margin:0;display:block;width:100%;float:left}li.twoColumns div span{width:48%;margin:0 5px 0 0}li.threeColumns div span{width:30%;margin:0 5px 0 0}li.notStacked div span{width:auto;margin:0 7px 0 0}form li.complex{padding-bottom:0}form li.complex div span{width:auto;margin:0 .3em 0 0;padding-bottom:12px}form li.complex div span.full{margin:0}form li.complex div span.left,form li.complex div span.right{margin:0;width:48%}form li.complex div span.full input,form li.complex div span.full select,form li.complex div span.left input,form li.complex div span.right input,form li.complex div span.left select,form li.complex div span.right select{width:100%}.left{float:left}.right{float:right}.clear{clear:both !important}label span,.section span,p span,.likert span{display:inline !important;float:none !important}form li div label,form li span label{margin:0;padding-top:3px;clear:both;font-size:85%;line-height:160%;color:#444;display:block}fieldset{display:block;border:none;margin:0;padding:0}label.desc,legend.desc{font-size:95%;font-weight:bold;color:#222;line-height:150%;margin:0;padding:0 0 3px 0;border:none;display:block;white-space:normal;width:100%}label.choice{display:block;cursor:pointer;font-size:100%;line-height:150%;margin:-17px 0 0 23px;padding:0 0 5px 0;color:#222;width:88%}.safari label.choice{margin-top:-16px}form.rightLabel .desc{padding-top:2px}span.symbol{font-size:120%;line-height:135%}form li .datepicker{float:left;margin:.19em 5px 0 0;padding:0;width:16px;height:16px;cursor:pointer !important}form span.req{display:inline;float:none;color:red !important;font-weight:bold;margin:0;padding:0}form li div label var{font-weight:bold;font-style:normal}form li div label .currently{display:none}input.text,input.search,input.file,textarea.textarea,select.select{font-family:"Lucida Grande", Tahoma, Arial, sans-serif;font-size:100%;color:#333;margin:0;padding:2px 0}input.text,input.search,textarea.textarea{border-top:1px solid #7c7c7c;border-left:1px solid #c3c3c3;border-right:1px solid #c3c3c3;border-bottom:1px solid #ddd;background:#fff url(../images/fieldbg.gif) repeat-x top}input.nospin::-webkit-inner-spin-button,input.nospin::-webkit-outer-spin-button{-webkit-appearance:none;margin:0}select.select{padding:1px 0 0 0}input.search{-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;padding-left:6px}input.checkbox,input.radio{display:block;margin:4px 0 0 0;padding:0;width:13px;height:13px}input.other{margin:0 0 8px 25px}.safari select.select{font-size:120% !important;margin:0 0 1px 0}* html select.select{margin:1px 0}* + html select.select{margin:1px 0}.center,form li span.center input.text,form li span.center label,form li.name span label,form li.date input.text,form li.date span label,form li.phone input.text,form li.phone span label,form li.time input.text,form li.time span label{text-align:center}form li.time select.select{margin-left:5px}form li.price .right{text-align:right}.third{width:32% !important}.half{width:48% !important}.full{width:100% !important}input.small,select.small{width:25%}input.medium,select.medium{width:50%}input.large,select.large{width:100%}.msie[class] select.ieSelectFix{width:auto}.msie[class] select.ieSelectFix.small{min-width:25%}.msie[class] select.ieSelectFix.medium{min-width:50%}.msie[class] select.ieSelectFix.large{width:100%}textarea.textarea{width:293px;min-width:100%;max-width:100%}textarea.small{height:5.5em}textarea.medium{height:10em}textarea.large{height:20em}li.file a{color:#222;text-decoration:none}li.file span{display:inline;float:none}li.file img{display:block;float:left;margin:0 0 0 -10px;padding:5px 5px 7px 5px}li.file .file-size,li.file .file-type{color:#666;font-size:85%;text-transform:uppercase}li.file .file-name{display:block;padding:14px 0 0 0;color:blue;text-decoration:underline}li.file .file-delete{color:red !important;font-size:85%;text-decoration:underline}li.file a:hover .file-name{color:green !important}li.file a:hover .file-name{color:green !important}form li.likert{margin:0;padding:6px 1% 5px 1%;width:auto !important;clear:both !important;float:none !important}.likert table{margin:0 0 .9em 0;background:#fff;width:100%;border:1px solid #dedede;border-bottom:none}.likert caption{text-align:left;color:#222;font-size:95%;line-height:135%;padding:5px 0 .5em 0}.likert input{padding:0;margin:2px 0}.likert tbody td label{font-size:85%;display:block;color:#565656}.likert thead td,.likert thead th{background-color:#e6e6e6}.likert td{border-left:1px solid #ccc;text-align:center;padding:4px 6px}.likert thead td{font-size:85%;padding:10px 6px}.likert th,.likert td{border-bottom:1px solid #dedede}.likert tbody th{padding:8px 8px;text-align:left}.likert tbody th label{color:#222;font-size:95%;font-weight:bold}.likert tbody tr.alt td,.likert tbody tr.alt th{background-color:#f5f5f5}.likert tbody tr:hover td,.likert tbody tr:hover th{background-color:#FFFFCF}.col1 td{width:30%}.col2 td{width:25%}.col3 td{width:18%}.col4 td{width:14.5%}.col5 td{width:12%}.col6 td,.col7 td{width:10%}.col8 td,.col9 td,.col10 td{width:6.5%}.col11{width:6%}.hideNumbers tbody td label{display:none}form li.buttons{width:auto !important;position:relative;clear:both;padding:10px 1% 10px 1%}form li.buttons input{font-size:100%;margin-right:5px}input.btTxt{padding:0 7px;width:auto;overflow:visible}.safari input.btTxt{font-size:120%}.buttons .marker{position:absolute;top:0;right:0;padding:15px 10px 0 0;color:#000;width:auto}button.link{display:inline-block;border:none;background:none;color:blue;text-decoration:underline;cursor:pointer;padding:0;font-size:100%}button.link:hover{color:green}.leftLabel li,.rightLabel li{width:74% !important;padding-top:9px}.leftLabel .desc,.rightLabel .desc{float:left;width:31%;margin:0 15px 0 0}.rightLabel .desc{text-align:right}.leftLabel li div,.rightLabel li div{float:left;width:65%}* html .leftLabel li fieldset div,* html .rightLabel li fieldset div{float:right}* + html .leftLabel li fieldset div,* + html .rightLabel li fieldset div{float:right}.leftLabel .buttons,.rightLabel .buttons{padding-left:23%}.leftLabel .buttons div,.rightLabel .buttons div{float:none;margin:0 0 0 20px}.leftLabel p.instruct,.rightLabel p.instruct{width:28%;margin-left:5px}.leftLabel .altInstruct .instruct,.rightLabel .altInstruct .instruct{margin-left:31% !important;padding-left:15px;width:65%}.noI form li,.altInstruct form li{width:auto !important}.noI .leftLabel .buttons,.noI .rightLabel .buttons{padding-left:31%}.noI .leftLabel .buttons div,.noI .rightLabel .buttons div{margin:0 0 0 17px}form li.leftHalf,form li.rightHalf{width:47% !important}form li.leftThird,form li.middleThird,form li.rightThird{width:30% !important}form li.leftFourth,form li.middleFourth,form li.rightFourth{width:23% !important;_width:22% !important}form li.leftFifth,form li.middleFifth,form li.rightFifth{width:18% !important;_width:17% !important}form li.middleThird{clear:none !important;float:left;margin-left:2% !important}form li.leftFourth,form li.middleFourth,form li.leftFifth,form li.middleFifth{clear:none !important;float:left}form li.rightHalf,form li.rightThird,form li.rightFourth,form li.rightFifth{clear:none !important;float:right}li.leftHalf .small,li.rightHalf .small,li.leftHalf .medium,li.rightHalf .medium,li.leftThird .small,li.middleThird .small,li.rightThird .small,li.leftThird .medium,li.middleThird .medium,li.rightThird .medium,li.leftFourth .medium,li.middleFourth .medium,li.rightFourth .medium,li.leftFourth .small,li.middleFourth .small,li.rightFourth .small,li.leftFifth .medium,li.middleFifth .medium,li.rightFifth .medium,li.leftFifth .small,li.middleFifth .small,li.rightFifth .small{width:100% !important}form li.leftHalf,form li.leftThird,form li.leftFourth,form li.leftFifth{clear:left !important;float:left}* html form li.middleFourth{margin-left:1% !important}* html form li.middleFifth{margin-left:1% !important}form li.focused{background-color:#fff7c0}form .instruct{position:absolute;top:0;left:0;z-index:1000;width:45%;margin:0 0 0 8px;padding:8px 10px 10px 10px;border:1px solid #e6e6e6;background:#f5f5f5;visibility:hidden;opacity:0;font-size:105%;-webkit-transition:opacity 350ms ease-out;-moz-transition:opacity 350ms ease-out;-o-transition:opacity 350ms ease-out;transition:opacity 350ms ease-out}form .instruct small{line-height:120%;font-size:80%;color:#444}form li.focused .instruct,form li:hover .instruct{left:100%;visibility:visible;opacity:1}.altInstruct .instruct,li.leftHalf .instruct,li.rightHalf .instruct,li.leftThird .instruct,li.middleThird .instruct,li.rightThird .instruct,li.leftFourth .instruct,li.middleFourth .instruct,li.rightFourth .instruct,li.leftFifth .instruct,li.middleFifth .instruct,li.rightFifth .instruct,.iphone .instruct{visibility:visible;position:static;margin:0;padding:6px 0 0 0;width:100%;clear:left;background:none !important;border:none !important;font-style:italic;opacity:1}.altInstruct p.complex,li.leftHalf p.complex,li.rightHalf p.complex,li.leftThird p.complex,li.middleThird p.complex,li.rightThird p.complex,.iphone p.complex{padding:0 0 9px 0}.hideSeconds .seconds,.hideAMPM .ampm,.hideAddr2 .addr2,.hideSecondary #previousPageButton,.hideCents .radix,.hideCents .cents,.hideState .state{display:none}form li.section{clear:both;margin:0;padding:7px 0 0 0;width:auto !important;position:static}form li.section h3{font-weight:normal;font-size:110%;line-height:135%;margin:0 0 3px 0;width:auto;padding:12px 1% 0 1%;border-top:1px dotted #ccc}form li.first{padding:0}form li.first h3{padding:8px 1% 0 1%;border-top:none !important}form li.section div{display:block;width:auto;float:none;font-size:85%;line-height:160%;margin:0 0 1em 0;padding:0 1% 0 1%}form li.section.scrollText{border:1px solid #dedede;height:150px;overflow:auto;margin-bottom:10px;padding:10px;-webkit-box-shadow:rgba(0,0,0,0.15) 0 0 3px;-moz-box-shadow:rgba(0,0,0,0.15) 0 0 3px;-o-box-shadow:rgba(0,0,0,0.15) 0 0 3px;box-shadow:rgba(0,0,0,0.15) 0 0 3px}form li.section.scrollText h3{border:none;padding-top:8px}form li.captcha{width:auto !important;clear:both;border-top:1px dotted #ccc;margin-top:5px;padding:1.1em 1% 9px 1%;width:auto !important;position:static}form li.captcha label.desc{width:auto !important;margin-bottom:4px;float:none}* + html #recaptcha_area,* + html #recaptcha_table{min-width:450px !important}* html #recaptcha_area,* html #recaptcha_table{width:450px !important}#recaptcha_widget_div table{background:#fff}form li.captcha .noscript iframe{border:none;overflow:hidden;margin:0;padding:0}form li.captcha .noscript label.desc{display:block !important}form li.captcha .noscript textarea{margin-left:12px}iframe[src="about:blank"]{display:none}form li.paging-context{clear:both;border-bottom:1px dotted #ccc;margin:0 0 7px 0;padding:5px 1% 10px 1%;width:auto !important;position:static}.paging-context table{width:100%}.pgStyle1 td{text-align:left;vertical-align:middle}.pgStyle1 td.c{width:22px}.pgStyle1 td.t{padding:0 1%}.pgStyle1 var{display:block;float:left;background:none;border:1px solid #CCC;color:#000;width:20px;height:20px;line-height:19px;text-align:center;font-size:85%;font-style:normal;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;-webkit-box-shadow:rgba(0,0,0,0.15) 0 1px 2px;-moz-box-shadow:rgba(0,0,0,0.15) 0 1px 2px;-o-box-shadow:rgba(0,0,0,0.15) 0 1px 2px;box-shadow:rgba(0,0,0,0.15) 0 1px 2px}.pgStyle1 .done var{background:#ccc}.pgStyle1 .selected var{background:#FFF7C0;color:#000;border:1px solid #e6dead;font-weight:bold}.pgStyle1 b{font-size:85%;font-weight:normal;color:#000}.pgStyle1 .selected b{font-weight:bold}.circle6 td,.circle7 td{vertical-align:top;text-align:center}.nopagelabel td.t{display:none}.nopagelabel .pgStyle1 var,.circle6 var,.circle7 var{width:24px;height:24px;line-height:24px;font-size:90%;margin:0 auto 7px auto;float:none;-webkit-border-radius:12px;-moz-border-radius:12px;border-radius:12px}.nopagelabel .pgStyle1 var{margin-bottom:0}.circle6 b,.circle7 b{padding:0}.circle2 td{width:50%}.circle3 td{width:33%}.circle4 td{width:25%}.circle5 td{width:20%}.circle6 td{width:16.6%}.circle7 td{width:14.2%}.pgStyle2 td{vertical-align:middle;height:25px;padding:2px;border:1px solid #CCC;position:relative;-webkit-border-radius:14px;-moz-border-radius:14px;border-radius:14px;-webkit-box-shadow:rgba(0,0,0,0.1) 1px 1px 1px;-moz-box-shadow:rgba(0,0,0,0.1) 1px 1px 1px;-o-box-shadow:rgba(0,0,0,0.1) 1px 1px 1px;box-shadow:rgba(0,0,0,0.1) 1px 1px 1px}.pgStyle2 var{display:block;height:26px;float:left;background:#FFF7C0;color:#000;font-style:normal;text-align:right;-webkit-border-radius:12px;-moz-border-radius:12px;border-radius:12px;-webkit-box-shadow:rgba(0,0,0,0.15) 1px 0 0;-moz-box-shadow:rgba(0,0,0,0.15) 1px 0 0;-o-box-shadow:rgba(0,0,0,0.15) 1px 0 0;box-shadow:rgba(0,0,0,0.15) 1px 0 0}.pgStyle2 var b{display:block;float:right;font-size:100%;padding:3px 10px 3px 3px;line-height:19px}.pgStyle2 em{font-size:85%;font-style:normal;display:inline-block;margin:0 0 0 9px;padding:4px 0;line-height:18px}.pgStyle2 var em{padding:4px 5px 3px 0}.page1 .pgStyle2 var{padding-left:7px;text-align:left;background:none;-webkit-box-shadow:none;-moz-box-shadow:none;-o-box-shadow:none;box-shadow:none}.page1 .pgStyle2 b{float:none;padding-right:0}.hideMarkers .marker,.nopagelabel .pgStyle1 b,.nopagelabel .pgStyle2 em{display:none !important}#errorLi{width:99%;margin:15px auto 15px auto;background:#fff !important;border:1px solid red;text-align:center;padding:1em 0 1em 0;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px}#errorMsgLbl{margin:0 0 5px 0;padding:0;font-size:125%;color:#DF0000 !important}#errorMsg{margin:0 0 2px 0;color:#000 !important;font-size:100%}#errorMsg b{padding:2px 8px;background-color:#FFDFDF !important;color:red !important;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px}form li.error{display:block !important;background-color:#FFDFDF !important;margin-bottom:3px !important}form li label.error,form li input.error{color:#DF0000 !important;font-weight:bold !important}form li input.error{background:#fff !important;border:2px solid #DF0000 !important}form li.error label,form li.error span.symbol{color:#000 !important}form li.error .desc{color:#DF0000 !important}form p.error{display:none;margin:0 !important;padding:7px 0 0 0 !important;line-height:10px !important;font-weight:bold;font-size:11px;color:#DF0000 !important;clear:both}form li.error p.error{display:block}form li.complex p.error{padding:0 0 9px 0 !important}.rtl h1,.rtl form *{direction:rtl;text-align:right}.rtl li span{float:right}.rtl .right{float:left}.rtl #logo a{background-position:right top}.rtl label.choice{margin:-17px 23px 0 0}.rtl .leftLabel .desc,.rtl .rightLabel .desc{float:right;margin:0 0 0 15px}.rtl .leftLabel li div,.rtl .rightLabel li div{float:right}.rtl .leftLabel .desc{text-align:left}.rtl li.focused .instruct,.rtl li:hover .instruct{left:auto;right:100%}.rtl .leftLabel p.instruct,.rtl .rightLabel p.instruct{margin-right:5px}.rtl .leftLabel .altInstruct .instruct,.rtl .rightLabel .altInstruct .instruct{margin-right:31% !important;padding-right:15px}.rtl .leftLabel .buttons,.rtl .rightLabel .buttons{padding-right:23%}.rtl .leftLabel .buttons div,.rtl .rightLabel .buttons div{float:none;margin:0 20px 0 0}.noI .rtl .leftLabel .buttons,.noI .rtl .rightLabel .buttons{padding-right:31%}.noI .rtl .leftLabel .buttons div,.noI .rtl .rightLabel .buttons div{margin:0 17px 0 0}.rtl .likert td label{text-align:center}.rtl .likert caption,.rtl .likert tbody th{text-align:right}.rtl .likert td{text-align:center;border-left:none;border-right:1px solid #ccc}.rtl .pgStyle1 var{text-align:center}.rtl .pgStyle1 td{text-align:right}.rtl .pgStyle2 var{float:right}.rtl .pgStyle2 var b{float:left;padding:3px 3px 3px 10px}.rtl .pgStyle2 em{margin:0 9px 0 0}.rtl .pgStyle2 var em{padding:4px 0 3px 5px}.rtl .page1 .pgStyle2 var{padding-right:7px}.rtl .page1 .pgStyle2 b{padding-left:0}.rtl .buttons .marker{right:auto;left:0;padding:15px 0 0 10px}.rtl #errorLi *{text-align:center}</style>
					
						<form id="form1" name="form1" class="wufoo topLabel page" autocomplete="off" enctype="multipart/form-data" method="post" novalidate action="https://makermedia.wufoo.com/forms/z7x3p3/#public">
							
							<h2>Raspberry Pi Design Contest</h2>
							<p>Please look over the form below, and prepare all of your information, including images, video, and links to documentation. Only persons residing in the United States who are at least 18 years of age can enter. Please read the Official Rules for full details. Any details entered below may be used to promote the Raspberry Pi Design Contest (however your email will remain private, and will only be used to contact you regarding this contest).</p>
							
							<ul>
								<li id="foli13" class="notranslate first section"> 
								<section>
									<h3 id="title13">
										Personal Information 
									</h3>
								</section>
								</li>
								<li id="foli11" class="notranslate"> <label class="desc" id="title11" for="Field11"> Full Name <span id="req_11" class="req">*</span> </label> 
								<div>
									<input id="Field11" name="Field11" type="text" class="field text medium" value="" maxlength="255" tabindex="1" onkeyup="" required />
								</div>
								</li>
								<li id="foli9" class="notranslate"> <label class="desc" id="title9" for="Field9"> Email <span id="req_9" class="req">*</span> </label> 
								<div>
									<input id="Field9" name="Field9" type="email" spellcheck="false" class="field text medium" value="" maxlength="255" tabindex="2" required />
								</div>
								<p class="instruct" id="instruct9">
									<small>Your</small>
								</p>
								</li>
								<li id="foli10" class="notranslate"> <label class="desc" id="title10" for="Field10"> Confirm Email <span id="req_10" class="req">*</span> </label> 
								<div>
									<input id="Field10" name="Field10" type="text" class="field text medium" value="" maxlength="255" tabindex="3" onkeyup="" required />
								</div>
								</li>
								<li id="foli12" class="notranslate section"> 
								<section>
									<h3 id="title12">
										Project 
									</h3>
									<div id="instruct12">
										What's the name of your Pi project? Tell us the story of your build and the inspiration behind your idea.
									</div>
								</section>
								</li>
								<li id="foli14" class="notranslate"> <label class="desc" id="title14" for="Field14"> Title <span id="req_14" class="req">*</span> </label> 
								<div>
									<input id="Field14" name="Field14" type="text" class="field text medium" value="" maxlength="255" tabindex="4" onkeyup="" required />
								</div>
								</li>
								<li id="foli15" class="notranslate"><label class="desc" id="title15" for="Field15"> Description (500 words max, might be published) <span id="req_15" class="req">*</span> </label> 
								<div>
									<textarea id="Field15" name="Field15" class="field textarea medium" spellcheck="true" rows="10" cols="50" tabindex="5" onkeyup="validateRange(15, 'character');" required></textarea>
									<label for="Field15">Must be between <var id="rangeMinMsg15">1</var> and <var id="rangeMaxMsg15">500</var> characters.&nbsp;&nbsp;&nbsp; <em class="currently">Currently Used: <var id="rangeUsedMsg15">0</var> characters.</em></label> 
								</div>
								</li>
								<li id="foli16" class="notranslate"> 
								<fieldset>

									<![if !IE | (gte IE 8)]>
										<legend id="title16" class="desc"> Choose a category that best describes the nature of your build. <span id="req_16" class="req">*</span></legend> 
									<![endif]>
									<!--[if lt IE 8]>
										<label id="title16" class="desc">
										Choose a category that best describes the nature of your build.
										<span id="req_16" class="req">*</span>
										</label>
									<![endif]-->
									
									<div>
										<input id="radioDefault_16" name="Field16" type="hidden" value="" />
										<span> 
										<input id="Field16_0" name="Field16" type="radio" class="field radio" value="Enclosure: Raspberry Pi are bare PCBs with exposed ports. Do you have a design for a case that&#039;s more clever or cool than all the rest?" tabindex="6" checked="checked" required />
										<label class="choice" for="Field16_0"> Enclosure: Raspberry Pi are bare PCBs with exposed ports. Do you have a design for a case that's more clever or cool than all the rest?</label> </span> <span> 
										<input id="Field16_1" name="Field16" type="radio" class="field radio" value="Artistic: Use the physical computing of Raspberry Pi as a component of your music, animation, sound, performance, or art installation." tabindex="7" required />
										<label class="choice" for="Field16_1"> Artistic: Use the physical computing of Raspberry Pi as a component of your music, animation, sound, performance, or art installation.</label> </span> <span> 
										<input id="Field16_2" name="Field16" type="radio" class="field radio" value="Utility: An amazingly useful, day-to-day application for this inexpensive Linux-based computer." tabindex="8" required />
										<label class="choice" for="Field16_2"> Utility: An amazingly useful, day-to-day application for this inexpensive Linux-based computer.</label> </span> <span> 
										<input id="Field16_3" name="Field16" type="radio" class="field radio" value="Education: Show us a compelling idea for how the Pi can be utilized for education, whether in a classroom or a community workshop setting." tabindex="9" required />
										<label class="choice" for="Field16_3"> Education: Show us a compelling idea for how the Pi can be utilized for education, whether in a classroom or a community workshop setting.</label> </span> 
									</div>
								</fieldset>
								</li>
								<li id="foli18" class="notranslate section"> 
								<section>
									<h3 id="title18">
										Image Upload 
									</h3>
									<div id="instruct18">
										Please upload up to 4 images of your Pi project. Be selective with the images you choose, as they may be used to promote the Raspberry Pi Design Contest. "Image 1" will be used to represent your project in the Pi Design Contest Gallery. Limit your total image upload to 5MB.
									</div>
								</section>
								</li>
								<li id="foli1" class="notranslate "> <label class="desc" id="title1" for="Field1"> Image 1 <span id="req_1" class="req">*</span> </label> 
								<div>
									<input id="Field1" name="Field1" type="file" class="field file" size="12" tabindex="10" required />
								</div>
								<p class="instruct" id="instruct1">
									<small>(This image will be used to represent your project in the Pi Design Contest Gallery)</small>
								</p>
								</li>
								<li id="foli2" class="notranslate "> <label class="desc" id="title2" for="Field2"> Image 2 </label> 
								<div>
									<input id="Field2" name="Field2" type="file" class="field file" size="12" tabindex="11" />
								</div>
								</li>
								<li id="foli3" class="notranslate "> <label class="desc" id="title3" for="Field3"> Image 3 </label> 
								<div>
									<input id="Field3" name="Field3" type="file" class="field file" size="12" tabindex="12" />
								</div>
								</li>
								<li id="foli4" class="notranslate "> <label class="desc" id="title4" for="Field4"> Image 4 </label> 
								<div>
									<input id="Field4" name="Field4" type="file" class="field file" size="12" tabindex="13" />
								</div>
								</li>
								<li id="foli19" class="notranslate section"> 
								<section>
									<h3 id="title19">
										Documentation 
									</h3>
									<div id="instruct19">
										Do you have a blog or website where you are documenting your build process? Enter any relevant links below.
									</div>
								</section>
								</li>
								<li id="foli20" class="notranslate"><label class="desc" id="title20" for="Field20"> </label> 
								<div>
									<textarea id="Field20" name="Field20" class="field textarea small" spellcheck="true" rows="10" cols="50" tabindex="14" onkeyup="validateRange(20, 'character');"></textarea>
									<label for="Field20">Maximum Allowed: <var id="rangeMaxMsg20">500</var> characters.&nbsp;&nbsp;&nbsp; <em class="currently">Currently Used: <var id="rangeUsedMsg20">0</var> characters.</em></label> 
								</div>
								</li>
								<li id="foli21" class="notranslate section"> 
								<section>
									<h3 id="title21">
										Video Link 
									</h3>
									<div id="instruct21">
										You should demonstrate that the submission actually works as described. The best way to do that is with a video! Point us to a video URL here (ie. YouTube or Vimeo):
									</div>
								</section>
								</li>
								<li id="foli22" class="notranslate"> <label class="desc" id="title22" for="Field22"> </label> 
								<div>
									<input id="Field22" name="Field22" type="text" class="field text medium" value="" maxlength="255" tabindex="15" onkeyup="" />
								</div>
								</li>
								<li id="foli23" class="notranslate section"> 
								<section>
									<h3 id="title23">
										Twitter Name 
									</h3>
								</section>
								</li>
								<li id="foli24" class="notranslate"> <label class="desc" id="title24" for="Field24"> </label> 
								<div>
									<input id="Field24" name="Field24" type="text" class="field text medium" value="" maxlength="255" tabindex="16" onkeyup="" />
								</div>
								</li>
								<li class="buttons "> 
								<div>
									<input id="saveForm" name="saveForm" class="btn btn-primary submit" type="submit" value="Submit" />
								</div>
								</li>
								<li class="hide"> <label for="comment">Do Not Fill This Out</label> 
								<textarea name="comment" id="comment" rows="1" cols="1"></textarea>
								<input type="hidden" id="idstamp" name="idstamp" value="aN7kpfwI9/xi5Nweo0gSThp8lnPya7vZHsXGrDykov8=" />
								</li>
							</ul>
						</form>

					</div>
					
					<div class="tab-pane" id="rules">
						
						<h2>Raspberry Pi Design Contest</h2>
						<h3>OFFICIAL RULES</h3>

						<p>This promotion is intended for play and participation in the United States only and shall be construed and evaluated according to the laws of the United States. Please do not participate if you are not a legal resident of the United States at the time of entry.</p>

						<p>NO PURCHASE NECESSARY TO ENTER OR TO WIN.  A PURCHASE WILL NOT INCREASE YOUR CHANCE OF WINNING. CONTEST OPEN ONLY TO LEGAL RESIDENTS OF THE 50 UNITED STATES AND DISTRICT OF COLUMBIA WHO ARE OF THE AGE OF MAJORITY IN THEIR STATE OF RESIDENCE AT THE TIME OF ENTRY (19 OR OLDER IN AL AND NE, 18 OR OLDER IN ALL OTHER STATES). VOID OUTSIDE THE UNITED STATES AND WHERE OTHERWISE PROHIBITED BY LAW.</p>

						<p>Important: Please read these Official Rules before entering the Raspberry Pi Design Contest (the "Contest") sponsored by Maker Media, Inc. and MCM Electronics (each a “Sponsor”, and collectively “Sponsors”).   </p>

						<ol>
						<li><p><strong>BINDING AGREEMENT</strong>: In order to enter the Contest, you must agree to these Official Rules (“Rules”).  The Rules consist of the terms and conditions on this page and the Contest Entry Form.  Because you will be bound by these Rules and these Rules will form a legally binding agreement with respect to this Contest, please read them carefully. You may not submit an Entry (as defined in Section 3 below) unless you agree to these Rules.  You agree that participation in this Contest and/or submission of an Entry in the Contest constitutes your full and unconditional agreement to these Rules and Sponsors' decisions, which are final and binding in all matters related to the Contest. </p></li>
						<li><p><strong>ELIGIBILITY</strong>: Contest open to legal residents of the 50 United States and the District of Columbia who are of the age of majority in their state of residence (19 or older in AL and NE, 18 or older in all other states) at the time of entry. Employees, directors and officers of Sponsors, their respective subsidiaries, affiliates, distributors, retailers, contractors, agents, advertising and promotional agencies, and members of their immediate family (spouse, parents, children, sibling and their respective spouse) are not eligible to participate.  Void outside of the United States and where otherwise prohibited by law.  Contest is subject to all applicable federal, state and local laws and regulations.   </p></li>
						<li><p><strong>HOW TO ENTER</strong>:  Contest begins at 12:01 a.m. PDT on March 14, 2013 and will end at 11:59 p.m. PDT on April 11, 2013 (the “Contest Period”).  During the Contest Period, participants have the opportunity to submit a Raspberry Pi project.Each entry should use the Raspberry Pi as an intrinsic part of the project, but may include other circuitry, software, mechanical, or sculptural parts as needed. To enter the Contest, please visit the Contest landing page at blog.makezine.com/raspberry-pi-design-contest and submit the Contest Entry Form. As part of entering the Contest, you will be required to select one of the following four categories, which best reflects the nature of your project. The four categories are Artistic, Utility, Enclosure, and Education. The Contest Entry Form, the Project and any other documentation and materials submitted in connection with the Contest will together constitute your entry and are collectively hereinafter referred to as “Entry”.  Automated Entries are prohibited, and any use of automated devices will cause disqualification.  You may enter as many times as you wish, but please do not submit duplicate or substantially similar Projects.  Entries must be received by 11:59 p.m. PDT on April 11, 2013 to be eligible for the Contest. <br>
						All Entries become the property of Sponsors and none will be returned. Should multiple users of the same e-mail account enter the Contest and a dispute thereafter arise regarding the identity of the contestant, the contestant shall be deemed to be the Authorized Account Holder.  “Authorized account holder” is defined as the natural person who is assigned an e-mail address by an Internet access provider, on-line service provider or other organization which is responsible for assigning e-mail addresses or the domain associated with the submitted e-mail address. Please see the privacy policy located at http://makermedia.com/privacy/ for details of Sponsor's policy regarding the use of personal information collected in connection with this Contest.  Email addresses obtained through the Contest will only be used by Sponsors to notify the winners and contestants of the Contest results, unless contestants elect to “opt in” to a particular use of his/her email address when submitting the Contest Entry Form.  Entries must be in English. Each Entry must be the original work of the submitting contestant; created solely by the submitting contestant, must not have been submitted in any other contest and won previous awards; must not have been previously published or marketed; must not infringe third-party rights of any third party, including but not limited to copyright, trademark and right of privacy and publicity, and must be suitable for publication (i.e., not be obscene or indecent). </p></li>
						<li><p><strong>WINNERS SELECTION</strong>:  All Entries will be judged by a qualified panel of 4 judges selected by Sponsors based on the following judging criteria: 
						(a) Unique Application: 40%: novel use of the Pi. 
						(b) Documentation: 30%: supporting material such as a blog, Flickr set of photos, YouTube video, etc.
						(c) Project Success: 30%: did your project achieve its goal? </p>

						<p>Contestants will submit their entry to one of the following four categories: Enclosure, Artistic, Utility, or Education. One winner will be selected from each category. Additionally, one Grand Prize Winner will be selected as best overall project.</p>

						<p>The contestant with the Entry with the highest total score among all judging criteria will be the potential Grand Prize Winner, subject to verification. The next contestant with the Entry with the next highest total score in each category will be the Category Prize Winner. The Grand Prize Winner, the Category Prize Winners are collectively hereinafter referred to as “Winners”.  In the event of a tie, tie breaker will be based upon the highest score in the first judging criteria, continuing thereafter to each judging criteria in order, as needed, to break the tie.  The decisions of the judging panel will be issued no later than April 25, 2013, and will be final and binding on all matters relating to the Contest. </p></li>
						<li><p><strong>WINNER NOTIFICATION</strong>: Each Winner will be notified by email on or before April 25, 2013. Sponsors are not responsible for any change of contestant's email address. Any prize or prize notification returned as undeliverable or otherwise not claimed within seven (7) days after notification of prize award will be forfeited and awarded to an alternate winner. Each Winner may be required to execute and return an affidavit of eligibility and publicity, liability and other release within seven (7) days of notification attempt or prize will be forfeited and an alternate Winner will be selected.</p></li>
						<li><p><strong>PRIZES</strong>: One (1) Grand Prize Winner, and four (4) Category Prize Winners will receive the following:</p>

						<ul>
						<li>Grand Prize (1):  Grand Prize Winner will receive one Printrbot Jr 3D Printer (Assembled), one USB DMM, one DC Power Supply, one Digital Soldering Iron, one Gertboard, one Pi Face, one Pi View, one Wi-Pi Wireless Adapter, and one Raspberry Pi Iron-On Skill Badge. Total estimated retail value of Grand Prize is $1,114.91.</li>
						<li>Category Prize (4):  Category Prize Winners will receive one USB DMM, one DC Power Supply, one Digital Soldering Iron, one Gertboard, one Pi Face, one Pi View, one Wi-Pi Wireless Adapter, and one Raspberry Pi Iron-On Skill Badge. Total estimated retail value of each Category Prize is $615.91.</li>
						</ul>

						<p>Estimated total value of all prizes: US $3,578.55.  All prizes amounts are in US dollars.  All prizes will be awarded, provided they are properly claimed.  Prizes are not transferable.  No cash redemptions.  No substitutions or exchanges of the prizes will be permitted, except that Sponsors reserve the right to substitute a prize of equal or greater value for any prize that becomes unavailable. The prizes are awarded "as is" and without warranty of any kind, express or implied, (including, without limitation, any implied warranty of merchantability or fitness for a particular purpose). Acceptance or use of prize is at Winners' own risk.  All federal, state, and local taxes are the responsibility of the Winners. Limit one prize per household.</p></li>
						<li><p><strong>GENERAL CONDITIONS FOR PARTICIPATION</strong>:  By submitting an Entry, you represent and warrant that:  you are the sole owner of all rights in and to the materials that constitute your Entry; your Entry is your original work; you are the photographer of any photos submitted, videographer of any videos submitted, and the author of any written materials submitted; your Entry does not violate laws prohibiting copyright or trademark infringement, defamation, misuse of trade secrets, invasion of privacy, or other laws; and use of your Entry by Sponsors will not infringe on the rights of any third parties.   By submitting an Entry, you grant Sponsors and their agents the irrevocable and perpetual nonexclusive right to print, publish, reproduce, distribute, modify, create derivative works from, promote, and provide access to any such Entry, in all media throughout the world, and without consideration to you.  By submitting an Entry, you agree that your submission is gratuitous and made without restriction and will not place Sponsors under any obligation, and that Sponsors are free to disclose or otherwise disclose the ideas contained in the Entry on a non-confidential basis to anyone or otherwise use the ideas without any additional compensation to you. You acknowledge that, by accepting your Entry, Sponsors do not waive any rights to use similar or related ideas previously known to Sponsors, or developed by their employees, or obtained from sources other than you.   Except where prohibited by law, by submitting an Entry into the Contest, you authorize Sponsors and their agents, to use your name, likeness, Entry submission materials, and/or Prize information, in any and all media without territorial or time limitation, for any advertising, promotional, or any other purpose related to the Contest, without further compensation to, or permission from, you.</p></li>
						<li><p><strong>LIMITATION OF LIABILITY</strong>:  Sponsors and any of their respective parent companies, subsidiaries, affiliates, directors, officers, professional advisors, employees, and agencies will not be responsible for (1) any late, lost, or misrouted entries or errors in transmission; (2) any disruptions to Internet connection, injuries, losses, or damages caused by events beyond the control of Sponsors; or (3) any printing or typographical errors in any materials associated with the Contest.  Sponsors and their agencies are not responsible for technical, hardware, software, or telephone malfunctions of any kind and shall not be liable for failed, incorrect, incomplete, inaccurate, garbled, or delayed electronic communications utilized in this Contest which may limit the ability to participate in the Contest. If for any reason, including infection by computer virus, bugs, tampering, unauthorized intervention, fraud, technical failures, or any other cause beyond the control of Sponsors, which corrupts or affects the administration, security, fairness, integrity, or proper conduct of this Contest, the Contest is not capable of being conducted as described in these rules, Sponsors shall have the right, at their sole discretion, to modify and/or cancel the Contest.  By entering the Contest, submitting an Entry and/or accepting a prize, you release Sponsors and any of their respective parent companies, subsidiaries, affiliates, directors, officers, employees, and agencies (collectively, the "Released Parties") from any liability whatsoever, and waive any and all causes of action, for any claims, costs, injuries, losses, or damages of any kind arising out of or in connection with the Contest or acceptance, possession, use and/or misuse of any prize (including, without limitation, claims, costs, injuries, losses, and damages related to personal injuries, death, damage to or destruction of property, rights of publicity or privacy, defamation or portrayal in a false light, whether intentional or unintentional) whether under a theory of contract, warranty, tort (including negligence, whether active, passive, or imputed), strict liability, product liability, contribution, or any other theory.</p></li>
						<li><p><strong>GOVERNING LAW</strong>: The Contest will be governed, construed, and interpreted under the laws of the United States.  Participants who violate these Rules, tamper with the operation of the Contest, or engage in any conduct that is detrimental to Sponsors, the Contest, or any other participant (as determined in Sponsors' sole discretion) are subject to disqualification. By entering the Contest, you agree that all issues and questions concerning the construction, validity, interpretation and enforceability of these Rules, your rights and obligations, or the rights and obligations of the Sponsors in connection with the Contest, shall be governed by, and construed in accordance with, the laws of State of California, without giving effect to any choice of law or conflict of law rules (whether of the State of California or any other jurisdiction), which would cause the application of the laws of any jurisdiction other than the State of California.  Participants further consent to the jurisdiction and venue of the federal, state and local courts located in San Francisco, California.</p></li>
						<li><p><strong>WINNER'S LIST</strong>: A list of Winners will be posted at blog.makezine.com/raspberry-pi-design-contest for a period of six months after the end of the Contest.</p></li>
						<li><p><strong>SPONSORS' ADDRESS</strong>:  </p>

						<ul>
						<li>Maker Media, Inc., 1005 Gravenstein Hwy N., Sebastopol, CA 95472.</li>
						<li>MCM Electronics, 650 Congress Park Drive, Centerville, OH 45459. </li>
						</ul></li>
						</ol>

						<p>The Contest and all accompanying materials are copyright © 2013 Maker Media Media, Inc. <br>
						The MAKE logo is a registered trademark of Maker Media, Inc. All other trademarks are property of their respective owners.</p>
						</body>
						
					</div>
					
					<div class="tab-pane" id="gallery">
						
						<article <?php post_class(); ?>>

							<?php the_content(); ?>
							
							<script type="text/javascript">
								
								jQuery(document).ready(function(){
									jQuery('a[data-toggle="tab"]').on('shown', function (e) {
										jQuery('.gallery-row, .gallery-group, article a img').css('height', '').css('width', '');
									})
								});

							</script>
					
						</article>
						
					</div>
				</div>
			</div>
									
			<div class="row">
			
				<div class="span12">
					
					<?php endwhile; ?>

					<?php else: ?>
					
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					
					<?php endif; ?>
				
				</div>
					
			</div>

		</div>

	</div>
	
<script>

	jQuery('a[data-toggle="tab"]').on('shown', function (e) {
		googletag.pubads().refresh();
		_gaq.push(['_trackPageview']);
		console.log('Pushed a pageview, and an ad refresh, like a boss.');
	});

</script>

<?php get_footer(); ?>