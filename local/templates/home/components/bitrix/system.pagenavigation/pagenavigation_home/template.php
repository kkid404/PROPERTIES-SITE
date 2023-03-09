<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/**
 * @var array $arResult
 * @var array $arParam
 * @var CBitrixComponentTemplate $this
 */

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

?>
<div class="row">
	<div class="col-md-12 text-center">
		<div class="site-pagination">
<?
			$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
			$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

			if($arResult["bDescPageNumbering"] === true):
				if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
					if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
						if($arResult["bSavePage"]):
							?>
							<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>" class="active"></a>
							<?
						endif;

						if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
							?><span>...</span><?
						endif;
					endif;
				endif;

				do
				{
					$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;

					if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
					?>
						<a class="active" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
					<?
					elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
						?><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$NavRecordGroupPrint?></a><?
					else:
						?><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$NavRecordGroupPrint?></a><?
					endif;

					$arResult["nStartPage"]--;
				}

				while($arResult["nStartPage"] >= $arResult["nEndPage"]);

				if ($arResult["NavPageNomer"] > 1):
					if ($arResult["nEndPage"] > 1):
						if ($arResult["nEndPage"] > 2):
							?><span>...</span><?
						endif;
						?><a   href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?></a><?
					endif;
				endif;
				?>

				<?

				?><?
			else:
				?>
				<?
				if ($arResult["NavPageNomer"] > 1):
					if ($arResult["nStartPage"] > 1):
						if($arResult["bSavePage"]):
							?><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a><?
						else:
							?><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a><?
						endif;

						if ($arResult["nStartPage"] > 2):
							?><span>...</span><?
						endif;
					endif;
				endif;

				do
				{
					if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
						?><a class="active" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a><?
					elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
						?><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a><?
					else:
						?><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a><?
					endif;
					$arResult["nStartPage"]++;
				}

				while($arResult["nStartPage"] <= $arResult["nEndPage"]);

				if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
					if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
						if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
							?><span>...</span><?
						endif;
						?><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a><?
					endif;
				endif;
			endif;
		?>
		</div>
	</div>
</div>