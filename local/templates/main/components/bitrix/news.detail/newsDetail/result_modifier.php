<?
$arResult["forbidden"] = true;
if (!$USER->IsAuthorized()):
if ($arResult["PROPERTIES"]["access"]["VALUE_ENUM_ID"] == 5){
    $arResult["forbidden"] = false;
} 
echo "<pre>";
//var_dump($arResult);
echo "</pre>";

endif;