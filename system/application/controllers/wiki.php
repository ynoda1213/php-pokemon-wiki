<?php 
class Wiki extends Controller {

	function Wiki()
	{
		parent::Controller();
		
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('simple_html_dom');		
		$this->load->helper('myfunc');		
		
		ini_set('error_reporting', 0);
	}

	function index()
	{
		// 解析するページ（オブジェクト）の初期化
		$url = AT_WIKI.POKEMON;
		$html = file_get_html($url);
		$data['url'] = $url;	

		// 本家ページの最終更新日の取得
     	$data['date'] = $html->find(DOM_SIDE.'div[class=plugin_recent] p',0)->innertext;
     	
		// 最近更新されたページの一覧を取得し、aリンクの成型をする
		$recents = $html->find(DOM_SIDE.'div[class=plugin_recent] div ul li');
		foreach($recents as $recent) {
			// 特殊なビューが必要になるページの例外処理
			if(my_match_head($recent,'格')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_head($recent,'要注意')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_tail($recent,'一覧')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_tail($recent,'グループ')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_tail($recent,'パーティ')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_tail($recent,'察')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_tail($recent,'ポケモン')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_tail($recent,'表')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_tail($recent,'ページ')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_head($recent,'格')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_head($recent,'要')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_head($recent,'データ')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_head($recent,'終')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_head($recent,'編集')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} elseif(my_match_head($recent,'耐')) {
				$data['recents'][] = strip_tags($recent->innertext);
			} else {
				$data['recents'][] = my_custom_replace($recent,'li');
			}
		}
		
		// ビューの読み込みとオブジェクトの解放
		$data = my_load_view($this,$data);
		$this->load->view('index_view', $data);
		my_release($html);
	}

	function show($page_id='')
	{
		// 引数が正しく受け取れなかった場合、ホーム画面へリダイレクトする
		my_redirect($page_id);	

		// 引数で受け取ったidを元に、DOMオブジェクトを作成
		$url = AT_WIKI.POKEMON.PAGES.$page_id.'.html';
		$html = file_get_html($url);
		$data['url'] = $url;

		// ポケモンの名前を取得
     	$data['name'] = $html->find(DOM_MAIN.'h2',0)->innertext;
     	
     	// ポケモンの概要を取得
     	$data['description'] = $html->find(DOM_MAIN.'pre',0)->innertext;

     	// ポケモンの種族値表を取得
     	$status = $html->find(DOM_MAIN.'table',0)->innertext;
     	$data['status'] = my_url_opt($status,'show');
     	     	
     	// ポケモンの型候補とポケモンの覚える技を取得
     	$outlines = $html->find(DOM_MAIN.'div[class=plugin_contents] ul li ul li a');
     	foreach($outlines as $outline) {
     		if( my_match_tail($outline,'型') || 
     			my_match_tail($outline,'）') || 
     			my_match_tail($outline,')') ) {
     			$outline = my_url_opt($outline,'detail');
				$outline = str_replace('#','/',$outline);		
     			$data['tactics'][] = $outline;
     		} elseif( my_match_tail($outline,'タイプ') || my_match_head($outline,'攻撃技') || 
     			my_match_head($outline,'補助技') ) {
     			continue;
     		} else {
     			$outline = my_url_opt($outline,'detail');
				$outline = str_replace('#','/',$outline);		
     			$data['skills'][] = $outline;     		
     		}
     	}
     	
     	// ポケモンの概要を取得
     	$abstract = $html->find(DOM_MAIN.'div');
     	foreach($abstract as $paragraph) {
     		if(my_match_tag($paragraph->innertext,'<!--')) {
     			break;
     		} else {
     			$data['abstract'][] = my_url_opt($paragraph->innertext,'show');
     		}
     	}
		// ビューの読み込みとオブジェクトの解放
		$data = my_load_view($this,$data);
		$this->load->view('show_view', $data);
		my_release($html);
	}
	
	function detail($page_id='',$id='') {
		// 引数が正しく受け取れなかった場合、ホーム画面へリダイレクトする
		my_redirect($page_id);	

		// 引数で受け取ったidを元に、DOMオブジェクトを作成
		$url = AT_WIKI.POKEMON.PAGES.$page_id.'.html';
		$html = file_get_html($url);
		$data['url'] = $url.'#'.$id;
		
		// idで選択された詳細ビューコンテンツを取得
     	$contents = $html->find(DOM_MAIN.'h3[id='.$id.']',0);
		if(empty($contents)) {
	     	$contents = $html->find(DOM_MAIN.'h4[id='.$id.']',0);
		}
		
		// 詳細ビュー見出しの取得
		$data['heading'] = $contents->innertext;
		
		// 詳細ビューに表示するコンテンツを指定の終端文字がくるまで取得（上限30）
		$j = 0;
		while($j < 30) {
			if(my_match_tag($contents->next_sibling(),'<h3')) break;
			if(my_match_tag($contents->next_sibling(),'<h2')) break;
			if(my_match_tag($contents->next_sibling(),'<div id="ads">')) break;
			$data['contents'][] = my_custom_replace($contents->next_sibling(),'div');
			$contents = $contents->next_sibling();
			$j++;			
		}

		// ビューの読み込みとオブジェクトの解放
		$data = my_load_view($this,$data);
		$this->load->view('detail_view', $data);
		my_release($html);
	}
}

?>