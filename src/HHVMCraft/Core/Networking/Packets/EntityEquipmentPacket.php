<?php
/**
 * This file is part of HHVMCraft - a Minecraft server implemented in PHP
 *
 * @copyright Andrew Vy 2015
 * @license MIT <https://github.com/andrewvy/HHVMCraft/blob/master/LICENSE.md>
 */
namespace HHVMCraft\Core\Networking\Packets;

class EntityEquipmentPacket {
	const id = 0x05;

	public $eid;
	public $slot;
	public $itemid;
	public $damage;

	public function __construct($eid, $slot, $itemid, $damage) {
		$this->eid = $eid;
		$this->slot = $slot;
		$this->itemid = $itemid;
		$this->damage = $damage;
	}

	public function writePacket($StreamWrapper) {
		$str = $StreamWrapper->writeUInt8(self::id) .
			$StreamWrapper->writeInt($this->eid) .
			$StreamWrapper->writeUInt16($this->slot) .
			$StreamWrapper->writeUInt16($this->itemid) .
			$StreamWrapper->writeUInt16($this->damage);

		return $StreamWrapper->writePacket($str);
	}
}