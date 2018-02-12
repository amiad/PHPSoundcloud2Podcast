<?php

class Soundcloud2Podcast {

	const CLIENT_ID = "DQskPX1pntALRzMp4HSxya3Mc0AO66Ro";
	const MIMES = [
		'aif' => 'audio/x-aiff',
		'aiff' => 'audio/x-aiff',
		'aifc' => 'audio/x-aiff',
		'wav' => 'audio/x-wav',
		'flac' => 'audio/x-flac',
		'ogg' => 'audio/ogg',
		'oga' => 'audio/ogg',
		'spx' => 'audio/ogg',
		'mp2' => 'audio/mpeg',
		'mp3' => 'audio/mpeg',
		'aac' => 'audio/x-aac',
		'amr' => 'audio/amr',
		'wma' => 'audio/x-ms-wma',
	];
	private $url, $user;
	public $cache_time = '1 hour';

	function __construct($url = '') {
		$this->url = $url;
        $this->main();
    }

	function main(){
		$sc = $this->get_soundcloud_json();
		if ($sc->kind != 'user')
			$this->user = $this->get_soundcloud_json($sc->user->permalink_url);
		echo $this->get_feed($sc);
	}

	function get_soundcloud_url(){
		$url = filter_input(INPUT_GET, 'url', FILTER_VALIDATE_URL);
		if (empty($url) || stripos($url, 'https://soundcloud.com/') !== 0)
			die('soundcloud url is wrong!');
		return $url;
	}

	function get_soundcloud_json($url = false){

		if (!$url){
			if (empty($this->url)){
				$url = $this->get_soundcloud_url();
				$this->url = $url;
			}
			else
				$url = $this->url;
		}

		$api_url = "https://api.soundcloud.com/resolve.json?client_id=" . self::CLIENT_ID . "&url=$url";
		$req = file_get_contents($api_url);
		if (!$req)
			die('request to soundcloud failed!');

		$json = json_decode($req);
		if (!$json)
			die('json file is wrong!');

		return $json;
	}

	function get_feed($sc){
		if ($cache = $this->get_cache)
			return $cache;

		return $this->generate_feed($sc);
	}

	function generate_feed($sc){
		$feed = $this->generate_basic_feed($sc);
		$tracks = $sc->kind == 'user' ? $this->get_soundcloud_json("$sc->permalink_url/tracks") : $sc->tracks;

		$feed = $this->add_items_to_feed($feed, $tracks);

		$this->save_cache($feed);

		return $feed;
	}

	function generate_basic_feed($sc){
		$feed = new \Zelenin\Feed;
		$feed
			->addChannel()
			->addChannelTitle(!empty($sc->title) ? $sc->title : $this->user->username)
			->addChannelDescription($sc->description)
			->addChannelLink($sc->permalink_url)
			->addChannelCopyright("$sc->license $this->username")
			->addChannelPubDate(strtotime($sc->last_modified))
			->addChannelLastBuildDate(strtotime($sc->last_modified))
			->addChannelTtl(60);

		$this->addChannelImage($feed, $sc);

		return $feed;
	}

	function add_items_to_feed($feed, $tracks){
		$tracks = array_reverse($tracks);
		$download_url = !empty($track->download_url) ? $track->download_url : $track->stream_url;
		foreach ($tracks as $track){
			$feed->addItem()
				->addItemTitle($track->title)
				->addItemDescription($track->description)
				->addItemLink($track->permalink_url)
				->addItemEnclosure("$download_url?client_id=" . self::CLIENT_ID, $track->duration, self::MIMES[$track->original_format]);
		}
		return $feed;
	}

	function get_cache(){
		$cache = $this->get_cache_path();
		if (file_exists($cache) && time() - filemtime($cache) < $this->cache_time) {
			return $cache;
		}
		else
			return false;
	}

	function save_cache($feed){
		if (!file_exists('cache'))
			mkdir('cache');

		file_put_contents($this->get_cache_path(), $feed->saveXML());
	}

	function get_cache_path(){
		return 'cache/' . md5($this->url) . '.cache';
	}

	function addChannelImage(&$feed, $sc){
		$image_url = ($sc->kind != 'user' && !empty($sc->artwork_url)) ? $sc->artwork_url : $this->user->avatar_data;
		if (!empty($image_url)){
			$image_size = $this->get_image_size($image_url);
			$feed
				->addChannelImage($image_url, $sc->permalink_url, $image_size['width'], $image_size['height'], $sc->title)
				->addChannelElement('itunes:image', '', ['href' => $sc->artwork_url]);
		}
	}

	function get_image_size($url){
		$size = getimagesize($url);
		return ['width' => $size[0], 'height' => $size[1]];
	}
}
