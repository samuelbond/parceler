<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Parcel\Entities;


class ParcelTypes
{
    private $parceltype;

    /**
     * @return mixed
     */
    public function getParceltype()
    {
        return $this->parceltype;
    }

    /**
     * @param mixed $parceltype
     */
    public function setParceltype($parceltype)
    {
        $this->parceltype = $parceltype;
    }

}