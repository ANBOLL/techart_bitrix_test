<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>
<? if($arResult["USER_NAME"]) : ?>
<div class="bx-system-auth-form">
<form>
	<table width="100%">
		<tr>
			<td align="center">
				<?=$arResult["USER_NAME"]?><br />
				[<?=$arResult["USER_LOGIN"]?>]<br />

			</td>
		</tr>
		<tr >
			<td align="center">
			<?foreach ($arResult["GET"] as $key => $value):?>
				<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
			<?endforeach?>
			<?=bitrix_sessid_post()?>
			<input type="hidden" name="logout" value="yes" />
			<input class="button_forms_autorize" type="submit" name="logout_butt" value="<?=GetMessage("AUTH_LOGOUT_BUTTON")?>" />
			</td>
		</tr>
	</table>
</form>
</div>
<?endif?>
<? if($arResult["USER_NAME"] == false) : ?>
	<div class="bx-system-auth-form">
	<a href="/" id="login_but">Авторизация</a>
</div>
	<?endif?>