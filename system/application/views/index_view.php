<html>
<head>
	<title>Pokemon Wiki</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, 
                                   maximum-scale=1.0, width=device-width">
	<style type="text/css" media="screen">@import "../css/iphonenav.css";</style>
    <style type="text/css">
	h1 {
	    box-sizing: border-box;
	    margin: 0;
	    padding: 10px;
	    line-height: 20px;
	    font-size: 20px;
	    font-weight: bold;
	    text-align: center;
	    text-shadow: rgba(0, 0, 0, 0.6) 0px -1px 0;
	    text-overflow: ellipsis;
	    color: #FFFFFF;
	    background: url(img/iPhoneToolbar.png) #6d84a2 repeat-x;
	    border-bottom: 1px solid #2d3642;
	}
    	/* Wiki section */
        ul {
            color: black;
            background: #fff;
            border: 1px solid #B4B4B4;
            font: bold 15px Helvetica;
            padding: 0;    
            margin: 15px 10px 17px 0;
            -webkit-border-radius: 8px;
        }
        ul li {
            color: #aaa;
            border-top: 1px solid #B4B4B4;
            list-style-type: none;  
            padding: 8px 10px 8px 10px;
        }
        li:first-child {    
            border-top: 0;
            -webkit-border-top-left-radius: 8px;
            -webkit-border-top-right-radius: 8px;
            background: #8B8B88 url(img/firstchildbg.png) repeat-x 0px 1px;
            color: white;
            padding: 3px 10px 2px;
            text-shadow: #666 0px 1px 0px;
        }
        li:first-child a {
            color: #FFF;
        }
        li:last-child { 
            -webkit-border-bottom-left-radius: 8px;
            -webkit-border-bottom-right-radius: 8px;
        }
        ul li a {
            color: #000;
            text-decoration: none;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            display: block;
            padding: 12px 10px 12px 10px;
            margin: -10px;
    		background: url(img/iPhoneArrow.png) no-repeat right center;
            -webkit-tap-highlight-color:rgba(91, 166, 255, 0.5000);
            font-size: 16px;            
        }
        #normal {
            margin: 0;
            padding: 0;
            background-color: rgb(255,255,255);
        }
        #normal h2 {
            color: #555;
            background: #fff;
            font: bold 25px Helvetica;
            padding: 0;
            padding-left: 10px;
            margin: 15px 10px 17px 10px;
            -webkit-border-radius: 8px;
        }
        #normal p {
            color: black;
/*             background: #fff; */
        	margin: 10px;
        }
        #normal table {
        	padding-left: 10px;
        }
        #normal ul {
            -webkit-border-radius: 0;
            margin: 0;
            border-left: 0;
            border-right: 0;
            border-top: 0;
        }
        #normal ul li {
            font-size: 20px;
        }
        #normal li {
            -webkit-border-radius: 0;
        }
        /* Category section */
        div{
            margin:10px;
        }
        div#category {
        	margin-bottom: 20px;
        }
        div.flt{
            float:left;
            border:1px solid #555555;
            font-size: 11px;
            width: 53px;
            height: 53px;
            color:#ffffff;
            font-weight: bold;
            -webkit-border-radius: 8px;
        }
        div a {
        	text-decoration: none;
        	text-align: center;
        	line-height: 55px;
        }
        #homeButton {
        	-webkit-border-image: url(img/iPhoneBackButton.png) 0 8 0 14 stretch stretch;
        	border-width: 0px 8px 0px 14px;
        	left: 6px;
        	right: auto;
        }
		.button {
		    position: absolute;
		    top: 8px;
		    right: 6px;
		    -webkit-border-image: url(img/iPhoneButton.png) 0 5 0 5;
		    -webkit-border-radius: 0;
		    border-width: 0 5px 0 5px;
		    padding: 0;
		    height: 28px;
		    line-height: 28px;
		    font-size: 12px;
		    font-weight: bold;
		    color: #FFFFFF;
		    text-shadow: rgba(0, 0, 0, 0.6) 0px -1px 0;
		    text-decoration: none;
		    background: none;
		}
		#footer {
			text-align: center;
			background: #C8C8C8 url(img/pinstripes.png);
			margin: 0;
			padding: 0;
            border-top: 1px solid #B4B4B4;
		}
		form {
			margin-bottom: 0;
		}
    </style>
    <!-- Set a hidden value and submit setHiddenValueForm -->
	<script language="javascript">
		function searchByURL(type) {
			if(type) {
				document.searchByURLForm.hiddenType.value = type;
			}
		document.searchByURLForm.submit();
		}
	</script>    
    <!-- Set a hidden value and submit setHiddenValueForm -->
	<script language="javascript">
		function setHiddenValue(type) {
			if(type) {
				document.setHiddenValueForm.hiddenType.value = type;
			} else {
				document.setHiddenValueForm.hiddenType.value = 0;			
			}
		document.setHiddenValueForm.submit();
		}
	</script>    
</head>
<body id="normal">
	<h2>ポケモン第五世代・対戦考察まとめwiki</h2>

	<!-- Display the description -->
	<ul>
		<li style="font-size: 13px;">タイプ別で探す</li>	
	</ul>
	
	<!-- List options -->
	<?=form_open('blog/search_type', array('name' => 'setHiddenValueForm'));?>
		<div>
	        <a href="javascript:void(0)" onclick="setHiddenValue(57);"><div class="flt" style="background-color:#c9c9c9;">ノーマル</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(58);"><div class="flt" style="background-color:#ff8000;">ほのお</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(59);"><div class="flt" style="background-color:#0080ff;">みず</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(60);"><div class="flt" style="background-color:#ffe60e;">でんき</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(61);"><div class="flt" style="background-color:#02ea0f;">くさ</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(62);"><div class="flt" style="background-color:#66ffff;">こおり</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(63);"><div class="flt" style="background-color:#ff0000;">かくとう</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(64);"><div class="flt" style="background-color:#c000f0;">どく</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(65);"><div class="flt" style="background-color:#eec815;">じめん</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(66);"><div class="flt" style="background-color:#7f9eee;">ひこう</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(67);"><div class="flt" style="background-color:#ff6fcf;">エスパー</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(68);"><div class="flt" style="background-color:#a6d747;">むし</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(69);"><div class="flt" style="background-color:#a07718;">いわ</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(70);"><div class="flt" style="background-color:#6865cb;">ゴースト</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(71);"><div class="flt" style="background-color:#004080;">ドラゴン</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(72);"><div class="flt" style="background-color:#333333;">あく</div></a>
	        <a href="javascript:void(0)" onclick="setHiddenValue(73);"><div class="flt" style="background-color:#7f9ba8;">はがね</div></a>
	        <input type="hidden" name="hiddenType" />
		</div>
	</form>
	
	<?=form_open('blog/search_no', array('name' => 'searchByURLForm', 'style' => 'clear:both;'));?>
	<ul>
		<li style="font-size: 13px;">最近更新されたページ : <?=$date?></li>
		<?php foreach($recents as $recent): ?>
			<?php if(substr(trim(strip_tags($recent->innertext)),0,3) == '格'): ?>
				<li style="font-size: 16px;padding-top:10px;padding-bottom:10px;padding-left:12px;padding-right:12px;"><?=strip_tags($recent->innertext)?></li>
			<?php elseif(substr(trim(strip_tags($recent->innertext)),0,3) == '要'): ?>
				<li style="font-size: 16px;padding-top:10px;padding-bottom:10px;padding-left:12px;padding-right:12px;"><?=strip_tags($recent->innertext)?></li>
			<?php elseif(substr(trim(strip_tags($recent->innertext)),-12,12) == 'グループ'): ?>
				<li style="font-size: 16px;padding-top:10px;padding-bottom:10px;padding-left:12px;padding-right:12px;"><?=strip_tags($recent->innertext)?></li>
			<?php elseif(substr(trim(strip_tags($recent->innertext)),-3,3) == '覧'): ?>
				<li style="font-size: 16px;padding-top:10px;padding-bottom:10px;padding-left:12px;padding-right:12px;"><?=strip_tags($recent->innertext)?></li>
			<?php elseif(substr(trim(strip_tags($recent->innertext)),0,9) == 'データ'): ?>
				<li style="font-size: 16px;padding-top:10px;padding-bottom:10px;padding-left:12px;padding-right:12px;"><?=strip_tags($recent->innertext)?></li>
			<?php elseif(substr(trim(strip_tags($recent->innertext)),-12,12) == 'パーティ'): ?>
				<li style="font-size: 16px;padding-top:10px;padding-bottom:10px;padding-left:12px;padding-right:12px;"><?=strip_tags($recent->innertext)?></li>
			<?php elseif(substr(trim(strip_tags($recent->innertext)),-3,3) == '察'): ?>
				<li style="font-size: 16px;padding-top:10px;padding-bottom:10px;padding-left:12px;padding-right:12px;"><?=strip_tags($recent->innertext)?></li>
			<?php elseif(substr(trim(strip_tags($recent->innertext)),0,3) == '終'): ?>
				<li style="font-size: 16px;padding-top:10px;padding-bottom:10px;padding-left:12px;padding-right:12px;"><?=strip_tags($recent->innertext)?></li>
			<?php elseif(substr(trim(strip_tags($recent->innertext)),-12,12) == 'ポケモン'): ?>
				<li style="font-size: 16px;padding-top:10px;padding-bottom:10px;padding-left:12px;padding-right:12px;"><?=strip_tags($recent->innertext)?></li>
			<?php elseif(substr(trim(strip_tags($recent->innertext)),0,6) == '編集'): ?>
				<li style="font-size: 16px;padding-top:10px;padding-bottom:10px;padding-left:12px;padding-right:12px;"><?=strip_tags($recent->innertext)?></li>
			<?php elseif(substr(trim(strip_tags($recent->innertext)),-3,3) == '表'): ?>
				<li style="font-size: 16px;padding-top:10px;padding-bottom:10px;padding-left:12px;padding-right:12px;"><?=strip_tags($recent->innertext)?></li>
			<?php else: ?>
				<?php
					echo str_replace('http://www14.atwiki.jp/bwpokekousatsu/pages/','javascript:void(0)" onclick="searchByURL(',str_replace('.html', ')',str_replace('<div>','',str_replace('</div>','',$recent))));
				?>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
	<input type="hidden" name="hiddenType" />
	</form>

	<div id="footer">
		<p>表示：Mobile | <a href="http://www14.atwiki.jp/bwpokekousatsu/" target="_blank">PC</a> | その他リンク等</p>
		<br />
		<br />
	</div>
    
    <script type="text/javascript">
        window.addEventListener("load",
                function(){
                    setTimeout(function(){
                        scrollTo(0,1);
                        scrollTo(0,0);
                    },100);
                },
        false);
    </script>	
</body>
</html>