<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
    <ul class="lg:flex items-start justify-between w-full mr-10  font-light">

    <?php
    $previousLevel = 0;
    $totalItems = count($arResult);
foreach($arResult as $index => $arItem):?>

    <?if ($previousLevel  && $arItem["PARAMS"]["deph"] < $previousLevel ): ?>
        <?=str_repeat("</ul></li>", ($previousLevel - $arItem['PARAMS']["deph"]));?>
    <?endif?>

    <?if ( $arItem['PARAMS']["IS_PARENT"] == "Y"):?>

    <?if ($arItem['PARAMS']["deph"] == 1):?>
    <li x-data="{ showDropdown<?=$arItem["ITEM_INDEX"]?>: false }"
        @mouseover="showDropdown<?=$arItem["ITEM_INDEX"]?> = true"
        @mouseleave="showDropdown<?=$arItem["ITEM_INDEX"]?> = false"
        @click="showDropdown<?=$arItem["ITEM_INDEX"]?> = !showDropdown<?=$arItem["ITEM_INDEX"]?>"
        class="inline-block relative py-3 padding-main-menu" x-transition><a
            href="<?=($arItem["PARAMS"]["LINK"] == 'NO') ?  '#': $arItem["LINK"]?>" <?if($arItem["PARAMS"]["deph"]=='' )
    :?>@click.prevent=""
        <?endif;?> class="flex items-center gap-2 hover:underline"><?=$arItem["TEXT"]?>
        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="4" viewBox="0 0 9 4" fill="none">
            <path
                    d="M4.33503 3.99865C4.19035 3.99891 4.05015 3.95243 3.93875 3.86729L0.22368 1.01162C0.0972331 0.914678 0.0177155 0.775372 0.00262005 0.624349C-0.0124754 0.473327 0.038088 0.322958 0.143186 0.206323C0.248285 0.089688 0.39931 0.0163408 0.563037 0.00241676C0.726764 -0.0115073 0.889782 0.0351323 1.01623 0.132076L4.33503 2.69075L7.65382 0.223457C7.71716 0.176016 7.79003 0.140587 7.86826 0.119209C7.94649 0.0978302 8.02852 0.090923 8.10965 0.0988842C8.19078 0.106845 8.26941 0.129517 8.34101 0.165598C8.41261 0.201679 8.47577 0.250457 8.52687 0.309127C8.58357 0.367852 8.62651 0.436746 8.65301 0.511492C8.67951 0.586238 8.68898 0.665226 8.68084 0.743508C8.67271 0.821789 8.64713 0.897677 8.60572 0.966417C8.56431 1.03516 8.50795 1.09527 8.44018 1.14298L4.72511 3.90156C4.61051 3.97324 4.47317 4.00743 4.33503 3.99865Z"
                    fill="currentColor" />
        </svg>
    </a>
    <ul x-transition x-show="showDropdown<?=$arItem["ITEM_INDEX"]?>"
        class="!mt-0 pt-2 py-2 text-white dropdown bg-blue bg-opacity-60">
    <?else:?>
    <? $parentIndexDropdown = $arItem["ITEM_INDEX"] ?>

    <li x-data="{ showDropdown<?=$parentIndexDropdown?>: false }"
        @mouseover="showDropdown<?=$parentIndexDropdown?> = true"
        @mouseleave="showDropdown<?=$parentIndexDropdown?> = false" @click="showDropdown1 = !showDropdown1"
        class="inline-block relative py-2 padding-main-menu <?if ($arItem[" SELECTED"]):?>font-semibold
        <?endif?>"
        x-transition
    ><a href="<?=$arItem["LINK"]?>"

        <?=($arItem["PARAMS"]["deph"] <> '') ? '' : '@click.prevent=""'?> class="flex items-center gap-2
          hover:underline"><?=$arItem["TEXT"]?>
        <svg class="icon-right-main-menu" xmlns="http://www.w3.org/2000/svg" width="9" height="4" viewBox="0 0 9 4"
             fill="none">
            <path
                    d="M4.33503 3.99865C4.19035 3.99891 4.05015 3.95243 3.93875 3.86729L0.22368 1.01162C0.0972331 0.914678 0.0177155 0.775372 0.00262005 0.624349C-0.0124754 0.473327 0.038088 0.322958 0.143186 0.206323C0.248285 0.089688 0.39931 0.0163408 0.563037 0.00241676C0.726764 -0.0115073 0.889782 0.0351323 1.01623 0.132076L4.33503 2.69075L7.65382 0.223457C7.71716 0.176016 7.79003 0.140587 7.86826 0.119209C7.94649 0.0978302 8.02852 0.090923 8.10965 0.0988842C8.19078 0.106845 8.26941 0.129517 8.34101 0.165598C8.41261 0.201679 8.47577 0.250457 8.52687 0.309127C8.58357 0.367852 8.62651 0.436746 8.65301 0.511492C8.67951 0.586238 8.68898 0.665226 8.68084 0.743508C8.67271 0.821789 8.64713 0.897677 8.60572 0.966417C8.56431 1.03516 8.50795 1.09527 8.44018 1.14298L4.72511 3.90156C4.61051 3.97324 4.47317 4.00743 4.33503 3.99865Z"
                    fill="currentColor" />
        </svg>
    </a>
    <ul x-show="showDropdown<?=$parentIndexDropdown?>" class="!mt-0 pt-2 py-2 text-white dropdown bg-blue bg-opacity-60 third_level_menu_main
          <?php echo ($index < $totalItems / 2) ? 'third-level-to-bottom' : 'third-level-to-top'; ?>"
        style="max-height: 600px;overflow: auto">
    <?endif?>
    <?else:?>

        <?if ($arItem['PARAMS']["deph"] == 1):?>
            <li class="inline-block relative py-3 "><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["
              SELECTED"]):?>root-item-selected
              <?else:?>root-item
              <?endif?> hover:underline" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?>
                </a></li>
        <?else: ?>
            <li class="py-2 denied padding-main-menu font-light"><a class="hover:underline"
                                                                    href="<?=( $arItem["PARAMS"]["URL"] ) ? $arItem["PARAMS"]["URL"]:$arItem["LINK"]?>"
                                                                    title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>

        <?endif?>

    <?endif?>

    <?$previousLevel = $arItem['PARAMS']["deph"];?>

<?endforeach?>

    <?if ($previousLevel > 1)://close last item tags?>
        <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
    <?endif?>

    </ul>
    <div class="menu-clear-left"></div>
<?endif?>