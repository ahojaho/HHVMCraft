<?php
/**
 * This file is part of HHVMCraft - a Minecraft server implemented in PHP
 *
 * @copyright Andrew Vy 2015
 * @license MIT <https://github.com/andrewvy/HHVMCraft/blob/master/LICENSE.md>
 */
namespace HHVMCraft\Core\Windows;

use HHVMCraft\API\ItemStack;
use HHVMCraft\Core\Windows\WindowArea;

class ArmorWindowArea extends WindowArea {
	const Footwear = 3;
	const Pants = 2;
	const Chestplate = 1;
	const Headgear = 0;

	public function __construct($startIndex) {
		parent::__construct($startIndex, 4, 1, 4);
	}

	public function isValid($slot, $index) {
		if ($slot->isEmpty()) {
			return true;
		}

		else return parent::isValid($slot, $index);
	}

	public function moveOrMergeItem($index, $slot, $from) {
		for ($i=0;$i<$this->length;$i++) {
			if ($this->isValid($slot, $i)) {
				if (empty($this->Items[$i])) {
					$this->Items[$i] = $slot;
					$from->Items[$i] = ItemStack::emptyStack();
					return $i;
				}
			}
		}
		return -1;
	}
}
