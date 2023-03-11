<?
use Bitrix\Main\EventManager,
   Bitrix\Main\Diag\Debug,
   Bitrix\Main\Context,
   Bitrix\Main\UserGroupTable;

$eventManager = EventManager::getInstance();

/* ---------------------------------------------------------------------------------------------------- EMAIL to LOGIN */
$eventManager->addEventHandler('main', 'OnAfterUserRegister', ['UserRole', 'OnAfterUserRegisterHandler']);


class UserRole
{
    // создаем обработчик события "OnAfterUserRegister"
    public static function OnAfterUserRegisterHandler(&$arFields)
    {
=      if($arFields["UF_FLAG"] == "1"){

         UserGroupTable::add(array(

            'USER_ID' => $arFields["RESULT_MESSAGE"]["ID"],

            'GROUP_ID' => 6,

         ));
      }elseif($arFields["UF_FLAG"] == "2"){
         UserGroupTable::add(array(

            'USER_ID' => $arFields["RESULT_MESSAGE"]["ID"],

            'GROUP_ID' => 7,

         ));
         return $arFields;
      }
    }
}
      // if($arFields["UF_FLAG"] == "1"){
      //    CUser::SetUserGroup($arFields["USER_ID"], 6);
      // }elseif($arFields["UF_FLAG"] == "2"){
      //    CUser::SetUserGroup($arFields["USER_ID"], 7);
      // }
?>

