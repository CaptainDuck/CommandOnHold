<?php

namespace CommandOnHold;

use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\permission\Permission;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase implements Listener{
  
  public function onEnable(){
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
      $this->getLogger()->info("CommandOnHold by CaptainDuck enabled!");
  }
  public function onLoad(){
      $this->getLogger()->info("Loading CommandOnHold by CaptainDuck!");
  }
  public function onDisable(){
      $this->getLogger()->info("CommandOnHold by CaptainDuck enabled!");
  }
  public function onPlayerItemHeldEvent(PlayerItemHeldEvent $event){
      $player = $event->getPlayer();
      $item = $player->getInventory()->getItemInHand();
      
        #Execute Command -> $this->getServer()->dispatchCommand($player, 'help');
        
      
        }
  }
}
