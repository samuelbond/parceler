<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Parcel\Entities;


class ParcelOrders
{
    private $id;
    private $name;
    private $email;
    private $telephone;
    private $sourceaddress;
    private $sourcepostcode;
    private $sourcecountry;
    private $destinationaddress;
    private $destinationpostcode;
    private $destinationcountry;
    private $receivername;
    private $receivertelephone;
    private $paymentref;
    private $status;
    private $weight;
    private $length;
    private $height;
    private $width;
    private $pickupdate;
    private $parceltype;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getSourceaddress()
    {
        return $this->sourceaddress;
    }

    /**
     * @param mixed $sourceaddress
     */
    public function setSourceaddress($sourceaddress)
    {
        $this->sourceaddress = $sourceaddress;
    }

    /**
     * @return mixed
     */
    public function getSourcepostcode()
    {
        return $this->sourcepostcode;
    }

    /**
     * @param mixed $sourcepostcode
     */
    public function setSourcepostcode($sourcepostcode)
    {
        $this->sourcepostcode = $sourcepostcode;
    }

    /**
     * @return mixed
     */
    public function getSourcecountry()
    {
        return $this->sourcecountry;
    }

    /**
     * @param mixed $sourcecountry
     */
    public function setSourcecountry($sourcecountry)
    {
        $this->sourcecountry = $sourcecountry;
    }

    /**
     * @return mixed
     */
    public function getDestinationaddress()
    {
        return $this->destinationaddress;
    }

    /**
     * @param mixed $destinationaddress
     */
    public function setDestinationaddress($destinationaddress)
    {
        $this->destinationaddress = $destinationaddress;
    }

    /**
     * @return mixed
     */
    public function getDestinationpostcode()
    {
        return $this->destinationpostcode;
    }

    /**
     * @param mixed $destinationpostcode
     */
    public function setDestinationpostcode($destinationpostcode)
    {
        $this->destinationpostcode = $destinationpostcode;
    }

    /**
     * @return mixed
     */
    public function getDestinationcountry()
    {
        return $this->destinationcountry;
    }

    /**
     * @param mixed $destinationcountry
     */
    public function setDestinationcountry($destinationcountry)
    {
        $this->destinationcountry = $destinationcountry;
    }

    /**
     * @return mixed
     */
    public function getReceivername()
    {
        return $this->receivername;
    }

    /**
     * @param mixed $receivername
     */
    public function setReceivername($receivername)
    {
        $this->receivername = $receivername;
    }

    /**
     * @return mixed
     */
    public function getReceivertelephone()
    {
        return $this->receivertelephone;
    }

    /**
     * @param mixed $receivertelephone
     */
    public function setReceivertelephone($receivertelephone)
    {
        $this->receivertelephone = $receivertelephone;
    }

    /**
     * @return mixed
     */
    public function getPaymentref()
    {
        return $this->paymentref;
    }

    /**
     * @param mixed $paymentref
     */
    public function setPaymentref($paymentref)
    {
        $this->paymentref = $paymentref;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getPickupdate()
    {
        return $this->pickupdate;
    }

    /**
     * @param mixed $pickupdate
     */
    public function setPickupdate($pickupdate)
    {
        $this->pickupdate = $pickupdate;
    }

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