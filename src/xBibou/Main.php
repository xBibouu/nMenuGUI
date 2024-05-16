<?php

namespace xBibou;

use muqsit\invmenu\InvMenuHandler;
use pocketmine\plugin\PluginBase;
use xBibou\Commands\MenuCommand;


class Main extends PluginBase{

    public static Main $instance;

    public function onEnable(): void
    {
        if(!InvMenuHandler::isRegistered())
            InvMenuHandler::register($this);
        self::$instance = $this;

        $this->getServer()->getLogger()->info("Le plugin Menu s'est bien lancer");

        $this->getServer()->getCommandMap()->register("", new MenuCommand());

        $this->saveDefaultConfig();
    }
    public static function getInstance(): Main
    {
        return self::$instance;
    }
    public function onDisable(): void
    {
        $this->getLogger()->info("Le plugin kit Menu est bien disable");


    }
}