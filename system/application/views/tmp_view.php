<?=$header?>
	<div id="navBar">
		<h1><a href="<?=base_url()?>index.php"><?=$title?></a></h1>
    	<a id="homeButton" class="button" href="javascript:history.back();">戻る</a> 
		<a class="button" href="javascript:void(0)" onClick="document.getElementById('searchForm').style.display='block';document.getElementById('searchForm').word.focus();">Search</a>
	</div>
	
	<div id="main">
		<div class="sections" id="list">
			<h3 class="textLabels"><?=$types?></h3>
			<ul>
			<?php foreach($choices as $choice): ?>
				<li><?=$choice?></li>
			<?php endforeach; ?>
			</ul>
		</div>
<?=$footer?>