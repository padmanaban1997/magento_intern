<?php


echo "hello world";

$h1="padmanaban";


echo "<br> my name is :".$h1;


$val=100;

var_dump($val);

$s1="pillai padmanaban";

echo "<br>";


echo strlen($s1);

echo "<br>";


echo str_word_count($s1);


echo "<br>";


echo strrev($s1);


echo(pi());


define("HELLO", "padmanaban");

echo HELLO;


echo "<br>";

// if else 

$a=1;

if($a==0)
{
	echo "it is zero";

}
else if($a==1)
{
	echo " it is one ";

}

else
{
	echo "eroor";
}

// switch 
switch($a)

{
	case 1: echo "it is switch";
			break;

}

// loops 


$b=1;

while ( $b<= 10) {
	               echo $b;
	               $b++;
	# code...
}

for($b=1;$b<=10;$b++){

	echo $b;
}

do{

	echo $b;
	$b++;

}while($b<=10);


$arr = array("red" ,"green","blue" );

foreach($arr as $col)
{
	echo "<br>".$col;
}
?>
