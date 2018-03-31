<?php

use Pure\Controller;

class NuXMVController extends Controller{
    
    function check($query)
    {
        $filename = "$_POST[file]";
        $this->concat($filename, $query);
        $this->runConsole();
        echo $this->getResoult();
    }
    
    function runConsole()
    {
        $cmd = "nuXmv.exe nuXmv.smv > nuXmv.txt";
        shell_exec($cmd);
    }
    
    function concat($filename, $query)
    {
        $path1 = "bin/$filename.smv";
        $path2 = "nuXmv.smv";
        
        if (copy($path1, $path2))
        {
            $file = fopen($path2, "a");
            fwrite($file, "\n\n$query");
            fclose($file);
        }   
    }
    
    function getResoult()
    {
        $result = "";
        $file = fopen("nuXmv.txt", "r");
        while (!feof($file))
        {
            $line = fgets($file);
            
            if(strpos($line, '-- specification') !== false){
                $result .= $line;
            }
        }
        fclose($file);
        return $result;
    }
}
