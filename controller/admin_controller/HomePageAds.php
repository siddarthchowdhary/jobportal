<?php
/* @author 		: Ashwani Singh
 * @date   		: 30-03-2013
 * @description : JobPortal Home Page Ads Controller
 * @updated on	: 08-04-2013 : serverside validation
 * 
*/
ini_set("display_errors","1");
class HomePageAdsController extends common     #extends /classes/common which contains model and view loader methods
{
	private $_fileName;
	private $_errorInfo;
	private $_tmpFile;
	private $_filesize;
	private $_fileType;
	private $_validFile;
	private $_url;
	private $_uploadStatus;

	/* 
	 * method to manage home page ads 
	*/
	
	#method to add ads
	public function addAds()
	{	
		$this->_errorInfo = $_FILES["fileName"]["error"];
		$this->_tmpFile   = $_FILES["fileName"]["tmp_name"];
		$this->_fileSize  = $_FILES["fileName"]["size"];
		$this->_fileType  = $_FILES["fileName"]["type"];
		$this->_validFile = true;
		$this->_fileName  = htmlentities($_REQUEST["userFileName"]);
		$this->_url       = $_REQUEST["url"];
		$data = array($this->_fileName,$this->_url);
		$result=$this->fileUpload();							#calling fileupload method to upload ads file
		if($result) {
			$this->loadView('ShowAdsError',$result);			#loading Error view with error message 
		} else {
			$result=$this->loadModel('HomePageAds','addAds',$data); #loading HomepagePageAds model and calling addAds method 
			if(result) {											#checking is new ads is added successfully 		
				$result=$this->loadModel('HomePageAds','showAds');  #loading HomepagePageAds model and calling showAds method to show uploaded ads  
				$this->loadView('ShowHomePageAds',$result);         #loading ShowHomePageAds view to show uploded ads
			}
		}		
	}
	#method to upload ads
	public function fileUpload()
	{   
		#validating file name min 3 max 20 characters 	
		if (!eregi('^[A-Za-z0-9 ]{3,20}$',$this->_fileName)) {
				return $this->_fileName."<br>".FILE_NAME_ERROR;
		}
		
		
		
		#validating url
		if(!filter_var($this->_url, FILTER_VALIDATE_URL))
		{
			return $this->_url."<br>".INVALID_URL;
		}
		if(($this->_fileType=='image/jpeg')||($this->_fileType=='image/png')) { 	#validating file type
			if(!$this->_errorInfo) {					#enter if file error
				if($this->_fileSize  > (1024000)){      #checking for file size error 
					$this->_validFile = false;          #making file _validFile flag false
					$message=UPLOAD_FILESIZE_ERROR;     #file upload size error 
					return $message;					#returning error message
				}
	
			}
				
			if($this->_validFile) {						#enter if _validFile flag is true
				
				$target_path = ADS_IMAGE_UPLOAD_PATH. basename( $this->_fileName).".jpeg"; 	   #creating target upload path
				if(move_uploaded_file($this->_tmpFile, $target_path)) {						   #uploading ads file to target folder
					$this->_uploadStatus="true";
				} else {
					return FILE_UPLOD_FAILED;
				}
			} else {
				$message = UPLOAD_ERROR_INFO.$this->_errorInfo;
				return $message;														   #returning error message 
			}
		} else {
				$message = UPLOAD_FILETYPE_ERROR;
				return $message;
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
	{  
		 $this->loadView('UploadHomePageAds');	
	}
	/* 
	 * method to manage tip of the day 
	*/
	
	#method to show tip of the day
	public function showTipOfDay()
	{   $result=$this->loadModel('HomePageAds','showTipOfDay');      #loading showAboutUs() of admin_model/AboutUsModel
	
		$this->loadView('TipOfDay',$result);                   	     #loading admin_view/AboutUs view
	}
	
	#method to update tip of the day
	public function updateTipOfDay()
	{
		$this->loadModel('HomePageAds','UpdateTipOfDay');			#loading showAboutUs() of admin_model/AboutUsModel
		$this->showTipOfDay();
	}
	
	#method to preview tip of the day
	public function previewTipOfDay()
	{   $result=$this->loadModel('HomePageAds','showTipOfDay');      #loading showAboutUs() of admin_model/AboutUsModel
	
		$this->loadView('PreviewTipOfDay',$result);              #loading admin_view/PreviewAboutUs view
	}
	
}


