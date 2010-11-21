<html>
<head>
	<title>Pokemon Wiki</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, 
                                   maximum-scale=1.0, width=device-width">
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
	    background: url(../../img/iPhoneToolbar.png) #6d84a2 repeat-x;
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
            font-size: 13px;
        }
        li:first-child {    
            border-top: 0;
            -webkit-border-top-left-radius: 8px;
            -webkit-border-top-right-radius: 8px;
            background: #8B8B88 url(../../img/firstchildbg.png) repeat-x 0px 1px;
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
    		background: url(../../img/iPhoneArrow.png) no-repeat right center;
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
		form {
			margin-bottom: 0;
		}
    </style>
    <!-- Set a hidden value and submit searchByTypeForm -->
	<script language="javascript">
		function searchByURL(type) {
			if(type) {
				document.searchByURLForm.hiddenType.value = type;
			}
		document.searchByURLForm.submit();
		}
	</script>    
</head>
<body id="normal">
	<h1><a style="text-decoration:none;color:white;" href="<?=base_url()?>index.php">BWポケモン考察(α)</a></h1>
    <a id="homeButton" class="button" href="javascript:history.back();">戻る</a> 
	
	<?=form_open('blog/search_no', array('name' => 'searchByURLForm'));?>
	
	<!-- List options part2 -->
	<?php if($types): ?>
		<?php $m = 0; ?>
		<?php foreach($types as $type): ?><ul>
		<?php if(substr(trim(strip_tags($type)),0,3) != 'タ'): ?>
		<li style="font-size:13px;text-align:left;color:#fff;"><?=$type->innertext?></li>
			<?php
			$tmp = explode(' /', $choices[$m]);
			foreach($tmp as $choice) {
				echo "<li style=\"text-align:left;\">".str_replace('http://www14.atwiki.jp/bwpokekousatsu/pages/','javascript:void(0)" onclick="searchByURL(',str_replace('.html', ')',str_replace('<div>','',str_replace('</div>','',$choice))))."</li>\n";
			}
			?>
		<?php $m++ ?>
		<?php endif; ?>
		</ul><?php endforeach; ?>
	<?php endif; ?>
	<input type="hidden" name="hiddenType" />
	</form>	
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