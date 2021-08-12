<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $this->updateItem($item);
        }
    }

    public function updateItem($item): void
    {
        $classifier = new ItemClassifier();

        $myItem = $classifier->categorize($item);

        $myItem->update();
    }

}
