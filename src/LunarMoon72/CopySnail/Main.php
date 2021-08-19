<?php

namespace LunarMoon72\CopySnail;

use pocketmine\plugin\PluginBase;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\Player;
use pocketmine\Server;

class Main extends PluginBase
{
  public function onEnabled()
  {
    $this->getLogger()->info("Plugin Enabled");
  }
  public function onDisabled()
  {
    $this->getLogger()->info("Plugin off sadge");
  }
  public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {
    switch($cmd->getName())
    {
      case "ceedit":
        if($sender instanceof Player){
          $this->ui($sender);
        }
    }
    return true;
    }
  public function ui($player){
    $form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createCustomForm(function (Player $player, int $data = null){
      if($data === null){
        return true;
      }
      switch($data){
        case 0:
          $this->getServer()->dispatchCommand($player, "ce enchant driller" . $data[0]);

        break;

        case 1:
          $this->getServer()->dispatchCommand($player, "ce enchant driller" . $data[1]);

        break;

        case 2:
          $this->getServer()->dispatchCommand($player, "ce enchant driller" . $data[2]);
      }
      return true;
    });
    $form->setTitle("Choose an enchant");
    $form->addSlider("Driller", 0, 10);
    $form->addSlider("Obsidian Sheild", 0, 10);
    $form->addSlider("Auto Repair", 0, 10);
  }
}
