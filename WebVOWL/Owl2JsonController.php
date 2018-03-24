<?php

$target_dir = "ontology.owl";

if(move_uploaded_file($_FILES["ontology"]["tmp_name"], $target_dir)){
	$cmd = "java -jar OWL2VOWL-0.3.3-SNAPSHOT-shaded.jar -file ";
	$cmd .= "$target_dir";
	shell_exec($cmd); 
	$fileJson=file_get_contents("ontology.json");
	echo $fileJson;
}else{
	echo "Error!";
}



?>
