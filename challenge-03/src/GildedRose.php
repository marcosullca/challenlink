<?php

namespace App;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    
    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        static $quality_sulfuras = 80;

        if($this->quality <50){

            if($this->name == 'Aged Brie' || $this->name =='Backstage passes to a TAFKAL80ETC concert'){
                
                if ($this->sellIn < 11) {
                    $this->quality = $this->quality + 1;
                }
                if ($this->sellIn < 6) {
                    $this->quality = $this->quality + 1;
                }
            }elseif($this->name == 'Conjured'){
                if ($this->sellIn < 11) {
                    $this->quality = $this->quality - 2;
                }
                if ($this->sellIn < 6) {
                    $this->quality = $this->quality - 2;
                }
            }
            else{

                $this->quality --;

            }

        }else if($this->name == 'Sulfuras, Hand of Ragnaros'){
            $this->quality = $quality_sulfuras;
        }



    }
}
