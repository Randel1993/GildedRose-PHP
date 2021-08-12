<?php
declare(strict_types=1);

namespace GildedRose;

class ItemClassifier
{
    const BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT = "Backstage passes to a TAFKAL80ETC concert";
    const SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';
    const AGED_BRIE = 'Aged Brie';
    const CONJURED = 'Conjured';

    public function categorize($item): ItemUpdater
    {
        switch($item->name) {
            case self::SULFURAS_HAND_OF_RAGNAROS: 
                $myItem = new SulfurasUpdater($item);
                break;
            case self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT:
                $myItem = new BackstagePassUpdater($item);
                break;
            case self::AGED_BRIE:
                $myItem = new AgedBrieUpdater($item);
                break;
            default:
                if($this->startsWith($item->name, self::CONJURED))
                {
                    $myItem = new ConjuredItemUpdater($item);
                } else {
                    $myItem = new ItemUpdater($item);
                } 
        }
        return $myItem;
    }

    function startsWith($string, $startString): bool
    {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }

}