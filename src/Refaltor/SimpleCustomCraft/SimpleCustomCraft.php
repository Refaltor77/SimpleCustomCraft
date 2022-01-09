<?php

namespace Refaltor\SimpleCustomCraft;

use pocketmine\plugin\PluginBase;

class SimpleCustomCraft extends PluginBase
{
    protected function onEnable(): void
    {
        $this->saveDefaultConfig();
        (new Recipes())->registerCrafts($this);
    }
}