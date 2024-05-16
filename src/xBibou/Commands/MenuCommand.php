<?php

namespace xBibou\Commands;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\transaction\DeterministicInvMenuTransaction;
use muqsit\invmenu\type\InvMenuTypeIds;
use pocketmine\block\utils\DyeColor;
use pocketmine\block\VanillaBlocks;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\item\StringToItemParser;
use pocketmine\player\Player;
use xBibou\Main;

class MenuCommand extends Command
{
    public function __construct()
    {
        parent::__construct("menu", "§e[§6E§e] §fOuvrir le Menu", "/menu");
        $this->setPermission("menu.use");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        $item1 = StringToItemParser::getInstance()->parse(Main::getInstance()->getConfig()->get("item_1"));
        $item1->setCustomName(Main::getInstance()->getConfig()->get("name_item_1"));
        $item2 = StringToItemParser::getInstance()->parse(Main::getInstance()->getConfig()->get("item_2"));
        $item2->setCustomName(Main::getInstance()->getConfig()->get("name_item_2"));
        $item3 = StringToItemParser::getInstance()->parse(Main::getInstance()->getConfig()->get("item_3"));
        $item3->setCustomName(Main::getInstance()->getConfig()->get("name_item_3"));
        $item4 = StringToItemParser::getInstance()->parse(Main::getInstance()->getConfig()->get("item_4"));
        $item4->setCustomName(Main::getInstance()->getConfig()->get("name_item_4"));
        $item5 = StringToItemParser::getInstance()->parse(Main::getInstance()->getConfig()->get("item_5"));
        $item5->setCustomName(Main::getInstance()->getConfig()->get("name_item_5"));
        $item6 = StringToItemParser::getInstance()->parse(Main::getInstance()->getConfig()->get("item_6"));
        $item6->setCustomName(Main::getInstance()->getConfig()->get("name_item_6"));
        $item7 = StringToItemParser::getInstance()->parse(Main::getInstance()->getConfig()->get("item_7"));
        $item7->setCustomName(Main::getInstance()->getConfig()->get("name_item_7"));
        $item8 = StringToItemParser::getInstance()->parse(Main::getInstance()->getConfig()->get("item_8"));
        $item8->setCustomName(Main::getInstance()->getConfig()->get("name_item_8"));
        $item9 = StringToItemParser::getInstance()->parse(Main::getInstance()->getConfig()->get("item_9"));
        $item9->setCustomName(Main::getInstance()->getConfig()->get("name_item_9"));
        $item10 = StringToItemParser::getInstance()->parse(Main::getInstance()->getConfig()->get("item_10"));
        $item10->setCustomName(Main::getInstance()->getConfig()->get("name_item_10"));

        $slot_item_1 = Main::getInstance()->getConfig()->get("slot_item_1");
        $slot_item_2 = Main::getInstance()->getConfig()->get("slot_item_2");
        $slot_item_3 = Main::getInstance()->getConfig()->get("slot_item_3");
        $slot_item_4 = Main::getInstance()->getConfig()->get("slot_item_4");
        $slot_item_5 = Main::getInstance()->getConfig()->get("slot_item_5");
        $slot_item_6 = Main::getInstance()->getConfig()->get("slot_item_6");
        $slot_item_7 = Main::getInstance()->getConfig()->get("slot_item_7");
        $slot_item_8 = Main::getInstance()->getConfig()->get("slot_item_8");
        $slot_item_9 = Main::getInstance()->getConfig()->get("slot_item_9");
        $slot_item_10 = Main::getInstance()->getConfig()->get("slot_item_10");

        if ($sender instanceof Player) {
            $menu = InvMenu::create(InvMenuTypeIds::TYPE_DOUBLE_CHEST);
            $menu->setListener(InvMenu::readonly(function (DeterministicInvMenuTransaction $transaction) {
                $this->Menu($transaction->getPlayer(), $transaction->getItemClicked());
            }));
            {
                $menu->setName("§e- §6Menu §e-");
                $menu->getInventory()->setItem(0, VanillaBlocks::STAINED_GLASS()->setColor(DyeColor::YELLOW())->asItem()->setCustomName("§r§4Impossible"));
                $menu->getInventory()->setItem(1, VanillaBlocks::STAINED_GLASS()->setColor(DyeColor::YELLOW())->asItem()->setCustomName("§r§4Impossible"));
                $menu->getInventory()->setItem(9, VanillaBlocks::STAINED_GLASS()->setColor(DyeColor::YELLOW())->asItem()->setCustomName("§r§4Impossible"));
                $menu->getInventory()->setItem(7, VanillaBlocks::STAINED_GLASS()->setColor(DyeColor::YELLOW())->asItem()->setCustomName("§r§4Impossible"));
                $menu->getInventory()->setItem(8, VanillaBlocks::STAINED_GLASS()->setColor(DyeColor::YELLOW())->asItem()->setCustomName("§r§4Impossible"));
                $menu->getInventory()->setItem(17, VanillaBlocks::STAINED_GLASS()->setColor(DyeColor::YELLOW())->asItem()->setCustomName("§r§4Impossible"));
                $menu->getInventory()->setItem(36, VanillaBlocks::STAINED_GLASS()->setColor(DyeColor::YELLOW())->asItem()->setCustomName("§r§4Impossible"));
                $menu->getInventory()->setItem(45, VanillaBlocks::STAINED_GLASS()->setColor(DyeColor::YELLOW())->asItem()->setCustomName("§r§4Impossible"));
                $menu->getInventory()->setItem(46, VanillaBlocks::STAINED_GLASS()->setColor(DyeColor::YELLOW())->asItem()->setCustomName("§r§4Impossible"));
                $menu->getInventory()->setItem(52, VanillaBlocks::STAINED_GLASS()->setColor(DyeColor::YELLOW())->asItem()->setCustomName("§r§4Impossible"));
                $menu->getInventory()->setItem(53, VanillaBlocks::STAINED_GLASS()->setColor(DyeColor::YELLOW())->asItem()->setCustomName("§r§4Impossible"));
                $menu->getInventory()->setItem(44, VanillaBlocks::STAINED_GLASS()->setColor(DyeColor::YELLOW())->asItem()->setCustomName("§r§4Impossible"));

                $menu->getInventory()->setItem($slot_item_1, $item1);
                $menu->getInventory()->setItem($slot_item_2, $item2);
                $menu->getInventory()->setItem($slot_item_3, $item3);
                $menu->getInventory()->setItem($slot_item_4, $item4);
                $menu->getInventory()->setItem($slot_item_5, $item5);
                $menu->getInventory()->setItem($slot_item_6, $item6);
                $menu->getInventory()->setItem($slot_item_7, $item7);
                $menu->getInventory()->setItem($slot_item_8, $item8);
                $menu->getInventory()->setItem($slot_item_9, $item9);
                $menu->getInventory()->setItem($slot_item_10, $item10);
                $menu->send($sender);

            }
        }
    }

    public function Menu(Player $p, Item $item): bool
    {
        $commanditem1 = Main::getInstance()->getConfig()->get("command_item_1");
        $nameitem1 = Main::getInstance()->getConfig()->get("name_item_1");
        $commanditem2 = Main::getInstance()->getConfig()->get("command_item_2");
        $nameitem2 = Main::getInstance()->getConfig()->get("name_item_2");
        $commanditem3 = Main::getInstance()->getConfig()->get("command_item_3");
        $nameitem3 = Main::getInstance()->getConfig()->get("name_item_3");
        $commanditem4 = Main::getInstance()->getConfig()->get("command_item_4");
        $nameitem4 = Main::getInstance()->getConfig()->get("name_item_4");
        $commanditem5 = Main::getInstance()->getConfig()->get("command_item_5");
        $nameitem5 = Main::getInstance()->getConfig()->get("name_item_5");
        $commanditem6 = Main::getInstance()->getConfig()->get("command_item_6");
        $nameitem6 = Main::getInstance()->getConfig()->get("name_item_6");
        $commanditem7 = Main::getInstance()->getConfig()->get("command_item_7");
        $nameitem7 = Main::getInstance()->getConfig()->get("name_item_7");
        $commanditem8 = Main::getInstance()->getConfig()->get("command_item_8");
        $nameitem8 = Main::getInstance()->getConfig()->get("name_item_8");
        $commanditem9 = Main::getInstance()->getConfig()->get("command_item_9");
        $nameitem9 = Main::getInstance()->getConfig()->get("name_item_9");
        $commanditem10 = Main::getInstance()->getConfig()->get("command_item_10");
        $nameitem10 = Main::getInstance()->getConfig()->get("name_item_10");

        if ($item->getName() == "§r§4Impossible") {
            $p->removeCurrentWindow();
        }
        if ($item->getName() == $nameitem1) {
            $p->chat($commanditem1);
        }
        if ($item->getName() == $nameitem2) {
            $p->chat($commanditem2);
        }
        if ($item->getName() == $nameitem3) {
            $p->chat($commanditem3);
        }
        if ($item->getName() == $nameitem4) {
            $p->chat($commanditem4);
        }
        if ($item->getName() == $nameitem5) {
            $p->chat($commanditem5);
        }
        if ($item->getName() == $nameitem6) {
            $p->chat($commanditem6);
        }
        if ($item->getName() == $nameitem7) {
            $p->chat($commanditem7);
        }
        if ($item->getName() == $nameitem8) {
            $p->chat($commanditem8);
        }
        if ($item->getName() == $nameitem9) {
            $p->chat($commanditem9);
        }
        if ($item->getName() == $nameitem10) {
            $p->chat($commanditem10);
            $p->removeCurrentWindow();
        }
        return true;
    }
}