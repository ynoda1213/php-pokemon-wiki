<?php 
class Search extends Controller {

	function Search()
	{
		parent::Controller();		

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('simple_html_dom');		
		$this->load->helper('myfunc');		
		
		ini_set('error_reporting', 0);
	}

	function type($page_id='')
	{
		// 引数が正しく受け取れなかった場合、ホーム画面へリダイレクトする
		my_redirect($page_id);	

		// 引数を元に解析するページ（オブジェクト）の初期化
		$url = AT_WIKI.POKEMON.PAGES.$page_id.'.html';
		$html = file_get_html($url);
		$data['url'] = $url;

		// 本家ページから必要な情報を取得
     	$data['title'] = $html->find(DOM_HEAD.'a',1)->innertext;
     	$types = $html->find(DOM_MAIN.'h2');
		foreach($types as $type) {
	     	if(substr(trim(strip_tags($type)),0,3) != 'タ') {
	     		$data['types'][] = $type;
	     	}
	    }
     	$choices = $html->find(DOM_MAIN.'div');
     	foreach($choices as $choice) {
     		$data['choices'][] = explode(' /',my_custom_replace($choice,'div'));
     	}
     	
		// ビューの読み込みとオブジェクトの解放
		$data = my_load_view($this,$data);
		$this->load->view('search_view', $data);
		my_release($html);
	}	

	function name($from='',$to='')
	{
		// 引数が正しく受け取れなかった場合、ホーム画面へリダイレクトする
		my_redirect($from);	

     	$data['title'] = 'なまえ別で探す';
	   	
		for($i=$from;$i<=$to;$i++) {
			// 引数を元に解析するページ（オブジェクト）の初期化
			$url = AT_WIKI.POKEMON.PAGES.($i).'.html';
			$html = file_get_html($url);
			$data['url'] = $url;
			$array = array();
			
			// 本家ページから必要な情報を取得
	     	$choices = $html->find(DOM_MAIN.'h2');   
	     	foreach($choices as $choice) {
	     		$choice = substr(trim($choice->innertext),4-strlen($choice->innertext),strlen($choice->innertext));
	     		$array[] = my_custom_replace($choice,'div');
	     	}
	     	
	     	$data['choices'][] = $array;
     		$data['types'][] = $html->find(DOM_HEAD.'a',1);
		}
     	
		// ビューの読み込みとオブジェクトの解放
		$data = my_load_view($this,$data);
		$this->load->view('search_view', $data);
		my_release($html);
	}
	
	function word($keyword='',$andor='and') {

		// 引数が正しく受け取れなかった場合、ホーム画面へリダイレクトする
		my_redirect($keyword);	

		// 引数を元に解析するページ（オブジェクト）の初期化
		$url = AT_WIKI.POKEMON.'?cmd=search'.'&keyword='.urldecode($keyword).'&andor='.$andor;
		$html = file_get_html($url);
		$data['url'] = $url;
		
		// 本家ページから必要な情報を取得
     	$data['title'] = '検索結果';
     	$data['types'] = $keyword.'を含むページ';
     	$choices = $html->find(DOM_MAIN.'ul li');
     	foreach($choices as $choice) {
     		if(!my_match_tail($choice,'調べる')) {
     		$data['choices'][] = str_replace('<a ','<a onclick="alert(\'ここから先は、本家サイトを表示します。\');" ',str_replace('&amp;', '&',str_replace('<li>','',str_replace('</li>','',$choice))));
     		}

     	}
     	
		// ビューの読み込みとオブジェクトの解放
		$data = my_load_view($this,$data);
		$this->load->view('tmp_view', $data);
		my_release($html);
	}
	
	function do_search() {
		$var = $this->input->post('word');
		$var = urlencode($var);
		redirect('search/word/'.$var);
	}
}

?>