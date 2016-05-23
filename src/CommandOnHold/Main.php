<?php

namespace CaptainDuck\CommandOnHold;

use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\command;
use pocketmine\permission\Permission;
use pocketmine\permission\Permissible;
use pockemine\command\CommandExecutor
use pocketmine\Server
use pocketmine\player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase implements Listener{
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getServer()->getLogger()->info("CommandOnHold by CaptainDuck enabled!");
    $player = $event->getPlayer();
    $item = $player->getInventory()->getItemInHand();
  }
  
  public function onDisable(){
    $this->getServer()->getLogger()->info("CommandOnHold by CaptainDuck disabled! :o");
  }
  
  //Start
    if($item->getId() == 347){
      $player->sendPopup("You're holding a Clock!");