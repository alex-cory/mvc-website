<?php

/**
 * Description:
 *
 */
class HomeController extends Controller
{
	/**
	 * Description:
	 * This  is the initial connection to the RSS API and then loading in the feed and setting all the items.
	 *
	 * @return [type] [description]
	 */
	public function index()
	{
    }

	/**
	 * Description:
	 * This  is the dislays the main page
	 *
	 * @return [type] [description]
	 */
	public function usatoday()
	{
		$rss = new RssDisplay('http://rssfeeds.usatoday.com/usatoday-NewsTopStories');
		$rss->loadFeed();
		$this->set('items', $rss->getFeedItems(8));
		$this->set('channelInfo', $rss->getChannelInfo());
    }
}


