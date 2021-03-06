<?PHP

/*
 * The plugin that allows you to use your credit card in PocketMine-MP.
 * Copyright (C) 2016 JellyBrick_
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

namespace UserList;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as Color;
use pocketmine\utils\Utils;
use pocketmine\command\PluginCommand;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;

class UserList extends PluginBase implements Listener {
	private $userList;

       public function onEnable() {
		$this->getLogger ()->info ( Color::BLUE . "유저-리스트 플러그인을 활성화 합니다!" );
	}
       
       public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
               $prefix = "[ 서버 ]";
               switch ($command->getName ()) {
			case "접속자":
               		        $this->userList = $this->getServer ()->getOnlinePlayers ();
                                $sender->sendMessage ( Color::GOLD . "$prefix 현재 접속자 수는 " . Color::WHITE . count($this->userList) . Color::GOLD . "명 입니다." );
				$sender->sendMessage ( Color::GOLD . "=-=-=- 접속자 목록 -=-=-=");
				$jupsock = "";
				foreach ( $this->getServer ()->getOnlinePlayers () as $players ) {
                                	$jupsock .= $players->getName() . " ";
				}
				$sender->sendMessage ( Color::AQUA . $jupsock );
			break;
		}
	}
}
?>
