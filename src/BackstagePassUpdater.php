<?php
declare(strict_types=1);

namespace GildedRose;

class BackstagePassUpdater extends ItemUpdater
{

    public function updateQuality(): void
    {
        $this->increaseQuality();
        if ($this->item->sell_in < 11) {
            $this->increaseQuality();
        }
        if ($this->item->sell_in < 6) {
            $this->increaseQuality();
        }
    }

    protected function updateExpired(): void
    {
        $this->item->quality = 0;
    }


}
