<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
  die(); ?>

<?
$length = ceil(count($arResult) / 2);
?>

<? if (!empty($arResult)): ?>
    <div class="col-md-12">
        <h3 class="footer-heading mb-4"><?=GetMessage("MENU_TITLE")?></h3>
    </div>
  <div class="col-md-6 col-lg-6">
    <ul class="list-unstyled">
      <?
      foreach ($arResult as $key => $arItem): ?>
        <? if ($key == $length): ?>
        </ul>
      </div>
      <div class="col-md-6 col-lg-6">
        <ul class="list-unstyled">
        <? endif; ?>
        <li><a href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?></a></li>
      <? endforeach ?>
    </ul>
  </div>
<? endif ?>