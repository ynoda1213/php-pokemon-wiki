<?php 
define('AT_WIKI', 'http://www14.atwiki.jp/');
define('POKEMON', 'bwpokekousatsu/');
define('PAGES', 'pages/');

define('DOM_MAIN', 'body table tbody tr td div[id=main] ');
define('DOM_SIDE', 'body table tbody tr td ');
define('DOM_HEAD', 'body table[id=atwiki-jp-bg1] tbody tr td ');

function my_match_tag($obj,$tag) {
	if(substr(trim($obj),0,strlen($tag)) == $tag) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function my_match_head($obj,$kwd) {
	if(substr(trim(strip_tags($obj->innertext)),0,strlen($kwd)) == $kwd) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function my_match_tail($obj,$kwd) {
	if(substr(trim(strip_tags($obj->innertext)),-(strlen($kwd)),strlen($kwd)) == $kwd) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function my_custom_replace($obj,$tag) {
	$obj = str_replace('http://www14.atwiki.jp/bwpokekousatsu/pages/',base_url().'index.php/wiki/show/',str_replace('.html', '',str_replace('<'.$tag.'>','',str_replace('</'.$tag.'>','',$obj))));
	return $obj;
}

function my_load_view($obj,$data) {
	// テンプレートの読み込み
	$data['header'] = $obj->load->view('templates/header',$data,TRUE);
	$data['footer'] = $obj->load->view('templates/footer',$data,TRUE);
	return $data;
}

function my_release($obj) {
 	// オブジェクトの解放	
	$obj->clear(); 
	unset($obj);
}

function my_redirect($type) {
	// 引数が正しく受け取れなかった場合、ホーム画面へリダイレクトする
	if(empty($type)) {
		redirect(base_url().'index.php');
		return;
	}
}

function my_url_opt($data, $method) {
	// <a>タグのリンク先を変更
	$data = str_replace(AT_WIKI.POKEMON.PAGES,'../'.$method.'/',str_replace('.html','',$data));
	return $data;
}
?>