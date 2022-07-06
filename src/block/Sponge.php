<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
 */

declare(strict_types=1);

namespace pocketmine\block;

use pocketmine\data\runtime\RuntimeDataReader;
use pocketmine\data\runtime\RuntimeDataWriter;

class Sponge extends Opaque{
	protected bool $wet = false;

	public function getFullName() : string{
		return ($this->wet ? "Wet " : "") . $this->getBaseName();
	}

	public function getRequiredTypeDataBits() : int{ return 1; }

	protected function decodeType(RuntimeDataReader $r) : void{
		$this->wet = $r->readBool();
	}

	protected function encodeType(RuntimeDataWriter $w) : void{
		$w->writeBool($this->wet);
	}

	public function isWet() : bool{ return $this->wet; }

	/** @return $this */
	public function setWet(bool $wet) : self{
		$this->wet = $wet;
		return $this;
	}
}
