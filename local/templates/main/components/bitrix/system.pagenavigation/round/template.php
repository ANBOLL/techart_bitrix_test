<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

$colorSchemes = array(
	"green" => "bx-green",
	"yellow" => "bx-yellow",
	"red" => "bx-red",
	"blue" => "bx-blue",
);
$colorScheme = $colorSchemes[$arParams["TEMPLATE_THEME"]] ?? "";
?>

<section class="pagination">
	
<ul class="pagination_item">
<?php
if ($arResult["NavPageCount"] == 1) {
    return false;
}
$begin = $arResult["NavPageNomer"] - intval(2 / 2);
if (($begin >= 1) && ($arResult["NavPageCount"] - 2 >= 1)) {
    ?>
    <a class="pagination_list_1" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=1?>"><div class="arrow_first_page"></div></a>
    <?php
}
for ($j = 0; $j <= 2; $j++) {
    $i = $begin + $j;   
    if ($i < 1) {
        continue;
    }
    if ($i > $arResult["NavPageCount"]) {
        break;
    }
    if ($i == $arResult["NavPageNomer"]) {
        ?>
        <a class="pagination_list active"><?= $i ?></a>
        <?php
    } else {
		?>
        <a class="pagination_list" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$i?>"><?= $i ?></a>
        <?php
    }
}
if ($begin + 2 <= $arResult["NavPageCount"]) {
    ?>
    <a class="pagination_list_1" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><div class="arrow_last_page"></div></a>
    <?php
}
?>
</ul>
</section>