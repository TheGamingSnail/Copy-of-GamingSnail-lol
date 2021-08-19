<?php

namespace LunarMoon72\CopySnail;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\Player;
use pocketmine \Server;

class Main extends PluginBase
{
	public function onEnabled()
	{
		$this->getLogger()->info("Plugin Activated");
	}
	public function onDisabled()
	{
		$this->getLogger()->info("This is cool info");
	}
	public function onCommand(CommandSedner $sender, Command $cmd, String $label, Array $args) : bool
	{
		switch($cmd->getName())
		{
			case "uitest":
			  if($sender instanceof Player)
			  {
			  	$this->ui($sender);
			  }
		}
		return true;
	}
	public function ui($player)
	{
		$form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(Player $player, int $data = null)
		{
			if($data === null)
			{
				return true;
			}
			switch($data())
			{
				case 0:
				  $this->getServer()->dispatchCommand($player, "ce enchant driller 5");

				break;

				case 1:
				  $this->getServer()->dispatchCommand($player, "ce enchant autorepair 5");

				break;

				case 2:
				  $this->getServer()->dispatchCommand($player, "ce enchant deathbringer 10");

				break;
			});
            $form->setTitle("Admin Carnage UI");
            $form->setContent("Choose a ce");
            $form->addButton("Driller 5");
            $form->addButton("Auto Repair 5");
            $form->addButton("DeathBringer 10");
		}

	}
}
