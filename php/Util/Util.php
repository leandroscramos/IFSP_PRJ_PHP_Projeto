<?php
class Util {
    
    public static function debug($var){
		echo "<pre>";
		print_r($var);
		echo "</pre>";		
    }
    
    public static function parseDate($date, $outputFormat = 'd/m/Y'){
        $formats = array(
            'd/m/Y',
            'd/m/Y H',
            'd/m/Y H:i',
            'd/m/Y H:i:s',
            'Y-m-d',
            'Y-m-d H',
            'Y-m-d H:i',
            'Y-m-d H:i:s',            
            'Y-m-d H:i:s.u',  
        );    
    
        foreach($formats as $format){
            $dateObj = DateTime::createFromFormat($format, $date);
            if($dateObj !== false){
                break;
            }
        }
    
        if($dateObj === false){
            throw new Exception('Invalid date:' . $date);
        }
    
        return $dateObj->format($outputFormat);
    }

}