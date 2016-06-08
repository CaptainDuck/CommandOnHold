<?php

namespace CommandOnHold;

use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\command;
use pocketmine\permission\Permission;
use pocketmine\permission\Permissible;
use pockemine\command\CommandExecutor;
use pocketmine\Server;
use pocketmine\player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as C;

class Main extends PlayerEvent implements Cancellable{
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getServer()->getLogger()->info("CommandOnHold by CaptainDuck enabled!");
  }
  public function onDisable(){
      $this->getServer()->getLogger()->info("CommandOnHold by CaptainDuck disabled! :o");
  }
  public function onPlayerItemHeldEvent(){
        $player = $event->getPlayer();
        $item = $player->getInventory()->getItemInHand();
        $playername = " . $player->getName() . ";
        
        #Execute Command -> $this->getServer()->dispatchCommand($player, 'help');
        
        switch($item->getId()){
            case 265:
                $player->sendMessage("You're holding a diamond!");
                $player-> $this->getServer()->dispatchCommand($player, 'help');
        }
  }
}
