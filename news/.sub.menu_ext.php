<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;

if(CModule::IncludeModule("iblock")){
    $aMenuLinksExt = Array();
    $arOrder = Array("PROPERTY_THEME" => "ASC", "SORT" => "ASC");
    $arFilter = Array("IBLOCK_ID" => 2);
    $arSelect = array("NAME", "DETAIL_PAGE_URL");
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
    
    while ($arItem = $res->GetNext()) {
        array_push($aMenuLinksExt, array($arItem["NAME"], $arItem["DETAIL_PAGE_URL"]));
    }
}
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>