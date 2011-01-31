<?php
class Crawler
{
	function get_page($url)
	{
		$page = file_get_contents($url);
		$page = preg_replace('/>[\s]+</i', '><', $page);

		return $page;
	}
	/*
	 * $patter : /<tr><td>([^<]+)<\/td><td>([^<]+)<\/td><\/tr>
	 * $vars : array('var1', 'var2')
	 *
	 * return : array(
	 * 		'var1' => array('v1', 'v11', 'v12'),
	 * 		'var2' => array('v2', 'v21', 'v22'),
	 * 		)
	 */
	function get_vars($content, $pattern, $vars)
	{
		$result = array();
		$matches = array();

		$pattern = str_replace(array("\n", "\r", "\t"), '', $pattern);
		preg_match_all($pattern, $content, $matches);

		$count =  count($matches);

		for($i = 1; $i < $count; $i++)
		{
			$result[$vars[$i-1]] = $matches[$i];
		}

		return $result;
	}
}
?>
