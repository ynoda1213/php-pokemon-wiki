<?php 
class Test extends Controller {

	function Test()
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
		$url = 'http://www14.atwiki.jp/bwpokekousatsu/pages/274.html';
		// Create DOM from URL or file
		$html = file_get_html($url);
		
     	$data['main'] = 
     	$html->find('body table tbody tr td div[id=main]',0);
     	
		echo '<html> 
<head> 
	<title>BWポケモン考察(α)</title> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, 
                                   maximum-scale=1.0, width=device-width"></head><body>';

		echo count($data['main']->innertext->innertext);
		echo '<hr />';
     	echo $data['main']->outertext;
     	
     	echo '</body></html>';
	}

}
?>