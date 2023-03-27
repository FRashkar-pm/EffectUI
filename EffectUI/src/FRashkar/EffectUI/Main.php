<?php
/**
*  ______ _____           _     _                                     
* |  ____|  __ \         | |   | |                                    
* | |__  | |__) |__ _ ___| |__ | | ____ _ _ __ ______ _ __  _ __ ___  
* |  __| |  _  // _` / __| '_ \| |/ / _` | '__|______| '_ \| '_ ` _ \ 
* | |    | | \ \ (_| \__ \ | | |   < (_| | |         | |_) | | | | | |
* |_|    |_|  \_\__,_|___/_| |_|_|\_\__,_|_|         | .__/|_| |_| |_|
*                                                    | |              
*                                                    |_|              
* The author of this plugin is FRashkar-pm
* https://github.com/FRashkar-pm
*/

namespace FRashkar\EffectUI;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {

    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getCommandMap()->register("effecui", new EffectUICommand("effectui", "Open EffectUI"));
    }
    
    public function onJoin(PlayerJoinEvent $ev) {
        $p = $ev->getPlayer();
        $p->getEffects()->clear();
    }
}
