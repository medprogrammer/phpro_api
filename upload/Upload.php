<?php
define('UPLOAD_TYPE_ALL', 0);
define('UPLOAD_TYPE_IMAGE', 1);

class Upload{
	private $file;
	private $error;
	private $upload_path="upload/";
	private $allowedExtensions=array();
	private $allowedMIMETypes=array();
	private $type;
	private $MAX_FILE_SIZE=200000;

	function __construct($file){
		$this->file=$file;
	}
	function get($key){
		return $this->$key;
	}
	function getURL(){
		return $this->upload_path.$this->file['name'];
	}
	function setType($type){
		$this->type=$type;
		switch($type){
			case UPLOAD_TYPE_IMAGE:
			  $this->allowedExtensions=['gif','jpg','jpeg','png','svg','tiff','ico','bmp'];
			  $this->allowedMIMETypes=['image/gif','image/jpeg','image/pjpeg','image/png','image/svg+xml','image/tiff','image/vnd.microsoft.icon',' 	image/bmp','mage/x-windows-bmp'];
			  break;
			case '':
			  break;
		}
	}
	function process(){
		$error=$this->file['error'];
		$file_name=$this->file['name'];
		$file_tmp=$this->file['tmp_name'];
		$chunks=explode('.',$file_name);
		$file_extension=end($chunks);
		$destination=$this->upload_path.$file_name;
		$file_size=$this->file['size'];
		$file_type=$this->file['type'];
		if($error){
			$this->error=$error;
			return false;
		}
		if(!($file_size<=$this->MAX_FILE_SIZE)){
			$this->error=$file_name." is too big ($file_size > ".$this->MAX_FILE_SIZE.")";
			return false;
		}
		if(!empty($this->allowedExtensions)){
			if(!in_array($file_extension,$this->allowedExtensions)){
				$this->error=$file_name." : extension not allowed.";
				return false;
			}
		}
		if(!empty($this->allowedMIMETypes)){
			if(!in_array($file_type,$this->allowedMIMETypes)){
					$this->error=$file_name."($file_type) : mime type not allowed.";
					return false;
			}
		}
		if(file_exists($destination)){
			$this->error="File already exists : ".$file_name;
			return false;
		}
		if(!is_writable($this->upload_path)){
			$this->error="Directory '".$this->upload_path."' is not writable";
			return false;
		}
		if(!move_uploaded_file($file_tmp, $destination)){
			$this->error=$file_name." not uploaded for unknown reasons";
			return false;
		}
		return true;
	}
}