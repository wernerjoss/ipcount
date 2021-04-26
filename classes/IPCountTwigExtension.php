<?php
namespace Grav\Plugin\IPCount;

class IPCountTwigExtension extends \Twig_Extension
{
	public function getName()
	{
		return 'IPCountTwigExtension';
	}
	public function getFunctions()
	{
		return [
			new \Twig_SimpleFunction('counter', [$this, 'countFunction'])
		];
	}
	public function countFunction()
	{
		$counter = 0;
		$countdata = array();
		$path = DATA_DIR . 'counter/counter.json';	// json file from 30.01.21 !
		$countdata = array();
		if ( file_exists($path) ) {
			$json = file_get_contents($path);
			$countdata = (array) json_decode($json, true);
			if ( !(is_null($countdata)) )
				$counter = (int) $countdata['count'];
		}
		return $counter;
	}
}
?>