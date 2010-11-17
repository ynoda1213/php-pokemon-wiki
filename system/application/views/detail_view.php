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
            -webkit-tap-highlight-color:rgba(0,0,0,0);
        }
        #normal {
            margin: 0;
            padding: 0;
			background: #C8C8C8 url(../../img/pinstripes.png);        	
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
        #normal div#detail {
        	background-color: #fff;
            -webkit-border-radius: 10;
            padding: 10px;
            border: 1px solid #B4B4B4;
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
    <!-- Set a hidden value and submit searchByTypeForm -->
	<script language="javascript">
		function searchByType(type) {
			if(type) {
				document.searchByTypeForm.hiddenType.value = type;
			}
		document.searchByTypeForm.submit();
		}
	</script>    
</head>
<body id="normal">
	<h1><a style="text-decoration:none;color:white;" href="<?=base_url()?>index.php">BWポケモン考察(α)</a></h1>
    <a id="homeButton" class="button" href="javascript:history.back();">戻る</a> 
    <?php if($detail): ?>
		<?php foreach($detail as $row): ?>
			<div id="detail"><?=$row?></div>
		<?php endforeach; ?>
	<?php else: ?>
		<div id="detail">エラーのため表示できませんでした。改善に向け作業中です... :-(</div>
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