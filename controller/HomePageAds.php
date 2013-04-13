<?php
/* @author 		: Ashwani Singh
 * @date   		: 04-04-2013
 * @description : JobPortal Home Page Ads Controller
 * @updated on	: 
*/
ini_set("display_errors","1");
class HomePageAdsController extends common     #extends /classes/common which contains model and view loader methods
{
	#method to shows ads
	public function showAds()								
	{   
	
		$result=$this->loadModel('HomePageAds','showAds');
		$url=$result['url'];
		$filename=$result['filename'];
		echo "<a target='_blank' href=$url><img src=".ADS_IMAGE_PATH."$filename /></a>";
		
	}
	
	#method to shows tip of the day
	public function showTipOfDay()								
	{   
	
		$result=$this->loadModel('HomePageAds','showTipOfDay');
		echo $result['content1'];
		
	}

	
	
	
}
