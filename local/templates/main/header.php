<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php use \Bitrix\Main\Page\Asset; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?= SITE_TEMPLATE_PATH?>/assets/img/logo.svg">
    <title>
        <? $APPLICATION->ShowTitle();  ?>
    </title>
    <?php
    Asset::getInstance()->addCss('/styles/auth.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/index.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/indexmobile.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/headermobile.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/footermobile.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/page.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/pagemobile.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/register.css');
    ?>
    <?php $APPLICATION->ShowHead(); ?>
</head>
<body>
<div class="test">
<?php $APPLICATION->ShowPanel();?>
</div>
<header>
    <a href="/news/" class="header_a">
        <div class="logotype">
            <img src="<?= SITE_TEMPLATE_PATH?>/assets/img/logo.svg" alt="logo" class="logo_image">
            <p class="text_logo">Галактический<br>вестник</p>
        </div>
    </a>
   
<?$APPLICATION->IncludeComponent("bitrix:menu", "menu.multilevel", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "sub",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "2",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"COMPONENT_TEMPLATE" => "horizontal_multilevel"
	),
	false
);?>

<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "loginForm", Array(
	"REGISTER_URL" => "register.php",	// Страница регистрации
		"FORGOT_PASSWORD_URL" => "",	// Страница забытого пароля
		"PROFILE_URL" => "profile.php",	// Страница профиля
		"SHOW_ERRORS" => "Y",	// Показывать ошибки
	),
	false
);?>
<?$APPLICATION->IncludeComponent("bitrix:search.form", "suggest.search", Array(
	"PAGE" => "#SITE_DIR#search/index.php",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
		"USE_SUGGEST" => "Y",
		"COMPONENT_TEMPLATE" => "suggest"
	),
	false
);?>
</header>