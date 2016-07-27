<?php

function p($value){
	if(is_array($value)){
		dump($value,true,'<pre>');
	}
	else{
		echo $value;
	}
}