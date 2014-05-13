<?php

class AjaxController extends Controller
{
	protected $postObject;
	protected $userObject;
	protected $categoryObject;

	public function index()
	{
		$this->set('response', 'invalid request!');
	}

	// public function ajax()
	// {
	// 	$zip = !empty($_GET['zip']) && is_numeric($_GET['zip']) ? $_GET['zip'] : '94303';
	// 	$xml = simplexml_load_file('http://wsf.cdyne.com/WeatherWS/Weather.asmx/GetCityForecastByZIP?zip=' . $zip);

	// 	$this->set('weather', json_encode($xml));
	// }

	public function get_post_contents()
	{
		$this->postObject = new Post();
		$post = $this->postObject->getPost($_GET['pID']);
		$this->set('response', $post['content']);
	}
}
