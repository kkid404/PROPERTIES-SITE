<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
use Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">

<head>
  <title><?$APPLICATION->ShowTitle()?></title>
  <?$APPLICATION->ShowHead();?>
  <?Asset::getInstance()->addCss("https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500");?>
  <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/fonts/icomoon/style.css");?>
  <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap.min.css");?>
  <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/magnific-popup.css");?>
  <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/jquery-ui.css");?>
  <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/owl.carousel.min.css");?>
  <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/owl.theme.default.min.css");?>
  <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap-datepicker.css");?>
  <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/mediaelementplayer.css");?>
  <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/animate.css");?>
  <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/fonts/flaticon/font/flaticon.css");?>
  <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/fl-bigmug-line.css");?>



  <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/aos.css">

  <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/style.css">
</head>

<body>
  <div id="panel"><?$APPLICATION->ShowPanel();?></div>
  <div class="site-loader"></div>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="border-bottom bg-white top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-md-6">
            <p class="mb-0">    
              <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                  "AREA_FILE_SHOW" => "file",
                  "AREA_FILE_SUFFIX" => "inc",
                  "EDIT_TEMPLATE" => "",
                  "PATH" => "/include/phone.php"
                )
              );?>           
              <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                  "AREA_FILE_SHOW" => "file",
                  "AREA_FILE_SUFFIX" => "inc",
                  "EDIT_TEMPLATE" => "",
                  "PATH" => "/include/email.php"
                )
              );?>   
            </p>
          </div>
          <div class="col-6 col-md-6 text-right">
          <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                      "AREA_FILE_SHOW" => "file",
                      "AREA_FILE_SUFFIX" => "inc",
                      "EDIT_TEMPLATE" => "",
                      "PATH" => "/include/social_network.php"
                    )
                  );?> 
          </div>
        </div>
      </div>

    </div>
    <div class="site-navbar">
      <div class="container py-1">
        <div class="row align-items-center">
          <div class="col-8 col-md-8 col-lg-4">
            <h1 class=""><a href="/" class="h5 text-uppercase text-black"><strong>          
            <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                      "AREA_FILE_SHOW" => "file",
                      "AREA_FILE_SUFFIX" => "inc",
                      "EDIT_TEMPLATE" => "",
                      "PATH" => "/include/company_name.php"
                    )
                  );?> 
                <span
                    class="text-danger">.</span></strong></a></h1>
          </div>
          <?$APPLICATION->IncludeComponent("bitrix:menu", "top_milti", Array(
            "COMPONENT_TEMPLATE" => "horizontal_multilevel",
              "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
              "MENU_CACHE_TYPE" => "N",	// Тип кеширования
              "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
              "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
              "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
              "MAX_LEVEL" => "3",	// Уровень вложенности меню
              "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
              "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
              "DELAY" => "N",	// Откладывать выполнение шаблона меню
              "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
            ),
            false
          );?>
        </div>
      </div>
    </div>
  </div>
  <? if($APPLICATION->GetCurPage(false) === '/'):?>
    <?
    $arrFilter=array("PROPERTY"=>array("PRIORITY_DEAL"=>5));
    $APPLICATION->IncludeComponent(
    "bitrix:news.list", 
    "slider", 
    array(
      "ACTIVE_DATE_FORMAT" => "d.m.Y",
      "ADD_SECTIONS_CHAIN" => "Y",
      "AJAX_MODE" => "N",
      "AJAX_OPTION_ADDITIONAL" => "",
      "AJAX_OPTION_HISTORY" => "N",
      "AJAX_OPTION_JUMP" => "N",
      "AJAX_OPTION_STYLE" => "Y",
      "CACHE_FILTER" => "N",
      "CACHE_GROUPS" => "Y",
      "CACHE_TIME" => "36000000",
      "CACHE_TYPE" => "A",
      "CHECK_DATES" => "Y",
      "COMPONENT_TEMPLATE" => "slider",
      "DETAIL_URL" => "",
      "DISPLAY_BOTTOM_PAGER" => "Y",
      "DISPLAY_DATE" => "Y",
      "DISPLAY_NAME" => "Y",
      "DISPLAY_PICTURE" => "Y",
      "DISPLAY_PREVIEW_TEXT" => "Y",
      "DISPLAY_TOP_PAGER" => "N",
      "FIELD_CODE" => array(
        0 => "",
        1 => "",
      ),
      "FILTER_NAME" => "arrFilter",
      "HIDE_LINK_WHEN_NO_DETAIL" => "N",
      "IBLOCK_ID" => "5",
      "IBLOCK_TYPE" => "posts",
      "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
      "INCLUDE_SUBSECTIONS" => "Y",
      "MESSAGE_404" => "",
      "NEWS_COUNT" => "20",
      "PAGER_BASE_LINK_ENABLE" => "N",
      "PAGER_DESC_NUMBERING" => "N",
      "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
      "PAGER_SHOW_ALL" => "N",
      "PAGER_SHOW_ALWAYS" => "N",
      "PAGER_TEMPLATE" => ".default",
      "PAGER_TITLE" => "Новости",
      "PARENT_SECTION" => "",
      "PARENT_SECTION_CODE" => "",
      "PREVIEW_TRUNCATE_LEN" => "",
      "PROPERTY_CODE" => array(
        0 => "COUNT_BATHROOMS",
        1 => "COUNT_FLOORS",
        2 => "GARAGE",
        3 => "TOTAL_AREA",
        4 => "PRIORITY_DEAL",
        5 => "MORE_LINKS",
        6 => "PRICE",
        7 => "",
      ),
      "SET_BROWSER_TITLE" => "Y",
      "SET_LAST_MODIFIED" => "N",
      "SET_META_DESCRIPTION" => "Y",
      "SET_META_KEYWORDS" => "Y",
      "SET_STATUS_404" => "N",
      "SET_TITLE" => "Y",
      "SHOW_404" => "N",
      "SORT_BY1" => "ACTIVE_FROM",
      "SORT_BY2" => "SORT",
      "SORT_ORDER1" => "DESC",
      "SORT_ORDER2" => "ASC",
      "STRICT_SECTION_CHECK" => "N"
    ),
    false
  );?>
<?
// (explode("/",$_SERVER["REQUEST_URI"])[1] === "o-servise")
?>
<? else:?>
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2"><?$APPLICATION->ShowTitle()?></h1>
            <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"breadcrump", 
	array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0",
		"COMPONENT_TEMPLATE" => "breadcrump"
	),
	false
);?>          
            </div>
        </div>
      </div>
    </div>
<?endif?>
