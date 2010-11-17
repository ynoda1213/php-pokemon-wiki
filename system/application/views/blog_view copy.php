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
	    background: url(../../img/iPhoneToolbar.png) #6d84a2 repeat-x;
	    border-bottom: 1px solid #2d3642;
	}
    	/* Wiki section */
        ul {
            color: black;
            background: #fff;
            border: 1px solid #B4B4B4;
            font: bold 17px Helvetica;
            padding: 0;    
            margin: 15px 10px 17px 0;
            -webkit-border-radius: 8px;
        }
        ul li {
            color: #aaa;
            border-top: 1px solid #B4B4B4;
            list-style-type: none;  
            padding: 10px 10px 10px 10px;
        }
        li:first-child {    
            border-top: 0;
            -webkit-border-top-left-radius: 8px;
            -webkit-border-top-right-radius: 8px;
            background: #333;
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
    		background: url(../../img/iPhoneArrow.png) no-repeat right center;
            -webkit-tap-highlight-color:rgba(91, 166, 255, 0.5000)
        }
        #normal {
            margin: 0;
            padding: 0;
            background-color: rgb(255,255,255);
        }
        #normal h2 {
            color: #555;
            background: #fff;
            border: 1px solid #B4B4B4;
            font: bold 25px Helvetica;
            padding: 0;
            padding-left: 10px;
            margin: 15px 10px 17px 10px;
            -webkit-border-radius: 8px;
        }
        #normal p {
            color: black;
            background: #fff;
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
        	-webkit-border-image: url(../../img/iPhoneBackButton.png) 0 8 0 14 stretch stretch;
        	border-width: 0px 8px 0px 14px;
        	left: 6px;
        	right: auto;
        }
		.button {
		    position: absolute;
		    top: 8px;
		    right: 6px;
		    -webkit-border-image: url(iPhoneButton.png) 0 5 0 5;
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
    </style>
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
	<h1><a style="text-decoration:none;color:white;" href="<?=base_url()?>index.php">BWポケモン考察(α)</a></h1>
    <a id="homeButton" class="button" href="javascript:history.back();">戻る</a> 

	<!-- Display Pokemon name -->
	<h2><?php if($name): ?>
		<?php echo $name; ?>
	<?php endif; ?></h2>

	<!-- Display the description -->
	<p><?php if($description): ?>
		<?php echo $description; ?>
	<?php endif; ?></p>

	<!-- Display table -->
	<?php if($status[0]) echo $status[0]; ?>
	
	<!-- List options -->
	<?php if($outline): ?>

		<?php if(isset($outline_headers)): // h2タグがついたデータの処理 ?>
			<ul><?php foreach($outline_headers as $header): ?>
				<li><?php echo trim($header->innertext); ?></li>
			<?php endforeach; ?></ul>
		<?php endif; ?>
		
		<?php if(isset($tactics)): // h3タグで「型」がついたデータの処理 ?>
			<?php $num = 0; // hiddenタイプの引数設定 ?>
			<?=form_open('blog/show_detail', array('name' => 'setHiddenValueForm'));?>
				<ul><?php foreach($tactics as $tactic): // 変数$staticsの展開 ?>
					<?php if(substr(trim($tactic->innertext),-3,3) == "型"): ?>
						<li style="background:#fff;"><a style="color:#000;" href="javascript:void(0)" onclick="setHiddenValue(<?=$num?>);">
						<?php echo trim($tactic->innertext); ?></a></li>
					<?php endif; ?>
					<?php $num++ // インクリメント ?>
				<?php endforeach; ?></ul>
		        <input type="hidden" name="hiddenType" />
		        <input type="hidden" name="page" value="<?=$page?>" />
			</form>
		<?php endif; ?>
	
	<?php else: ?>
		<p style="color:red;">※見出しを正常に取得できませんでした。本家サイトに存在しない可能性があります。</p>
		<?php return; // 一時的に強制終了 ?>
	<?php endif; ?>

	<!-- Display abstract -->
	<?php if(isset($abstract)): ?>
		<?php foreach($abstract as $paragraph): ?>

			<!-- $paragraph内部に"<!--"の並びの文字列を見つけるとループ終了 -->
			<?php if(substr(trim($paragraph->innertext),0,4) != "<!--"): ?>
				<p><?=$paragraph->innertext?></p>
			<?php else: ?>
				<?php break; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>

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