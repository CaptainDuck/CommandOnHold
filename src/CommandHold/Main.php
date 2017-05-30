<?php

namespace CommandHold;

use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Player;
use pocketmine\permission\Permission;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if(!is_dir($this->getDataFolder())) mkdir($this->getDataFolder());
		 $this->items = new Config($this->getDataFolder()."items.yml", Config::YAML, array(
				"267" => array(
					  "level/world" => "world",
					  "playercmds" => array(
							 "hub"
                    ),
					  "consolecmds" => array(
						     "tell {player} You held a diamond sword!",
					   	     "say Awesome!"
						)	
				)
		));
		$this->items->save();
        $this->getLogger()->info("CommandOnHold by CaptainDuck enabled!");
    }
    
    public function onDisable(){
        $this->getLogger()->info("CommandOnHold by CaptainDuck enabled!");
    }
    
    public function onPlayerItemHeldEvent(PlayerItemHeldEvent $event){
        $player = $event->getPlayer();
        $item = $event->getItem();
        $th = $this->items->getAll()[$item->getId()];
        if(!$player->hasPermission("commandonhold.bypass")){
            if(isset($th)){
                if(!$player->hasPermission("commandonhold.bypass")){
                    if(isset($th["level/world"]) && isset($th["playercmds"])){
                        $level = $th["level/world"];
                        $consolecmds = $th["consolecmds"];
                        $playercmds = $th["playercmds"];
                        if($player->getLevel()->getName() == $level){
                            foreach($playercmds as $p){
                                $this->getServer()->dispatchCommand($player, $p);
                            }
                            if(isset($consolecmds)){
                                foreach($consolecmds as $c){
                                    $this->getServer()->dispatchCommand(new ConsoleCommandSender(), $c);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
