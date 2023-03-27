<?php
/**
*  ______  __  __          _   _    _ _____ 
* |  ____|/ _|/ _|        | | | |  | |_   _|
* | |__  | |_| |_ ___  ___| |_| |  | | | |  
* |  __| |  _|  _/ _ \/ __| __| |  | | | |  
* | |____| | | ||  __/ (__| |_| |__| |_| |_ 
* |______|_| |_| \___|\___|\__|\____/|_____|
* Plugin EffectUI
* https://github.com/FRashkar-pm                                        
*/
    

namespace FRashkar\EffectUI;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\Server;
use FRashkar\EffectUI\Main;
use pocketmine\utils\TextFormat;
use Vecnavium\FormsUI\CustomForm;
use Vecnavium\FormsUI\ModalForm;
use Vecnavium\FormsUI\SimpleForm;
use Vecnavium\FormsUI\Form;
use Vecnavium\FormsUI\FormsUI;

use pocketmine\entity\effect\Effect;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\EffectManager;
use pocketmine\entity\effect\VanillaEffects;

class EffectUICommand extends Command  { 
    
    public function openEffectsUI(Player $p) {
        $form = new SimpleForm(function(Player $p, int $r = null) {
            if($r === null) {
                return;
            }
            if($r === 0) {
                $p->getEffects()->add(new EffectInstance(VanillaEffects::NIGHT_VISION(), 20 * 999999, 2, true));
                $p->sendMessage(TextFormat::GREEN . "Night Vision Actived!");
            }
            if($r === 1) {
                $p->getEffects()->add(new EffectInstance(VanillaEffects::SPEED(), 20 * 999999, 2, true));
                $p->sendMessage(TextFormat::GREEN . "Speed Actived!");
            }
            if($r === 2) {
                $p->getEffects()->add(new EffectInstance(VanillaEffects::HASTE(), 20 * 999999, 2, true));
                $p->sendMessage(TextFormat::GREEN . "Haste Actived!");
            }
            if($r === 3) {
                $p->getEffects()->add(new EffectInstance(VanillaEffects::STRENGTH(), 20 * 999999, 2, true));
                $p->sendMessage(TextFormat::GREEN . "Strength Actived!");
            }
            if($r === 4) {
                $p->getEffects()->add(new EffectInstance(VanillaEffects::JUMP_BOOST(), 20 * 999999, 2, true));
                $p->sendMessage(TextFormat::GREEN . "Jump Boost Actived!");
            }
            if($r === 5) {
                $p->getEffects()->add(new EffectInstance(VanillaEffects::REGENERATION(), 20 * 999999, 2, true));
                $p->sendMessage(TextFormat::GREEN . "Regeneration Actived!");
            }
            if($r === 6) {
                $p->getEffects()->add(new EffectInstance(VanillaEffects::RESISTANCE(), 20 * 999999, 2, true));
                $p->sendMessage(TextFormat::GREEN . "Resistance Actived!");
            }
            if($r === 7) {
                $p->getEffects()->add(new EffectInstance(VanillaEffects::FIRE_RESISTANCE(), 20 * 999999, 2, true));
                $p->sendMessage(TextFormat::GREEN . "Fire Resistance Actived!");
            }
            if($r === 8) {
                $p->getEffects()->add(new EffectInstance(VanillaEffects::WATER_BREATHING(), 20 * 999999, 2, true));
                $p->sendMessage(TextFormat::GREEN . "Water Breathing Actived!");
            }
            if($r === 9) {
                $p->getEffects()->add(new EffectInstance(VanillaEffects::INVISIBILITY(), 20 * 999999, 2, true));
                $p->sendMessage(TextFormat::GREEN . "Invisibility Actived!");
            }
            if($r === 10) {
                $p->getEffects()->add(new EffectInstance(VanillaEffects::HEALTH_BOOST(), 20 * 999999, 2, true));
                $p->sendMessage(TextFormat::GREEN . "Health Boost Actived!");
            }
            if($r === 11) {
                $p->getEffects()->add(new EffectInstance(VanillaEffects::ABSORPTION(), 20 * 999999, 2, true));
                $p->sendMessage(TextFormat::GREEN . "Absorption Actived!");
            }
            if($r === 12) {
                $p->getEffects()->clear();
                $p->sendMessage(TextFormat::GREEN . "Clear All Effects!");
            }
            if($r === 13) {
                $p->sendMessage(TextFormat::YELLOW . "Thanks For Using Effects UI!");
            }
        });
        
        $form->setTitle( title: "Effects UI");
        $form->setContent( content: "Select Your Effects");
        $form->addButton("Night Vission", 0, "textures/ui/night_vision_effect.png");
        $form->addButton("Speed", 0, "textures/ui/speed_effect.png");
        $form->addButton("Haste", 0, "textures/ui/haste_effect.png");
        $form->addButton("Strength", 0, "textures/ui/strength_effect.png");
        $form->addButton("Jump Boost", 0, "textures/ui/jump_boost_effect.png");
        $form->addButton("Regeneration", 0, "textures/ui/regeneration_effect.png");
        $form->addButton("Resistance", 0, "textures/ui/resistance_effect.png");
        $form->addButton("Fire Resistance", 0, "textures/ui/fire_resistance_effect.png");
        $form->addButton("Water Breathing", 0, "textures/ui/water_breathing_effect.png");
        $form->addButton("Invisibility", 0, "textures/ui/invisibility_effect.png");
        $form->addButton("Health Boost", 0, "textures/ui/health_boost_effect.png");
        $form->addButton("Absorption", 0, "textures/ui/absorption_effect.png");
        $form->addButton(TextFormat::RED . "Clear Effect", 0, "textures/ui/book_trash_default");
        $form->addButton(TextFormat::RED . "Exit", 0, "textures/ui/cancel");
        
        $p->sendForm($form);
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
            $this->openEffectsUI($sender);
        }
        return;
    }
}