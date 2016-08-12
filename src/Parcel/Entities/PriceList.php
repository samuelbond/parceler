<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Parcel\Entities;


class PriceList
{
    private $id;
    private $maxdimensions;
    private $maxweight;
    private $price;
    private $country;

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
    public function getMaxdimensions()
    {
        return $this->maxdimensions;
    }

    /**
     * @param mixed $maxdimensions
     */
    public function setMaxdimensions($maxdimensions)
    {
        $this->maxdimensions = $maxdimensions;
    }

    /**
     * @return mixed
     */
    public function getMaxweight()
    {
        return $this->maxweight;
    }

    /**
     * @param mixed $maxweight
     */
    public function setMaxweight($maxweight)
    {
        $this->maxweight = $maxweight;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
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



}