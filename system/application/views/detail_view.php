<?=$header?>
	<div id="navBar">
		<h1><a href="<?=base_url()?>index.php"><?=$heading?></a></h1>
    	<a id="homeButton" class="button" href="javascript:history.back();">戻る</a> 
		<a class="button" href="javascript:void(0)" onClick="document.getElementById('searchForm').style.display='block';document.getElementById('searchForm').word.focus();">Search</a>
	</div>
	
	<div id="main" style="border-bottom: 1px solid #B4B4B4;">
		<div id="detail">
		<?php $c = 0; ?>
		<?php foreach($contents as $content): ?>
			<?php if($content != '<br />'): ?>
				<?php if($c != 0): ?>
				<center><img class="break" src="../../../../system/img/monsterballbar.gif" alt="monsterballbar" width="100px" height="18px" /></center>
				<?php endif; ?>
			<p><?=$content?></p>
			<?php endif; ?>
		<?php $c++; ?>
		<?php endforeach; ?>
		</div>
<?=$footer?>