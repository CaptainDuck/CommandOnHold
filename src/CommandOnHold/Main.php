<?php

namespace CommandOnHold;

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
        $this->saveDefaultConfig();
        $this->getLogger()->info("CommandOnHold by CaptainDuck enabled!");
    }
    
    public function onDisable(){
        $this->getLogger()->info("CommandOnHold by CaptainDuck enabled!");
    }
    
    public function onPlayerItemHeldEvent(PlayerItemHeldEvent $event){
        $player = $event->getPlayer();
        $item = $player->getInventory()->getItemInHand();
      
        #Execute Command -> $this->getServer()->dispatchCommand($player, 'help');
        $cfg = $this->getConfig()->getAll();
        foreach($cfg["items"] as $th){
            if(isset($th["id"]) && isset($th["id"]["level/world"]) && isset($th["id"]["playercmds"])){
                $level = $th["id"]["level/world"];
                $consolecmds = $th["id"]["consolecmds"];
                $playercmds = $th["id"]["playercmds"];
                $id = $th["id"];
                if($player->getLevel()->getName() == $level){
                    if(!$player->hasPermission("commandonhold.bypass")){
                        if($event->getItem() == $id){
                            foreach($playercmds as $i){
                                $this->getServer()->dispatchCommand($player, $i);
                                $i++
                            }
                            if(isset($consolecmds)){
                                foreach($consolecmds as $i){
                                    $this->getServer()->dispatchCommand(new ConsoleCommandSender(), $i);
                                    $i++
                                }
                            }
                        }
                    }
                }
            }
        }
        
    }
}
