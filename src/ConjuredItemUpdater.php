<?php
declare(strict_types=1);

namespace GildedRose;

class ConjuredItemUpdater extends ItemUpdater
{

    public function updateQuality(): void
    {
        parent::updateQuality();
        parent::updateQuality();
    }

    protected function updateExpired(): void
    {
        parent::updateExpired();
        parent::updateExpired();
    }


}
