<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
// $APPLICATION->SetPageProperty("TITLE", "FEEDBACK");
$APPLICATION->SetPageProperty("keywords", "feedback");
$APPLICATION->SetPageProperty("description", "Страница обратной связи");
$APPLICATION->SetTitle("Связь");
?>
<div class="mb-4">
<h2>Задайте нам вопрос!</h2>
<p>Отправьте сообщение и свои контактные данные чтобы мы могли связаться с вами!</p>
</div>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback", 
	"feedback.forms", 
	array(
		"EMAIL_TO" => "myglavniyacount@gmail.com",
		"EVENT_MESSAGE_ID" => array(
		),
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "EMAIL",
			2 => "MESSAGE",
            3 => "THEME",
		),
		"USE_CAPTCHA" => "Y",
		"COMPONENT_TEMPLATE" => "feedback.forms"
	),
	false
);?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>