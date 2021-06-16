<?php

namespace refaltor\customCraft;

use pocketmine\inventory\ShapedRecipe;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;

class customCraft extends PluginBase
{
    public function onEnable()
    {
        $this->saveResource('config.yml');
		$config = $this->getConfig();
		foreach($config->getAll()['crafts'] as $craft)
		{
			$recipes = new ShapedRecipe(
				array("abc","def","ghi"),
				array (
					"a" => self::getItem($craft["shape"][0][0]),
					"b" => self::getItem($craft["shape"][0][1]),
					"c" => self::getItem($craft["shape"][0][2]),
					"d" => self::getItem($craft["shape"][1][0]),
					"e" => self::getItem($craft["shape"][1][1]),
					"f" => self::getItem($craft["shape"][1][2]),
					"g" => self::getItem($craft["shape"][2][0]),
					"h" => self::getItem($craft["shape"][2][1]),
					"i" => self::getItem($craft["shape"][2][2]),
				),
				[self::getItem($craft["result"])]
			);
			$this->getServer()->getCraftingManager()->registerShapedRecipe($recipes);
		}
    }

    private static function getItem(array $item) : Item
	{
		$items = Item::fromString($item[0]);
		if(isset($item[1])) {
			$items->setCount((int) $item[1]);
		}
		if (isset($item[2])){
		    $items->setCustomName((string)$item[2]);
        }
		return $items;
	}
}