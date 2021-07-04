<?php
   function add(int $a=2,int $b=2)

   		{
   			$z=$a+$b;

   			return $z;

   		}

   echo "addition of two number:".add();


 // array in php


 

   $car = array("innova","BMW","Audi" );


    foreach ($car as $cars) {

    	echo $cars;

    	# code...
    };


    $info = array('raj' =>"22" ,"pankaj"=>"2" );

    	foreach ($info as $information=>$value1 ) {


      echo"name is:". $information."age is".$value1;    		# code...
    	}

   

?>
