<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-03-05 09:59:55
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-03-17 20:33:59
 */
	namespace Socola\Cron;

	use Socola\Facebook;

	class RemindHashTag
	{
		protected $groupID;
		protected $hashTag;
		protected $logs;
		protected $fb;
		/**
		 * [__construct description]
		 * @param [] $fb []
		 */
		function __construct($fb)
		{
			$this->fb = $fb;
		}

		public function setHashTag($hashtag)
		{
			if(!is_array($hashtags)){
				$hashtag = [$hashtag];
			}
			$this->hashTag = $hashtag;
		}

		public function setGroupID($groupID)
		{
			$this->groupID = $groupID;
		}
		/**
		 * Ghi log ra file RemindHashTag.log
		 * @param  [type] $str [description]
		 * @return [type]      [description]
		 */
		public function log($str)
		{
			file_put_contents('RemindHashTag.log', $str, FILE_APPEND);
		}
		/**
		 * lấy danh sách id đã nhắc hashtag
		 * @return [type] [description]
		 */
		public function getLogs()
		{
			$logs = file_get_contents('RemindHashTag.log');
			$logs = explode("\n", $logs);
			return $logs;
		}

		public function hasHashTag($message)
		{
			$message = strtolower($message);
			foreach ($this->hashTags as $hashTag) {
				if(strpos($hashTag, $message) !== false){
					return true;
				}
			}
			return false;
		}

		public function remind($post)
		{
			# code...
		}

		public function run()
		{
			$this->logs = $this->getLogs();
			$fb = new Facebook;

			$posts = $this->fb->graph($this->groupID, [
				'fields' => 'feed.since(-10+minutes).limit(200){message,from}'
			]);
			foreach ($posts as $post) {
				if(in_array($post->id, $this->logs)){
					continue;
				}

				if($this->hasHashTag($post->message)){
					continue;
				}
				$this->remind($post);
				$this->log($post->id);
			}
		}
	}