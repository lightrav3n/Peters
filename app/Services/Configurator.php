<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class Configurator
{
    public $items = null;

    public function __construct($oldConfig)
    {
        if($oldConfig){
            $this->items = $oldConfig->items;
        }
    }

    public function add($item, $id){
        $storedItem = ['item' => $item];
//        dd($item->category->id);
//        $storedItem['item']['id'];
//        $storedItem['item']->category->id;
//        dd($storedItem['item']['id']);
        if ($storedItem['item']->category->id == $item->category->id){
            unset($this->items[$storedItem['item']['id']]);
        }
        if ($this->items){
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $this->items[$id] = $storedItem;
    }

    public function removeItem($id){
        unset($this->items[$id]);
    }

}
