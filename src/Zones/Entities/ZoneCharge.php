<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Zones\Entities;


class ZoneCharge
{
    private $postzone;
    private $zonecharge;

    /**
     * @return mixed
     */
    public function getPostzone()
    {
        return $this->postzone;
    }

    /**
     * @param mixed $postzone
     */
    public function setPostzone($postzone)
    {
        $this->postzone = $postzone;
    }

    /**
     * @return mixed
     */
    public function getZonecharge()
    {
        return $this->zonecharge;
    }

    /**
     * @param mixed $zonecharge
     */
    public function setZonecharge($zonecharge)
    {
        $this->zonecharge = $zonecharge;
    }


}