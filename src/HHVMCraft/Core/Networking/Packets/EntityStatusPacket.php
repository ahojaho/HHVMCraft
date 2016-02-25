<?php
/**
 * This file is part of HHVMCraft - a Minecraft server implemented in PHP
 *
 * @copyright Andrew Vy 2015
 * @license MIT <https://github.com/andrewvy/HHVMCraft/blob/master/LICENSE.md>
 */
namespace HHVMCraft\Core\Networking\Packets;

class EntityStatusPacket {
	const id = 0x26;
	public $entity_id;
	public $entity_status;

	public function __construct($entity_id, $entity_status) {
		$this->entity_id = $entity_id;
		$this->entity_status = $entity_status;
	}

	public function writePacket($StreamWrapper) {
		$p = $StreamWrapper->writeInt8(self::id) .
		$StreamWrapper->writeInt($this->entity_id) .
		$StreamWrapper->writeInt8($this->entity_status);

		return $StreamWrapper->writePacket($p);
	}
}