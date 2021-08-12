<?php
declare(strict_types=1);

namespace GildedRose;

class AgedBrieUpdater extends ItemUpdater
{
    public function updateQuality(): void
    {
        $this->increaseQuality();
    }

    protected function updateExpired(): void
    {
        $this->increaseQuality();
    }

}
