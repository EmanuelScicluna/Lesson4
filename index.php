<?php

//4.1 - incrementByN function
function incrementByN(){
    return function($num, $n){
        return $num + $n;
    };
}

$result = incrementByN();
echo 'Increment 2 by 7 = '.($result(2,7)).'<br>';

//4.2 - fibonacci 
function fibbRecursive($i){
    if($i==0 || $i==1){
        return 1;
    }
    else {
        return (fibbRecursive($i-1) + fibbRecursive($i-2));
    }
}
echo '<br>Fibonacci:<br>';
function fibbIterative($n){
    $result = 1;
    $prevRes = 1;
    for($i=1;$i<$n;$i++){                      
        $result = $result + $prevRes;        
        $prevRes = $result - $prevRes;
    }
    return $result;
}
echo '<strong>Recursive: </strong>';
for($i=0;$i<10;$i++){                      
    echo fibbRecursive($i);
    if($i!=9) 
        echo ', ';
}
echo '<br><strong>Iterative: </strong>';
for($i=0;$i<10;$i++){   
    echo fibbIterative($i);
    if($i!=9) 
        echo ', ';
}

//4.3 - power function
function powerIterative($a, $b){
    $result = 1;
    for($i=0;$i<$b;$i++){
        $result = $result*$a;
    }
    return $result;
}

function powerRecursive($a, $b){
    if($b==0){
        return 1;
    }
    else{
        return powerRecursive($a,$b-1)*$a;
    }
}
echo '<br><br>Power Function:<br><div style="display:inline-block; margin-right:20px;"><strong>Iterative</strong><br>';
for($i=0;$i<5;$i++){
    echo "2^$i=".powerIterative(2,$i).'<br>';
}
echo '</div><div style="display:inline-block; margin-right:20px;"><strong>Recursive</strong><br>';
for($i=0;$i<5;$i++){
    echo "2^$i=". powerRecursive(2,$i).'<br>';
}
echo '</div>';


//5.1
$date = date("Y/m/d");
$test = <<<EOT
<html>
<body>
    <p>$date</p>
</body>
</html>
EOT;

echo $test;


//5.2
function pad_output($number, $length){
    printf('%0'.$length.'d',$number);
}

pad_output(5,8);
//5.3
function stringSpaces($str){
    $output = "";
    for($i=0;$i<strlen($str);$i++){
        if($str[$i]!=" "){
            $output .= $str[$i].' ';
        }            
    }
    return $output;
}

echo '<p>'.stringSpaces('ice malta').'</p>';

//5.4
$pages = array("lessons","classroom","teaching");

function similar($userInput, $pages){
    $choice = 0;
    $topChoice = 0;
    for($i=0;$i<count($pages);$i++){
        $percentSimilar = (similar_text($userInput, $pages[$i])/strlen($pages[$i]));
        if($percentSimilar>.7 && $percentSimilar>$topChoice){
            $topChoice=$percentSimilar;
            $choice = $i;
        }
    }
    return $topChoice !=0 ? $pages[$choice] : null;

}
$testString = array('less', 'son', 'class', 'classrooom', 'lessonnnss','teacchings','lessor','teaching');
echo '<table>';
foreach($testString as $str){
    echo "<tr><td>test: $str </td><td>Similar:".similar($str,$pages).'</td></tr>';
}
echo '</table>';