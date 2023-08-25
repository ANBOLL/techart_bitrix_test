<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("keywords", "Главная страница сайта Галактический вестник");
$APPLICATION->SetPageProperty("description", "Главная страница сайта Галактический вестник");
$APPLICATION->SetTitle("Главная");
?>
<? if (!$USER->IsAuthorized()): ?>
    <section class="login">
<h2 class="news_title_h2">Главная страница</h2>
<form class="ui-form" name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
	<h3>Вход</h3>
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="AUTH" />
    <div class="form-row">
        <input type="text" id="email" name="USER_LOGIN" maxlength="50" value="" size="17" required autocomplete="off"/><label for="email">Логин</label>
    </div>
    <div class="form-row">
        <input type="password"  id="password" name="USER_PASSWORD" maxlength="255" size="17" required autocomplete="off" /><label for="password">Пароль</label>
    </div>
    <input class="button_forms_autorize" type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" />
</form>
 </section>

<?endif?>
<? if ($USER->IsAuthorized()): ?>
 <section id="login">
 <h2 id="news_title_h2">Главная страница</h2>
 <p>Сайт Галактический вестник(HERALD) лежит на cms Bitrix. «1С-Битрикс: Управление сайтом» - это профессиональная система управления веб-проектами, универсальный программный продукт для создания, поддержки и успешного развития: корпоративных сайтов интернет-магазинов.</p>
</section>



    <?endif?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>