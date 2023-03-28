<?php
/**
*  ______  __  __          _   _    _ _____ 
* |  ____|/ _|/ _|        | | | |  | |_   _|
* | |__  | |_| |_ ___  ___| |_| |  | | | |  
* |  __| |  _|  _/ _ \/ __| __| |  | | | |  
* | |____| | | ||  __/ (__| |_| |__| |_| |_ 
* |______|_| |_| \___|\___|\__|\____/|_____|
* Plugin EffectUI
* https://github.com/FRashkar-pm/EffectUI                                       
*/

namespace FRashkar\EffectUI;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\PluginOwned;
use pocketmine\Server;
use FRashkar\EffectUI\Main;
use pocketmine\utils\TextFormat;

class EffectUICommand extends Command  { 
    
    private Main $main;
    
    public function __construct(Main $main) {
        $this->main = $main;
        parent::__construct("effectui", "Open EffectUI", "/effectui", ["eui"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if (!$sender instanceof Player) {
            $sender->sendMessage(TextFormat::RED . "Use it in-game Please!");
            return;
        }
        if (!$sender->hasPermission("effectui.cmd")) {
            $sender->sendMessage(TextFormat::RED . "You don't have permission to use this command!");
            return;
        }else {
            $this->getOwningPlugin()->openEffectsUI($sender);
        }
        return;
    }
    
    public function getOwningPlugin() : Main {
        return $this->main;
    }
}
