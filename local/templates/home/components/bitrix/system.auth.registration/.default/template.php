<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */


if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}

?>

<div class="col-md-12 col-lg-8 mb-5">        
<?
ShowMessage($arParams["~AUTH_RESULT"]);
?>
<?if($arResult["SHOW_EMAIL_SENT_CONFIRMATION"]):?>
	<p><?echo GetMessage("AUTH_EMAIL_SENT")?></p>
<?endif;?>

<?if(!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"] && $arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
	<p><?echo GetMessage("AUTH_EMAIL_WILL_BE_SENT")?></p>
<?endif?>
<noindex>

<?if(!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"]):?>


<form method="post" class="p-5 bg-white border" action="<?=$arResult["AUTH_URL"]?>" name="bform" enctype="multipart/form-data">
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="REGISTRATION" />
	<thead>
		<tr>
			<td colspan="2"><b><?=GetMessage("AUTH_REGISTER")?></b></td>
		</tr>
	</thead>
	<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold"><?=GetMessage("AUTH_NAME")?></label>
				<input type="text" class="form-control" name="USER_NAME" maxlength="50" value="<?=$arResult["USER_NAME"]?>"/>
			</div>
	</div>
	<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold"><?=GetMessage("AUTH_LAST_NAME")?></label>
				<input type="text" class="form-control" name="USER_LAST_NAME" maxlength="50" value="<?=$arResult["USER_LAST_NAME"]?>"/>
			</div>
	</div>
	<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold"><?=GetMessage("AUTH_LOGIN_MIN")?></label>
				<input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>"class="form-control"/>
			</div>
	</div>
	<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold"><?=GetMessage("AUTH_PASSWORD_REQ")?></label>
				<input type="password" name="USER_PASSWORD" maxlength="255" value="<?=$arResult["USER_PASSWORD"]?>" class="form-control" autocomplete="off" />
			</div>
	</div>
	<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold"><?=GetMessage("AUTH_CONFIRM")?></label>
				<input type="password" name="USER_CONFIRM_PASSWORD" maxlength="255" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="form-control" autocomplete="off" />
			</div>
	</div>
	<?if($arResult["EMAIL_REGISTRATION"]):?>
		<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold"><?=GetMessage("AUTH_EMAIL")?></label>
				<input type="text" name="USER_EMAIL" maxlength="255" value="<?=$arResult["USER_EMAIL"]?>" class="form-control" />
			</div>
		</div>
	<?endif?>
	<?if ($arResult["USE_CAPTCHA"] == "Y"):?>
	<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold"><?=GetMessage("CAPTCHA_REGF_TITLE")?></label>
				<input type="hidden" class="form-control" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
			</div>
			<div class="col-md-12 mb-3 mb-md-0">
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
			</div>
			<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold"><?=GetMessage("CAPTCHA_REGF_PROMT")?></label>
				<input type="text" class="form-control" name="captcha_word" maxlength="50" value="" autocomplete="off" />
			</div>
	</div>
	<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
		<div class="row form-group">
		<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
			<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold"><?=$arUserField["EDIT_FORM_LABEL"]?>
					<?if ($arUserField["MANDATORY"]=="Y"):?>
						<span class="starrequired">*</span>
					<?endif;?>
				</label>
				<div class="col-md-12 mb-3 mb-md-0">
				<?$APPLICATION->IncludeComponent(
					"bitrix:system.field.edit",
					$arUserField["USER_TYPE"]["USER_TYPE_ID"],
					array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "regform"), null, array("HIDE_ICONS"=>"Y"));?>			</div>
				</div>
			</div>
		<?endforeach;?>
	<?endif;?>
	<?endif?>
	<?$APPLICATION->IncludeComponent("bitrix:main.userconsent.request", "",
		array(
			"ID" => COption::getOptionString("main", "new_user_agreement", ""),
			"IS_CHECKED" => "Y",
			"AUTO_SAVE" => "N",
			"IS_LOADED" => "Y",
			"ORIGINATOR_ID" => $arResult["AGREEMENT_ORIGINATOR_ID"],
			"ORIGIN_ID" => $arResult["AGREEMENT_ORIGIN_ID"],
			"INPUT_NAME" => $arResult["AGREEMENT_INPUT_NAME"],
			"REPLACE" => array(
				"button_caption" => GetMessage("AUTH_REGISTER"),
				"fields" => array(
					rtrim(GetMessage("AUTH_NAME"), ":"),
					rtrim(GetMessage("AUTH_LAST_NAME"), ":"),
					rtrim(GetMessage("AUTH_LOGIN_MIN"), ":"),
					rtrim(GetMessage("AUTH_PASSWORD_REQ"), ":"),
					rtrim(GetMessage("AUTH_EMAIL"), ":"),
				)
			),
		)
	);?>
	<div class="row form-group">
		<div class="col-md-12">
			<input class="btn btn-primary  py-2 px-4 rounded-0" type="submit" name="Register" value="<?=GetMessage("AUTH_REGISTER")?>" />
		</div>
	</div>

</form>

<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>

<p><a href="<?=$arResult["AUTH_AUTH_URL"]?>" rel="nofollow"><b><?=GetMessage("AUTH_AUTH")?></b></a></p>

<script type="text/javascript">
document.bform.USER_NAME.focus();
</script>

<?endif?>

</noindex>
</div>