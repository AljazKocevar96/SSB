<?php

function errorHandle(Exception $e){
echo "Server Error: ".$e->getCode()." Fix it!<br/>";
    $trace= $e->getTrace();
    if($trace[0]['class']!=""){
        $class=$trace[0]['class'];
    }

    $method=$trace[0]['function'];
    $file= $trace[0]['file'];
    $line= $trace[0]['line'];

    $ExceptionOutput= $e->getMessage()."<br/>Class in Metoda: ".$class."->".$method."<br/>File: ".$file."<br/>Line: ".$line;
    echo $ExceptionOutput;

}

?>



