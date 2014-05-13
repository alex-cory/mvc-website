<?php

class NewsController extends Controller
{
	public function index()
	{
        $rss = new RssDisplay('http://theonion.tumblr.com/rss');
        $rss->loadFeed();
        $this->set('rss', $rss);
        $this->set('items', $rss->getFeedItems(8));
        $this->set('channelInfo', $rss->getChannelInfo());
    }
}