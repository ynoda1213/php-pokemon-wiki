			<form id="searchForm" class="dialog" action="<?=base_url()?>index.php/search/do_search" method="post"> 
		        <fieldset> 
		            <h1>wiki内検索</h1> 
			    	<a class="cancelButton" href="javascript:void(0)" onclick="document.getElementById('searchForm').style.display='none';">Close</a> 
		            <a class="button toolButton goButton" href="javascript:void(0)" onclick="document.getElementById('searchForm').submit();">Search</a>
		            <label>検索:</label> 
		            <input name="word" type="text" /> 
		        </fieldset> 
		    </form> 
		</div>
<!-- End contents here -->
		<div id="footer">
			<center><a href="<?=base_url()?>index.php">
				<img src="<?php echo base_url();?>apple-touch-icon.png" alt="logo" />
			</a></center>
			<p>表示：Mobile | <a href="<?=$url?>" target="_blank">PC</a></p>
			<p>このサイトについて | その他リンク等</p>
		</div>
	</div>
</body>
</html>