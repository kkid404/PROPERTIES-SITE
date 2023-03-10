<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";


'
<div>
<a href="index.html">Home</a> 
<span class="mx-2 text-white">•</span> 
<strong class="text-white">About</strong>
</div>
';
	
$firstDivs = "
<div class='site-blocks-cover inner-page-cover overlay' style='background-image: url(". SITE_TEMPLATE_PATH . "/images/hero_bg_2.jpg);' data-aos='fade' data-stellar-background-ratio='0.5'>
	<div class='container'>
  		<div class='row align-items-center justify-content-center text-center'>
			<div class='col-md-10'>		
			";

$strReturn .= '<div>';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<span class="mx-2 text-white">•</span>' : '');
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
				'.$arrow.'
				<a href="'.$arResult[$index]["LINK"].'">
					'.$title.'
				</a>';
	}
	else
	{
		$header = "<h1 class='mb-2'>".$title."</h1>";
		$strReturn = $firstDivs . $header . $strReturn;
		$strReturn .= '
				'.$arrow.'
				<strong class="text-white">'.$title.'</strong>';
	}
}

$strReturn .= '</div></div></div></div></div>';

return $strReturn;
