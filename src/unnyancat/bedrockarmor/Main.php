<?php

namespace unnyancat\bedrockarmor;

use pocketmine\item\ArmorTypeInfo;
use pocketmine\item\ItemIdentifier;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use Refaltor\Natof\CustomItem\CustomItem;

class Main extends PluginBase {
    public static Main $instance;

    protected function onEnable(): void
    {
        $this->getServer()->getLogger()->info("§0Bedrock Armor §fget §aInjected");
    }

    public function loadItems() {
        if (Server::getInstance()->getPluginManager()->getPlugin("CustomItem") != null) {

            $helmet = CustomItem::createHelmetItem(new ItemIdentifier(2036, 0), new ArmorTypeInfo(10, 500, 0), "bedrock helmet");
            $helmet->setTexture('bedrock_helmet');

            $chestplate = CustomItem::createChestPlateItem(new ItemIdentifier(2037, 0), new ArmorTypeInfo(10, 500, 1), "bedrock chestplate");
            $chestplate->setTexture('bedrock_chestplate');

            $leggings = CustomItem::createLeggingsItem(new ItemIdentifier(2038, 0), new ArmorTypeInfo(10, 500, 2), "bedrock leggings");
            $leggings->setTexture('bedrock_leggings');

            $boots = CustomItem::createBootsItem(new ItemIdentifier(2039, 0), new ArmorTypeInfo(10, 500, 3), "bedrock boots");
            $boots->setTexture('bedrock_boots');

            $items = [$chestplate, $helmet, $leggings, $boots];
            foreach ($items as $item) {
                CustomItem::registerItem($item);
            }
        }
    }

    protected function onDisable(): void
    {
        $this->getServer()->getLogger()->info("§cLe test de unnyancat s'arrête");
    }

    protected function onLoad(): void {
        $this->loadItems();
    }
}