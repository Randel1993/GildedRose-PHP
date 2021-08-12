<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testNormalItem(): void
    {
        $items = [new Item('+5 Dexterity Vest', 10, 20), new Item('Trouser', 1 , 5)];

        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        // reduce sell_in
        $this->assertEquals($items[0]->sell_in, 9);
        $this->assertEquals($items[1]->sell_in, 0);

        // update quality
        $this->assertEquals($items[0]->quality, 19);
        $this->assertEquals($items[1]->quality, 4);

        $gildedRose->updateQuality();

        // reduce sell_in
        $this->assertEquals($items[0]->sell_in, 8);
        $this->assertEquals($items[1]->sell_in, -1);

        // update quality
        $this->assertEquals($items[0]->quality, 18);
        $this->assertEquals($items[1]->quality, 2);
    }

    public function testSulfuras(): void
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 0, 80), new Item('Sulfuras, Hand of Ragnaros', -1, 80)];

        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        // reduce sell_in
        $this->assertEquals($items[0]->sell_in, 0);
        $this->assertEquals($items[1]->sell_in, -1);

        // update quality
        $this->assertEquals($items[0]->quality, 80);
        $this->assertEquals($items[1]->quality, 80);
    }

    public function testAgedBrie(): void
    {
        $items = [new Item('Aged Brie', 2, 0)];

        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        // assert
        $this->assertEquals($items[0]->sell_in, 1);
        $this->assertEquals($items[0]->quality, 1);

        $gildedRose->updateQuality();

        // assert
        $this->assertEquals($items[0]->sell_in, 0);
        $this->assertEquals($items[0]->quality, 2);
    }

    public function testBackstagePass(): void
    {
        $items = [new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20), new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49)];

        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        // reduce sell_in
        $this->assertEquals($items[0]->sell_in, 14);
        $this->assertEquals($items[1]->sell_in, 9);

        // update quality
        $this->assertEquals($items[0]->quality, 21);
        $this->assertEquals($items[1]->quality, 50);

        $gildedRose->updateQuality();

        // reduce sell_in
        $this->assertEquals($items[0]->sell_in, 13);
        $this->assertEquals($items[1]->sell_in, 8);

        // update quality
        $this->assertEquals($items[0]->quality, 22);
        $this->assertEquals($items[1]->quality, 50);

        $gildedRose->updateQuality();
        $gildedRose->updateQuality();
        $gildedRose->updateQuality();
        $gildedRose->updateQuality();

        // reduce sell_in
        $this->assertEquals($items[0]->sell_in, 9);
        $this->assertEquals($items[1]->sell_in, 4);


        // update quality
        $this->assertEquals($items[0]->quality, 27);
        $this->assertEquals($items[1]->quality, 50);

    }

    public function testConjured(): void
    {
        $items = [new Item('Conjured Mana Cake', 3, 6)];

        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        // reduce sell_in
        $this->assertEquals($items[0]->sell_in, 2);
        $this->assertEquals($items[0]->quality, 4);
    }


}
