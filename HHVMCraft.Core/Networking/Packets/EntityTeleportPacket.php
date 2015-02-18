<?php

namespace HHVMCraft\Core\Networking\Packets;

class EntityTeleportPacket {
	const id = "22";
	public $entityId;
	public $x;
	public $y;
	public $z;
	public $yaw;
	public $pitch;

	public function __construct($entityId, $x, $y, $z, $yaw, $pitch) {
		$this->entityId = $entityId;
		$this->x = $x;
		$this->y = $y;
		$this->z = $z;
		$this->yaw = $yaw;
		$this->pitch = $pitch;
	}

	public function writePacket($StreamWrapper) {
		$str = $StreamWrapper->writeUInt8(self::id).
			$StreamWrapper->writeInt($this->x).
			$StreamWrapper->writeInt($this->y).
			$StreamWrapper->writeInt($this->z).
			$StreamWrapper->writeUInt8($this->yaw).
			$StreamWrapper->writeUInt8($this->pitch);

		return $StreamWrapper->writePacket($str);
	}
}
