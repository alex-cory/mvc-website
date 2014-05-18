<?php

class WeatherController extends Controller
{
	public function index()
	{
		$zip = !empty($_GET['zip']) && is_numeric($_GET['zip']) ? $_GET['zip'] : '94303';
		$xml = simplexml_load_file('http://wsf.cdyne.com/WeatherWS/Weather.asmx/GetCityForecastByZIP?zip=' . $zip);
		$this->set('zip', $zip);
		$this->set('weather', $xml);
		// $this->set('result', false);
	}

	public function ajax()
	{
		// d($_POST['zip']);
		// d($_GET['zip']);

		// $zip = !empty($_GET['zip']) && is_numeric($_GET['zip']) ? $_GET['zip'] : '94303';
		// // d($zip);
		// // d(is_numeric($_GET['zip']);
		// // d(is_numeric($_POST['zip']);

		// $xml = simplexml_load_file('http://wsf.cdyne.com/WeatherWS/Weather.asmx/GetCityForecastByZIP?zip=' . $zip);
		// $this->set('zip', $zip);

		// $this->set('weather', json_encode($xml));
		// $this->set('result', true);

	}

	/**
	 * Description:
	 * This just connects to the Weather Service API and pulls in the results.
	 */
	public function getresults()
	{
		$zip = !empty($_POST['zip']) ? $_POST['zip'] : 94303;
		$xml = simplexml_load_file('http://wsf.cdyne.com/WeatherWS/Weather.asmx/GetCityForecastByZIP?zip=' . $zip);

		// $this->set('result', true);
		$this->set('weather', $xml);
		$this->set('zip', $zip);
	}
}
