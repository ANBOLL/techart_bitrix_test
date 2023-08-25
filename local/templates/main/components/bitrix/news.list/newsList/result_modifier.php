<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

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


if ($USER->IsAuthorized()):

$IBLOCK_ID = 1;
$themeIds = array();

$arOrder = Array("PROPERTY_THEME" => "ASC", "SORT" => "ASC");
$arFilter = Array("IBLOCK_ID" => $IBLOCK_ID, "ACTIVE" => "Y");
$arSelect = array("ID", "NAME", "ELEMENT_ID", "PROPERTY_THEME");
$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);

while ($arItem = $res->GetNext()) {
    $NewsList[$arItem['ID']] = $arItem['ID'];
}
if (!empty($NewsList)) {
    asort($NewsList);
}

$arResult["NEWS"] = $NewsList;
//   echo "<pre>";
//   var_dump($NewsList);
//   echo "</pre>";
endif;
if (!$USER->IsAuthorized()):

    $IBLOCK_ID = 1;
    $themeIds = array();
    
    $arOrder = Array("PROPERTY_THEME" => "ASC", "SORT" => "ASC");
    $arFilter = Array("PROPERTY_access" => 4,"IBLOCK_ID" => $IBLOCK_ID, "ACTIVE" => "Y");
    $arSelect = array("ID", "NAME", "ELEMENT_ID", "PROPERTY_THEME");
    $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
    
    while ($arItem = $res->GetNext()) {
        $NewsList[$arItem['ID']] = $arItem['ID'];
    }
    if (!empty($NewsList)) {
        asort($NewsList);
    }
    
    $arResult["NEWS"] = $NewsList;
    //   echo "<pre>";
    //  var_dump($NewsList);
    //   echo "</pre>";
    endif;
