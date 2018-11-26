<?php

class Tasks{
    function checkPalindrome( $str ) {
        if( ! $str )
            echo 'UNDETERMINED';
        else {
            $onlyAlphNum = $str; //Assign original string to local variable
            /*
            Check if the string contains non alphaneumeric character
            Disregard all non alphaneumeric characters including whitespaces
            Take only alphaneumeric characters
            */
            if ( ! ctype_alnum( $str ) ) {
                $onlyAlphNum = ""; //local variable set to none string
                $len = strlen($str);
                for ( $i = 0; $i < $len; $i ++ ) {
                    if( ctype_alnum( $str[ $i ] ) )
                        $onlyAlphNum .= $str[ $i ];
                }
                
            }
            
            $str = $onlyAlphNum; // string assignment after checking non alphaneumeric characters

            $len = strlen( $str );
            $temp = $len;
            $palindrome = True;
            for( $i = 0; $i < $len; $i ++ ) {
                //Check first character to last; second character to second last and so on
                if( strtolower( $str[ $i ] ) != strtolower( $str[ $temp - 1 ] ) ) { 
                    $palindrome = False;
                    break;
                }
                else
                    $temp -= 1;
            }

            if( ! $len ) //If remaining string has no length
                echo 'UNDETERMINED';
            else {
                if ( $palindrome )
                    echo "TRUE";
                else
                    echo "FALSE";
            }
        }
    }


    function checkString( $str ) {
        if( ! $str )
            echo 'UNDETERMINED';
        else {
            $onlyAlpha = $str; //Assign original string to local variable

            /*
            Check if the string contains non alphabet character
            Disregard all non alphabet characters; take alphabets only
            */
            if ( ! ctype_alpha( $str ) ) { //Check if all alphabets
                $onlyAlpha = ""; //local variable set to none string
                $len = strlen( $str );
                for ( $i = 0; $i < $len; $i++ ) {
                    if( ctype_alpha( $str[ $i ] ) )
                        $onlyAlpha .= $str[ $i ];
                }
            }

            $str = $onlyAlpha; // string assignment after checking non alphaneumeric characters
            $len = strlen( $str );
            $check = [];
            for( $i = 0; $i < $len; $i++ ) {
                $letter = strtolower( $str[$i] );
                if( array_key_exists( $letter, $check ) )
                    $check[ $letter ] = $check[ $letter ] + 1;
                else
                    $check[ $letter ] = 1;
            }

            if( count( $check ) > 0){//Make sure the string contains alphabets
                asort( $check ); //Ascending sort array value
                $min = min( $check );
                $max = max( $check );
                if( $min == 1 and $min == $max )
                    echo "HETEROGRAM";
                else if ( $min > 1 and $min == $max )
                    echo "ISOGRAM";
                else
                    echo "NOTAGRAM";
            }
            else{
                echo 'UNDETERMINED';
            }
        }
    }


    function clockAngle($time){
        if( ! $time )
            $time = date("H:i:s");
        echo $time;

        $time_part = explode(":", $time);
        $hr = $time_part[0];
        $min = $time_part[1];

        //echo "<br />" . $a = (12 - ( int ) $hr ) * 30;
        //echo "<br />" . $b = (60 - ( int ) $min ) * 6;
        if ((int) $min == 0){
            $min = 60;
            $hr_part = 0;
        }
        else 
            $hr_part = 30 / ( 60 / ( int ) $min );

        if ($hr > 6)
            $a = abs( (int) $min + (60 - (int) $hr * 5 ));
        else
            $a = abs( (int) $min - (int) $hr * 5 );

        echo "<br />pin diff : : " . $a ; #= abs( (int) $min + (60 - (int) $hr * 5 ));

        if ( $a > 30 ){
            $dif = (360 - $a * 6);
            $angle = abs($dif + $hr_part);
        }
        else{
            $dif = $a * 6;
            $angle = abs($dif - $hr_part);
        }

        //$dif = abs( (int) $hr * 5 - (int) $min + (60 - (int) $hr * 5 ) ) * 6;

        // if ($dif >= 180){
        //    $dif = 360 - $dif;
        //     $angle = abs($dif + $hr_part);
        // }
        // else{
        //     $angle = abs($dif - $hr_part);
        // }

        echo "<br /> Angle : " . $angle ;
 
        //if($a >= 180 and $b >= 180)
        //    echo $ang = abs( ( 360 - $a ) - ( 360 - $b ) ) - $hr_part;
    }
}

$obj = new Tasks();
$str = "###!!@1";
echo 'Check for Palindrome ::  '.$str.'<br />';
$obj->checkPalindrome($str);
echo '<br /><br />Check for alphabet occurance :: '.$str.'<br />';
$obj->checkString($str);
echo '<br /><br />Time :: '.$str.'<br />';
$time = "11:25";
$obj->clockAngle($time);

?>