<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
//var_dump($arResult);
$count_img = count($arResult["DISPLAY_PROPERTIES"]["GALLERY_IMG"]["DISPLAY_VALUE"]);
$count_more_info = count($arResult["DISPLAY_PROPERTIES"]["MORE_INFO"]["DISPLAY_VALUE"]);
$count_more_links = count($arResult["DISPLAY_PROPERTIES"]["MORE_LINKS"]["DISPLAY_VALUE"]);
?>

<div class="site-blocks-cover overlay" style="background-image: url(<?=$arResult["DETAIL_PICTURE"]["SRC"]?>);" data-aos="fade" data-stellar-background-ratio="0.5">
	<div class="container">
	<div class="row align-items-center justify-content-center text-center">
		<div class="col-md-10">
		<span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded"><?=GetMessage("PROPERTY_DETAILS")?></span>
		<h1 class="mb-2"><?=$arResult["NAME"]?></h1>
		<p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?=$arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]?></strong></p>
		</div>
	</div>
	</div>
</div>
<div class="site-section site-section-sm">
    <div class="container">
      <div class="row">
        <div class="col-lg-8" style="margin-top: -150px;">
          <div class="mb-5">
            <div class="slide-one-item home-slider owl-carousel">
              <?if($count_img > 1):?>
                <?foreach($arResult["DISPLAY_PROPERTIES"]["GALLERY_IMG"]["FILE_VALUE"] as $key => $photo):?>
                  <div><img src="<?=$photo['SRC']?>" alt="<?=$arResult["NAME"]?>" class="img-fluid"></div>
                <?endforeach?>
              <?else:?>
                <div><img src="<?=$arResult["DISPLAY_PROPERTIES"]["GALLERY_IMG"]["FILE_VALUE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>" class="img-fluid"></div>
              <?endif?>
            </div>
          </div>
        <div class="bg-white">
          <div class="row mb-5">
            <div class="col-md-6">
              <strong class="text-success h1 mb-3">$<?=$arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]?></strong>
            </div>
            <div class="col-md-6">
              <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                <li>
                  <span class="property-specs"><?=GetMessage("DATE_UPDATE")?></span>
                  <span class="property-specs-number"><?=mb_strimwidth($arResult["TIMESTAMP_X"], 0, 10)?></span>
                </li>
                <li>
                  <span class="property-specs"><?=GetMessage("COUNT_FLOORS")?></span>
                  <span class="property-specs-number"><?=$arResult["DISPLAY_PROPERTIES"]["COUNT_FLOORS"]["VALUE"]?></span>
                </li>
                <li>
                  <span class="property-specs"><?=GetMessage("AREA")?></span>
                  <span class="property-specs-number"><?=$arResult["DISPLAY_PROPERTIES"]["TOTAL_AREA"]["VALUE"]?><?=GetMessage("METERS")?><sup>2</sup></span>
                </li>

              </ul>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
              <span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("COUNT_BATH")?></span>
              <strong class="d-block"><?=$arResult["DISPLAY_PROPERTIES"]["COUNT_BATHROOMS"]["VALUE"]?></strong>
            </div>
            <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
              <span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("GARAGE")?></span>
				      <?if($arResult["DISPLAY_PROPERTIES"]["GARAGE"]["VALUE"] == "Наличие гаража"):?>
                <strong class="d-block"><?=GetMessage("GARAGE_YES")?></strong>
				      <?else:?>
					      <strong class="d-block"><?=GetMessage("GARAGE_NO")?></strong>
				      <?endif?>
            </div>
          </div>
          <h2 class="h4 text-black"><?=GetMessage("MORE_INFO")?></h2>
            <p>
				      <?=$arResult["DETAIL_TEXT"]?>
			      </p>
          <div class="row mt-5">
            <div class="col-12">
              <h2 class="h4 text-black mb-3"><?=GetMessage("PROPERTY_GALLERY")?></h2>
          </div>
          <?if($count_img > 1):?>
            <?foreach($arResult["DISPLAY_PROPERTIES"]["GALLERY_IMG"]["FILE_VALUE"] as $key => $photo):?>
              <div class="col-sm-6 col-md-4 col-lg-3 mb-4"> 
                <a href="<?=$photo['SRC']?>" class="image-popup gal-item">
                  <img src="<?=$photo['SRC']?>" alt="<?=$arResult["NAME"]?>" class="img-fluid">
                </a>
              </div>
            <?endforeach?>
          <?else:?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4"> 
              <a href="<?=$arResult["DISPLAY_PROPERTIES"]["GALLERY_IMG"]["FILE_VALUE"]["SRC"]?>" class="image-popup gal-item">
                <img src="<?=$arResult["DISPLAY_PROPERTIES"]["GALLERY_IMG"]["FILE_VALUE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>" class="img-fluid">
              </a>
            </div>
				  <?endif?>
        </div>
      </div>
    </div>
    <div class="col-lg-4 pl-md-5">
      <div class="bg-white widget border rounded">
        <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
        <form action="" class="form-contact-agent">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" id="phone" class="btn btn-primary" value="Send Message">
          </div>
        </form>
      </div>
      <div class="bg-white widget border rounded">
        <h3 class="h4 text-black widget-title mb-3">Paragraph</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit qui explicabo, libero nam, saepe eligendi. Molestias maiores illum error rerum. Exercitationem ullam saepe, minus, reiciendis ducimus quis. Illo, quisquam, veritatis.</p>
      </div>

    </div>
				
      <?if(isset($arResult["DISPLAY_PROPERTIES"]["MORE_INFO"]["VALUE"])):?>
        <div class="container">
          <div>
            <h2 class="h4 text-black mb-3"><?=GetMessage("ADDITIONAL_MATERIALS")?></h2>
          </div>
        <?if($count_more_info > 1):?>
          <?foreach($arResult["DISPLAY_PROPERTIES"]["MORE_INFO"]["FILE_VALUE"] as $key => $file):?>
            <div> 
              <a href="<?=$file['SRC']?>" class="gal-item">
                <?=$file['FILE_NAME']?>
              </a>
            </div>
            <br>
          <?endforeach?>
          <?else:?>
            <div> 
              <a href="<?=$arResult["DISPLAY_PROPERTIES"]["MORE_INFO"]["FILE_VALUE"]["SRC"]?>" class="gal-item">
                <?=$arResult["DISPLAY_PROPERTIES"]["MORE_INFO"]["FILE_VALUE"]['FILE_NAME']?>
              </a>
            </div>
          <?endif?>
        </div>
      <?endif?>
    

      
      <?if(isset($arResult["DISPLAY_PROPERTIES"]["MORE_LINKS"]["VALUE"])):?>
        <div class="container">
          <div>
            <h2 class="h4 text-black mb-3"><?=GetMessage("MORE_LINKS")?></h2>
          </div>
          <?if($count_more_links > 1):?>
            <?foreach($arResult["DISPLAY_PROPERTIES"]["MORE_LINKS"]["VALUE"] as $key => $link):?>
              <div> 
                <a href="<?=$link?>" class="gal-item"><?=$link?></a>
              </div>
            <?endforeach?>	
          <?else:?>
            <div> 
              <a href="<?=$arResult["DISPLAY_PROPERTIES"]["MORE_LINKS"]["VALUE"][0]?>" class="gal-item">
                <?=$arResult["DISPLAY_PROPERTIES"]["MORE_LINKS"]["VALUE"][0]?>
              </a>
            </div>
          <?endif?>
        </div>
      <?endif?>
    </div>
  </div>
</div>

