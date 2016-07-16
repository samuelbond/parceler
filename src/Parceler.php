<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler;


use Platitech\Parceler\Parcel\ParcelManager;
use Platitech\Parceler\Zones\ZoneManager;

class Parceler
{

    /**
     * @return Parcel\Model\ParcelModelInterface
     */
    public function getParcelModel(){
        return (new ParcelManager())->getModel();
    }

    /**
     * @return Zones\Model\ZoneModelInterface
     */
    public function getZoneModel(){
        return (new ZoneManager())->getModel();
    }
}