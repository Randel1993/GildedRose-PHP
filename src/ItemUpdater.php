<?php
declare(strict_types=1);

namespace GildedRose;

class ItemUpdater
{

    protected $item;

    function __construct($item)
    {
        $this->item = $item;
    }

    public function __toString()
    {
        return "{$this->item}";
    }

    protected function decreaseQuality(): void
    {
        if ($this->item->quality > 0) {
            $this->item->quality = $this->item->quality - 1;
        }
    }

    protected function increaseQuality(): void
    {
        if ($this->item->quality < 50) {
            $this->item->quality = $this->item->quality + 1;
        }
    }

    public function updateSellIn(): void
    {
        $this->item->sell_in = $this->item->sell_in - 1;
    }

    public function updateQuality(): void
    {
        $this->decreaseQuality();
    }

    public function update(): void
    {
        $this->updateQuality();
        $this->updateSellIn();
        if ($this->item->sell_in < 0) {
            $this->updateExpired();
        }
    }

    protected function updateExpired(): void
    {
        $this->decreaseQuality();
    }
}

