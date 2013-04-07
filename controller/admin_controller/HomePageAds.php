<?php
/* @author 		: Ashwani Singh
 * @date   		: 30-03-2013
 * @description : JobPortal Home Page Ads Controller
 * @updated on	: 31-03-2013
*/
class HomePageAdsController extends common     #extends /classes/common which contains model and view loader methods
{
	private $_fileName;
	private $_errorInfo;
	private $_tmpFile;
	private $_filesize;
	private $_fileType;
	private $_validFile;

	
	#method to upload ads
	public function addAds()
	{	
		$this->_errorInfo = $_FILES["fileName"]["error"];
		$this->_tmpFile =  $_FILES["fileName"]["tmp_name"];
		$this->_fileSize = $_FILES["fileName"]["size"];
		$this->_fileType = $_FILES["fileName"]["type"];
		$this->_validFile = true;
		$this->_fileName =$_REQUEST["userFileName"];
	
		$this->fileUpload();
		$result=$this->loadModel('HomePageAds','addAds',$this->_fileName);
		$this->loadView('ShowHomePageAds',$result);
	}
	
	public function fileUpload()
	{
		if($this->_fileName){
	
			if(!$this->_errorInfo){
				if($this->_fileSize  > (1024000)){
					$valid_file = false;
					$message = 'Oops!  Your file\'s size is to large.';
				}
				/*	if(($this->_type==image/doc)||($this->_type==image/xls)||($this->_type==image/jpeg)||($this->_type==image/ppt)
				 ||($this->_type==typetext/plain))
				{
				$valid_file = false;
				$message = 'Oops!  Your file\'s type is not supported.';
				} */
			}
				
			if($this->_validFile) {
				$target_path = ADS_IMAGE_UPLOAD_PATH. basename( $this->_fileName).".jpeg";
				if(move_uploaded_file($this->_tmpFile, $target_path)) {
					echo "The file ".  basename( $this->_fileName)." has been uploaded";
				}else{
					echo "There was an error uploading the file, please try again!";
				}
			}else {
				$message = 'Ooops!  Your upload triggered the following error:  '.$this->_errorInfo;
			}
		}
		
		
	}
	#method to load main HomePage Ads view
	public function display()
	{   
		$this->loadView('HomePageAds');      				
	}
	
	#method to shows ads
	public function showAds()								
	{   
	
		$result=$this->loadModel('HomePageAds','showAds');
		
		$this->loadView('ShowHomePageAds',$result);
	}
	
	#method to preview ads
	public function previewAds()							
	{
		$result=$this->loadModel('HomePageAds','showAds');
		$this->loadView('PreviewHomePageAds',$result);
	}
	
	#method to add new ad
	public function uploadAds()
	{   $this->loadView('UploadHomePageAds');
	
	}
	
	
}
?>

