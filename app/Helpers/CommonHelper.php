<?php


    function count_digit($number) {
        return strlen($number);
      }

      function divider($number_of_digits) {
        $tens="1";
    
      if($number_of_digits>8)
        return 10000000;
    
      while(($number_of_digits-1)>0)
      {
        $tens.="0";
        $number_of_digits--;
      }
      return $tens;
    }

    function number_form($num){
        $ext="";//thousand,lac, crore
        $number_of_digits = count_digit($num); //this is call :)
            if($number_of_digits>3)
        {
            if($number_of_digits%2!=0)
                $divider=divider($number_of_digits-1);
            else
                $divider=divider($number_of_digits);
        }
        else
            $divider=1;
        
        $fraction=$num/$divider;
        $fraction=number_format($fraction,2);
        if($number_of_digits==4 ||$number_of_digits==5)
            $ext="k";
        if($number_of_digits==6 ||$number_of_digits==7)
            $ext="Lac";
        if($number_of_digits==8 ||$number_of_digits==9)
            $ext="Cr";
        return $fraction." ".$ext;
    }