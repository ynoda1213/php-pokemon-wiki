<?=$header?>
	<div id="navBar">
		<h1><a href="<?=base_url()?>index.php">対戦考察 - <?=$name?></a></h1>
    	<a id="homeButton" class="button" href="javascript:history.back();">戻る</a> 
		<a class="button" href="javascript:void(0)" onClick="document.getElementById('searchForm').style.display='block';document.getElementById('searchForm').word.focus();">Search</a>
	</div>
	
	<div id="main" style="border-bottom: 1px solid #B4B4B4;">
		<div id="title">
			<h2><?=$name?></h2>
		</div>
		
		<div id="info">
			<p><?=$description?></p>
			<table><?=$status?></table>
		</div>
	
		<div class="sections" id="outline">
			<h3 class="textLabels">型候補</h3>
			<ul>
				<?php foreach($tactics as $tactic): ?>
				<li><?=$tactic?></li>
				<?php endforeach; ?>
			</ul>
			<h3 class="textLabels">覚える技</h3>
			<ul>
				<?php foreach($skills as $skill): ?>
				<li><?=$skill?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		
		<div id="abstract">
				<?php $c = 0; ?>
				<?php foreach($abstract as $paragraph): ?>
					<?php if($c != 0): ?>
					<center><img class="break" src="../../../system/img/monsterballbar.gif" alt="monsterballbar" width="100px" height="18px" /></center>
					<?php endif; ?>
					<p><?=$paragraph?></p>
				<?php $c++; ?>
				<?php endforeach; ?>
		</div>
<?=$footer?>