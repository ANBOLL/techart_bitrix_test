<?php
use \Bitrix\Main\Loader;
use \Bitrix\Main\Application;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

class ExampleCompSimple extends CBitrixComponent {
    private $_request;

    private function _checkModules() {
        if (   !Loader::includeModule('iblock')
            || !Loader::includeModule('sale')
        ) {
            throw new \Exception('Не загружены модули необходимые для работы модуля');
        }

        return true;
    }

    private function _app() {
        global $APPLICATION;
        return $APPLICATION;
    }

    private function _user() {
        global $USER;
        return $USER;
    }

    public function onPrepareComponentParams($arParams) {
        return $arParams;
    }

    public function executeComponent() {
        $this->_checkModules();

        $this->_request = Application::getInstance()->getContext()->getRequest();
        
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
        $this->arResult['THEME_LIST'] = $themeList;
        $this->includeComponentTemplate();
    }
}
