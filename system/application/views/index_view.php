<?=$header?>
	<div id="navBar">
		<h1>BWポケモン考察(α)</h1>
		<a class="button" href="javascript:void(0)" onClick="document.getElementById('searchForm').style.display='block';document.getElementById('searchForm').word.focus();">Search</a>
	</div>

	<div id="main">
		<div id="menu">
			<h3 class="textLabels" id="heading">タイプ別で探す</h3>
			<ul>
				<li><a href="index.php/search/type/57">ノーマル</a></li>
				<li><a href="index.php/search/type/58">ほのお</a></li>
				<li><a href="index.php/search/type/59">みず</a></li>
				<li><a href="index.php/search/type/60">でんき</a></li>
				<li><a href="index.php/search/type/61">くさ</a></li>
				<li><a href="index.php/search/type/67">エスパー</a></li>
				<li><a href="index.php/search/type/63">かくとう</a></li>
				<li><a href="index.php/search/type/64">どく</a></li>
				<li><a href="index.php/search/type/65">じめん</a></li>
				<li><a href="index.php/search/type/66">ひこう</a></li>
				<li><a href="index.php/search/type/71">ドラゴン</a></li>
				<li><a href="index.php/search/type/68">むし</a></li>
				<li><a href="index.php/search/type/69">いわ</a></li>
				<li><a href="index.php/search/type/70">ゴースト</a></li>
				<li><a href="index.php/search/type/62">こおり</a></li>
				<li><a href="index.php/search/type/73">はがね</a></li>
				<li><a href="index.php/search/type/72">あく</a></li>
			</ul>
		</div>
		
		<div id="menu2">
			<h3 class="textLabels">なまえ別で探す</h3>
			<ul>
				<li><a href="index.php/search/name/13/17">あ</a></li>
				<li><a href="index.php/search/name/18/22">か</a></li>
				<li><a href="index.php/search/name/23/27">さ</a></li>
				<li><a href="index.php/search/name/28/32">た</a></li>
				<li><a href="index.php/search/name/33/37">な</a></li>
				<li><a href="index.php/search/name/38/42">は</a></li>
				<li><a href="index.php/search/name/43/47">ま</a></li>
				<li><a href="index.php/search/name/48/50">や</a></li>
				<li><a href="index.php/search/name/51/55">ら</a></li>
				<li><a href="index.php/search/name/56/56">わ</a></li>
			</ul>
		</div>

		<div class="sections" id="update">
			<h3 class="textLabels">最近更新されたページ : <?=$date?></h3>
			<ul>
			<?php foreach($recents as $recent): ?>
				<li><?=$recent?></li>
			<?php endforeach; ?>
			</ul>
		</div>
<?=$footer?>