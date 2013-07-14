<?php
	class HabboDebug {
		public $times = array();

		function __construct() {
			//$this->PostRequest();
			//$this->GetRequest();
		}

		function __destruct() {
			if(!defined('IGNORE_EXECUTEMSG')) {
				$total_time = round(((microtime(true)) - START_LOAD), 4);
				echo "\n\n<!-f- HabboCMS took " . $total_time . " seconds to load.-->";
			}
		}

		function PostRequest() {
			$contents = '';
			if ($_POST) {
				foreach ($_POST as $key => $value) {
					$contents .= $key . " => " . $value . "\n";
				}
				$contents .= "IP: " . $_SERVER['REMOTE_ADDR'];

				$this->SaveFile('post-' . time() . '-' . rand(0, 45000) . '.txt', $contents);
			}
		}

		function GetRequest() {
			$contents = '';
			if ($_GET) {
				foreach ($_GET as $key => $value) {
					$contents .= $key . " => " . $value . "\n";
				}
				$contents .= "IP: " . $_SERVER['REMOTE_ADDR'];

				$this->SaveFile('get-' . time() . '-' . rand(0, 45000) . '.txt', $contents);
			}
		}

		public function SaveFile($filename, $content) {
		 $fh = fopen(P . 'storage/logs/debug/' . $filename, 'w') or die("can't open file");
		 fwrite($fh, $content);
		 fclose($fh);
		}

		function StartClock($for) {
			global $core;
			if(isset($this->times[$for])) {
				$core->error($for . ' does allready exists.', 'E_WARNING');
				return false;
			}

			return $this->times[$for] = microtime(true);
		}

		function StopClock($for, $deci = 4) {
			if(!isset($this->times[$for])) {
				$core->error($for . ' does not exists.', 'E_WARNING');
				return false;
			}

			return round(((microtime(true)) - $this->times[$for]), $deci);
		}
	}

	$debug = new HabboDebug;
 ?>