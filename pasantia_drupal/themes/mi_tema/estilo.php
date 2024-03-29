<?php

$files = file_scan_directory(getcwd() . "/themes/mi_tema/images/imagenes_banner", '.png');
$lista_archivos = array();
foreach ($files as $value) {
    $pieces = explode("/", $value->filename);
    $lista_archivos[] = $pieces[9];
}

echo('
<style type="text/css">
.sp-slideshow {
position: relative;
margin: 10px auto;
width: 80%;
max-width: 1000px;
min-width: 260px;
height: 460px;
border: 10px solid #fff;
border: 10px solid rgba(255,255,255,0.9);
box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

.sp-content {
background: #7d7f72 url(/drupal/themes/mi_tema/images/grid.png) repeat scroll 0 0;
position: relative;
width: 100%;
height: 100%;
overflow: hidden;
}

.sp-parallax-bg {
background: url(/drupal/themes/mi_tema/images/map.png) repeat-x scroll 0 0;
-webkit-background-size: cover;
-moz-background-size: cover;
background-size: cover;
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
overflow: hidden;
}

.sp-slideshow input {
position: absolute;
bottom: 15px;
left: 0%;
width: 9px;
height: 9px;
z-index: 1001;
cursor: pointer;
-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
filter: alpha(opacity=0);
opacity: 0;
}

.sp-slideshow input + label {
position: absolute;
bottom: 15px;
left: 0%;
width: 6px;
height: 6px;
display: block;
z-index: 1000;
border: 3px solid #fff;
border: 3px solid rgba(255,255,255,0.9);
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
-webkit-transition: background-color linear 0.1s;
-moz-transition: background-color linear 0.1s;
-o-transition: background-color linear 0.1s;
-ms-transition: background-color linear 0.1s;
transition: background-color linear 0.1s;
}
.sp-slideshow input:checked + label {
background-color: #fff;
background-color: rgba(255,255,255,0.9);
}');


$margen = 18;
foreach ($lista_archivos as $key => $archivos) {
    echo('
	    .sp-selector-' . ($key + 1) . ', .button-label-' . ($key + 1) . ' 
	    {
		margin-left: ' . ($margen * $key) . 'px;
	    }
    ');
}
echo('

.sp-arrow {
position: absolute;
top: 50%;
width: 28px;
height: 38px;
margin-top: -19px;
display: none;
opacity: 0.8;
cursor: pointer;
z-index: 1000;
background: transparent url(/drupal/themes/mi_tema/images/arrows.png) no-repeat;
-webkit-transition: opacity linear 0.3s;
-moz-transition: opacity linear 0.3s;
-o-transition: opacity linear 0.3s;
-ms-transition: opacity linear 0.3s;
transition: opacity linear 0.3s;
}
.sp-arrow:hover{
opacity: 1;
}
.sp-arrow:active{
margin-top: -18px;
}
.sp-selector-1:checked ~ .sp-arrow.sp-a2,
.sp-selector-2:checked ~ .sp-arrow.sp-a3,
.sp-selector-3:checked ~ .sp-arrow.sp-a4,
.sp-selector-4:checked ~ .sp-arrow.sp-a5 {
right: 15px;
display: block;
background-position: top right;
}
.sp-selector-2:checked ~ .sp-arrow.sp-a1,
.sp-selector-3:checked ~ .sp-arrow.sp-a2,
.sp-selector-4:checked ~ .sp-arrow.sp-a3,
.sp-selector-5:checked ~ .sp-arrow.sp-a4 {
left: 15px;
display: block;
background-position: top left;
}

.sp-slideshow input:checked ~ .sp-content {
-webkit-transition: background-position linear 0.6s, background-color linear 0.8s;
-moz-transition: background-position linear 0.6s, background-color linear 0.8s;
-o-transition: background-position linear 0.6s, background-color linear 0.8s;
-ms-transition: background-position linear 0.6s, background-color linear 0.8s;
transition: background-position linear 0.6s, background-color linear 0.8s;
}

.sp-slideshow input:checked ~ .sp-content .sp-parallax-bg {
-webkit-transition: background-position linear 0.7s;
-moz-transition: background-position linear 0.7s;
-o-transition: background-position linear 0.7s;
-ms-transition: background-position linear 0.7s;
transition: background-position linear 0.7s;
}

');
$position = -100;

foreach ($lista_archivos as $key => $archivos) {
//el background-color podria ponerse ramdon para que vaya variando
    echo('
	    input.sp-selector-' . ($key + 1) . ':checked ~ .sp-content {
	    background-position: ' . ($position * $key) . 'px 0;
	    background-color: #727b7f;
	    }	
    ');
}

foreach ($lista_archivos as $key => $archivos) {

    echo('
	input.sp-selector-' . ($key + 1) . ':checked ~ .sp-content .sp-parallax-bg {
	background-position: ' . ($key * 2 * $position) . 'px 0;
	}
    ');
}

echo('
.sp-slider {
position: relative;
left: 0;
width: '.(max(array_keys($lista_archivos))+1).'00%;
height: 100%;
list-style: none;
margin: 0;
padding: 0;
-webkit-transition: left ease-in 0.8s;
-moz-transition: left ease-in 0.8s;
-o-transition: left ease-in 0.8s;
-ms-transition: left ease-in 0.8s;
transition: left ease-in 0.8s; 
}

.sp-slider > li {
color: #fff;
width: '.(100/(max(array_keys($lista_archivos))+1)).'%;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
-o-box-sizing: border-box;
-ms-box-sizing: border-box;
box-sizing: border-box;
height: 100%;
padding: 0 60px;
float: left;
text-align: center;
opacity: 0.4;
-webkit-transition: opacity ease-in 0.4s 0.8s;
-moz-transition: opacity ease-in 0.4s 0.8s;
-o-transition: opacity ease-in 0.4s 0.8s;
-ms-transition: opacity ease-in 0.4s 0.8s;
transition: opacity ease-in 0.4s 0.8s; 
}
.sp-slider > li img{
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
-o-box-sizing: border-box;
-ms-box-sizing: border-box;
box-sizing: border-box;
display: block;
margin: 0 auto;
padding: 40px 0 50px 0;
max-height: 100%;
max-width: 100%;
}
');

foreach ($lista_archivos as $key => $archivos) {

    echo('	
	input.sp-selector-' . ($key + 1) . ':checked ~ .sp-content .sp-slider {
	left: ' . ($key * $position) . '%;
	}
    ');
}

foreach ($lista_archivos as $key => $archivos) {
    if (0 == (max(array_keys($lista_archivos)))) {
	echo('input.sp-selector-' . ($key + 1) . ':checked ~ .sp-content .sp-slider > li:first-child{
opacity: 1;
}');
	break;
    }
    if ($key == 0) {
	echo('input.sp-selector-1:checked ~ .sp-content .sp-slider > li:first-child,');
    } elseif ($key == (max(array_keys($lista_archivos)))) {
	echo('input.sp-selector-' . ($key + 1) . ':checked ~ .sp-content .sp-slider > li:nth-child(' . ($key + 1) . '){
opacity: 1;
}');
    } else {
	echo('input.sp-selector-' . ($key + 1) . ':checked ~ .sp-content .sp-slider > li:nth-child(' . ($key + 1) . '),');
    }
}

echo('
@media screen and (max-width: 840px){
.sp-slideshow { height: 345px; }
}
@media screen and (max-width: 680px){
.sp-slideshow { height: 285px; }
}
@media screen and (max-width: 560px){
.sp-slideshow { height: 235px; }
}
@media screen and (max-width: 320px){
.sp-slideshow { height: 158px; }
}
</style> ');
?>