<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Parcel\Entities;


class ParcelCharges
{
    private $id;
    private $country;
    private $defaultcharge;
    private $weightcharge;
    private $haszonetariff;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getDefaultcharge()
    {
        return $this->defaultcharge;
    }

    /**
     * @param mixed $defaultcharge
     */
    public function setDefaultcharge($defaultcharge)
    {
        $this->defaultcharge = $defaultcharge;
    }

    /**
     * @return mixed
     */
    public function getWeightcharge()
    {
        return $this->weightcharge;
    }

    /**
     * @param mixed $weightcharge
     */
    public function setWeightcharge($weightcharge)
    {
        $this->weightcharge = $weightcharge;
    }

    /**
     * @return mixed
     */
    public function getHaszonetariff()
    {
        return $this->haszonetariff;
    }

    /**
     * @param mixed $haszonetariff
     */
    public function setHaszonetariff($haszonetariff)
    {
        $this->haszonetariff = $haszonetariff;
    }



}