<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?
$IBLOCK_ID = 2;
$themeIds = array();

$arOrder = Array("PROPERTY_THEME" => "ASC", "SORT" => "ASC");
$arFilter = Array("IBLOCK_ID" => $IBLOCK_ID, "ACTIVE" => "Y");
$arSelect = array("CODE", "NAME", "ELEMENT_ID", "PROPERTY_THEME");
$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);

while ($arItem = $res->GetNext()) {
    $themeList[$arItem['CODE']] = $arItem['NAME'];
}
if (!empty($themeList)) {
    asort($themeList);
}

$arResult["THEME_LIST"] = $themeList;