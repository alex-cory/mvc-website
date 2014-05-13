<?php

/**
 * Description:
 *
 */
class RssDisplay extends Model
{
	protected $feed_url;
	protected $num_feed_items;
	private   $feed;

	public function __construct($url)
	{
		parent::__construct();

		$this->feed_url = $url;
	}

	/**
	 * Description:
	 * Loads the feed
	 *
	 * @return [type] [description]
	 */
	public function loadFeed()
	{
		$this->feed = simplexml_load_file($this->feed_url);
	}

	/**
	 * Description:
	 * Return an array of feed items, but not the channel info.
	 *
	 * @param   int   $num_feed_items [description]
	 * @return  array $items          [description]
	 */
	public function getFeedItems($num_feed_items)
	{
		$this->num_feed_items = $num_feed_items;
		$items = array();
		$count = 0;


		foreach($this->feed->channel->item as $item) {

			// if the count of the items is greater than break out of foreach
			if (++$count > $num_feed_items) {
				break;
			}

			// Changing the Date format
            $old_date = (string)$item->pubDate;
            $item->pubDate = date('F jS Y', strtotime($old_date));


			$items[] = array(
				'title'       => (string)$item->title,
				'description' => (string)$item->description,
				'link'        => (string)$item->link,
				'pubDate'     => (string)$item->pubDate
			);

		}
		return $items;
	}

	/**
	 * Description:
	 * Returns the information of the root channel node.
	 *
	 * @return array $info [description]
	 */
	public function getChannelInfo()
	{
		// $info = $this->feed->channel->children();

		// remove the item node because that's what we did above
		unset($info->item);

		# Reinvented the wheel here lol whoops
		// $info = array();
		// foreach($this->feed as $nodes) {
		// 	foreach($nodes as $nodeName => $node) {
		// 		if ('item' != $nodeName) {
		// 			$info[$nodeName] = $this->feed->channel->{$nodeName};
		// 		}
		// 	}
		// }

		return $info;
	}

}