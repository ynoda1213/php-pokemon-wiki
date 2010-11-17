<?php

class Blog extends Controller {

	function Blog()
	{
		parent::Controller();
		
		// $this->load->scaffolding('entries');
		$this->load->helper('form');
		$this->load->helper('url');
		
		// Load html parser library
		$this->load->library('simple_html_dom');
	}

	function index()
	{
		// Load view
		$this->load->view('index_view');
	}
	function search_url()
	{
		$url = $_POST['url'];
		// Create DOM from URL or file
		$html = file_get_html($url);
		
		// Loading Pokemon name
     	$data['name'] = 
     	$html->find('body table tbody tr td div[id=main] h2', 0)->innertext;
     	
     	// Loading description
     	$data['description'] = 
     	$html->find('body table tbody tr td div[id=main] pre', 0)->innertext;
     	
     	// Loading status table
     	$data['status'] = 
     	$html->find('body table tbody tr td div[id=main] table');
     	
     	// Loading details
     	$data['outline'] = 
     	$html->find('body table tbody tr td div[id=main] div[class=plugin_contents] a');
     	
		$this->load->view('blog_view', $data);
/* 		redirect('blog', $data); */

     	// Release object	
     	$html->clear(); 
		unset($html);
	}
	
	function search_type()
	{
		$url = 'http://www14.atwiki.jp/bwpokekousatsu/pages/' . $_POST['hiddenType'] . '.html';
		$html = file_get_html($url);

     	$data['title'] = $html->find('body table[id=atwiki-jp-bg1] tbody tr td a', 1)->innertext;
     	$data['types'] = $html->find('body table tbody tr td div[id=main] h2');
     	$data['choices'] = $html->find('body table tbody tr td div[id=main] div');
     	$data['choice'] = $html->find('body table tbody tr td div[id=main] div a');

		$this->load->view('type_view', $data);

     	// Release object	
     	$html->clear(); 
		unset($html);
	}
	
	function search_no() {
		$url = 'http://www14.atwiki.jp/bwpokekousatsu/pages/' . $_POST['hiddenType'] . '.html';
		$html = file_get_html($url);

		// Loading Pokemon name
     	$data['name'] = 
     	$html->find('body table tbody tr td div[id=main] h2', 0)->innertext;
     	
     	// Loading description
     	$data['description'] = 
     	$html->find('body table tbody tr td div[id=main] pre', 0)->innertext;
     	
     	// Loading status table
     	$data['status'] = 
     	$html->find('body table tbody tr td div[id=main] table');
     	
     	// Loading details
     	$data['outline'] = 
     	$html->find('body table tbody tr td div[id=main] div[class=plugin_contents] a');

		// Loading outline header
     	$data['outline_headers'] = 
     	$html->find('body table tbody tr td div[id=main] h2');
     	
     	// Loading abstract
     	$data['abstract'] = 
     	$html->find('body table tbody tr td div[id=main] div');
     	
     	// Loading tactics
     	$data['tactics'] = 
     	$html->find('body table tbody tr td div[id=main] h3');
     	
     	// Set page number
     	$data['page'] = $_POST['hiddenType'];
     	
		$this->load->view('blog_view', $data);
/* 		redirect('blog', $data); */

     	// Release object	
     	$html->clear(); 
		unset($html);
	}
	
	function _show_detail() // Private method for debugging...
	{
		$data['detail'] = array(); // 型説明を格納する配列
		$url = 'http://www14.atwiki.jp/bwpokekousatsu/pages/274.html';
		$html = file_get_html($url);

     	// Loading abstract
     	$tactics = $html->find('body table tbody tr td div[id=main] div');
     	
     	// 型についての記述がある段落を抜き出し、その配列番号を取得
     	$num1 = 0;
     	$tmp = array();
     	foreach($tactics as $tactic) {
     		if(substr(trim($tactic->innertext),0,9) == '特性：') {
     			$tmp[] = $num1;
     		} elseif(substr(trim($tactic->innertext),0,9) == '性格：') {
	     		$tmp[] = $num1;
	     	}
     	$num1++;
     	}
/*      	echo var_dump($tmp); // 最終行以外 */

		// 取得した配列番号を元に間の行を取得（最後の型を除く）
		$i=0;
		for($i;$i<count($tmp)-1;$i++) {
			$num3 = 0;
	    	foreach($tactics as $tactic) {
	     		if($tmp[$i] <= $num3 && $tmp[$i+1] > $num3) {
	     		echo 'tmp='.$tmp[$i].'&'.$num3;
	     		echo $tactic->innertext;
	     		echo '<hr />';
	     		}
	     	$num3++;
	     	}
	    }
     	
     	// <br /><h2のパターンを検出したら最後の型の終了行を割り出す。
     	/* 型に関する記述で、n個の型がある最後の型の段落を割り出すコード。
     		要素の１つ後、２つ後に続くh2タグを検出し、見つかったらそれを行端と見なす。 */
     	$num2 = 0;
     	foreach($tactics as $tactic) {
     		if($tmp[$i] <= $num2) {
     			if($tactic->next_sibling() && $tactic->next_sibling()->next_sibling()) {
     				if(substr(trim($tactic->next_sibling()->next_sibling()),0,3) == '<h2') {
     					$tmp[] = $num2;
     					continue;
     				} elseif(substr(trim($tactic->next_sibling()->next_sibling()->next_sibling()),0,3) == '<h2') {
     					$tmp[] = $num2;
     					continue;
     				}
     			}
     		}
     	$num2++;
     	}
     	echo var_dump($tmp); //　最終行含む
     	echo $i;

		// 割り出した最終行を元に最終処理。
		$num4 = 0;     	
     	foreach($tactics as $tactic) {
     		if($tmp[$i] <= $num4 && $tmp[$i+1] >= $num4) {
	     		echo 'tmp='.$tmp[$i].'&'.$num4;
     			echo $tactic->innertext;
     			echo '<hr />';
     		}
     	$num4++;
     	}
     	
/*
     	// Loading tactics
     	$data['tactics'] = 
     	$html->find('body table tbody tr td div[id=main] h3', $_POST['hiddenType'])->innertext;
*/
     	
/* 		$this->load->view('detail_view', $data); */

     	// Release object	
     	$html->clear(); 
		unset($html);
	}

	function show_detail()
	{
		ini_set('display_errors',0); // Hidding errors
    	error_reporting(0); 		 // Hidding errors

		$data['detail'] = array(); // 型説明を格納する配列
		$url = 'http://www14.atwiki.jp/bwpokekousatsu/pages/' . $_POST['page'] . '.html';
		$html = file_get_html($url);

     	// Loading abstract
     	$tactics = $html->find('body table tbody tr td div[id=main] div');
     	
     	// 型についての記述がある段落を抜き出し、その配列番号を取得
     	$num1 = 0;
     	$tmp = array();
     	foreach($tactics as $tactic) {
     		if(substr(trim($tactic->innertext),0,9) == '特性：') {
     			$tmp[] = $num1;
     		} elseif(substr(trim($tactic->innertext),0,9) == '性格：') {
	     		$tmp[] = $num1;
	     	}
     	$num1++;
     	}

     	// <h2のパターンを検出したら最後の型の終了行を割り出す。
     	/* 型に関する記述で、n個の型がある最後の型の段落を割り出すコード。
     		要素の１つ後、２つ後に続くh2タグを検出し、見つかったらそれを行端と見なす。 */
     	$num2 = 0;
     	foreach($tactics as $tactic) {
     		if($tmp[count($tmp)-1] <= $num2) {
     			if($tactic->next_sibling() && $tactic->next_sibling()->next_sibling()) {
     				if(substr(trim($tactic->next_sibling()->next_sibling()),0,3) == '<h2') {
     					$tmp[] = $num2+1;
     					continue;
     				} elseif(substr(trim($tactic->next_sibling()->next_sibling()->next_sibling()),0,3) == '<h2') {
     					$tmp[] = $num2+1;
     					continue;
     				}
     			}
     		}
     	$num2++;
     	}
/*      	echo var_dump($tmp); //　最終行含む */
     	
     	// blog_viewから渡された番号を元に必要な型説明をdetail_viewに渡す。
     	$hidden = $_POST['hiddenType'];
     	    	
		$num3 = 0;
    	foreach($tactics as $tactic) {
     		if($tmp[$hidden] <= $num3 && $tmp[$hidden+1] > $num3) {
/*      		echo 'tmp='.$tmp[$hidden].'&'.$num3; */
/*      		echo $tactic->innertext; */
/*      		echo '<hr />'; */
     		$data['detail'][] = $tactic->innertext;
     		}
     	$num3++;
     	}
     	
/*      	echo var_dump($data['detail']); */

		$this->load->view('detail_view', $data);

     	// Release object	
     	$html->clear(); 
		unset($html);
    }
}

?>
