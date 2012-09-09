<?php
require_once('../Upload.php');
$u=new Upload($_FILES['file']);
if($_REQUEST['type']=='0'){
	echo "All extensions and mime types allowed ";
}
else{
	if($_REQUEST['type']=='1'){
		echo "Just images are accepted ";
		$u->setType(UPLOAD_TYPE_IMAGE);
	}
}
if($u->process()){
	echo 'The file has been successfully transfered to the server';
}
else{
	echo $u->get('error');
}
