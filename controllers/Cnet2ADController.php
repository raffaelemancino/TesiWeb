<?php

use Pure\Controller;

class Cnet2ADController extends Controller {

    function process($name){

    	// pulisci la cartella di output
    	self::clear();
        $ontology= "public/uploads/ontology/$name.business.owl";
    	$logMxml = "public/uploads/log/$name.mxml";
        $logXES= "public/uploads/log/$name.xes";
        if (file_exists($logMxml))
            $log=$logMxml;
        else
            $log=$logXES;
        
        $cmd = "java -jar Cnet2ADweb.jar -json $log -dir bin -o $name";
        $cmd .= " -sigma $_POST[sigma] -ff $_POST[ff] -rtb $_POST[rtb]";
        $cmd .= " -ontology bin/$name.owl";
        
		//parte modificata 
		if (((int)$_POST['level_activity']>0)||((int)$_POST['level_resource']>0)){   
            if (!file_exists($ontology)){
                echo "Cnet2ADRESULT:ERROR";
                return;
            }
        }
		$cmd .= " -activity $_POST[level_activity]";
		if(((int)$_POST['level_resource']>-1)){
		    $cmd .= " -resources $_POST[level_resource]";
	    }
		
		

        if( empty($_POST['constraints']) == false )
            $cmd .= " -constraints public/uploads/constraints/$_POST[constraints].xml";
//var_dump($cmd);
		//$cmd = "java -jar Cnet2ADweb.jar -json public/uploads/test.mxml -dir bin -o test -ontology bin/test.owl -activity 3";
        $output = shell_exec($cmd);
		/*if (strpos($output, 'Cnet2ADRESULT=ERROR') !== false) {
			echo "Cnet2ADRESULT:ERROR";
			return;
		}*/		
		echo file_get_contents("bin/$name.uml");
                
        /*$file = fopen("terminal.txt", "w");
        fwrite($file, $cmd);
        fclose($file);*/

    }

    function visualize($name){
    	$filename = "bin/$name.json";

    	if(file_exists($filename)){
    		echo ( file_get_contents($filename) );
    	}
    	else echo "Visualize:ERROR";
    }

    /*
		Questa funzione pulisce la cartella di output
    */
    public static function clear(){
        $directory = "bin";

        if(is_dir($directory)) {
            $scan = scandir($directory);
            unset($scan[0], $scan[1]); //unset . and ..
            foreach($scan as $file) {
                $filename = "$directory/$file";
                $filedate = date ("d/m/Y", filemtime($filename));

                if( $filedate < date("d/m/Y") )
                    unlink($filename);
            }
        }
    }

}

?>
