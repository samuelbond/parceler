<?php

/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Parcel\Model;

use Platitech\Parceler\Parcel\Entities\Countries;
use Platitech\Parceler\Parcel\Entities\ParcelCharges;
use Platitech\Parceler\Parcel\Entities\ParcelOrders;
use Platitech\Parceler\Parcel\Entities\ParcelSchedules;

interface ParcelModelInterface
{
    /**
     * @param Countries $country
     * @return void
     */
    public function addCountry(Countries $country);

    /**
     * @param $id
     * @return Countries
     */
    public function getCountry($id);

    /**
     * @param $name
     * @return Countries
     */
    public function getCountryByName($name);

    /**
     * @param Countries $country
     * @return void
     */
    public function removedCountry(Countries $country);

    /**
     * @return array
     */
    public function getAllCountry();

    /**
     * @param Countries $country
     * @return void
     */
    public function updateCountry(Countries $country);

    /**
     * @param ParcelCharges $parcelCharge
     * @return void
     */
    public function createParcelCharge(ParcelCharges $parcelCharge);

    /**
     * @param $countryCode
     * @return ParcelCharges
     */
    public function getParcelChargeByCountry($countryCode);

    /**
     * @param $id
     * @return ParcelCharges
     */
    public function getParcelChargeById($id);

    /**
     * @return array
     */
    public function getAllParcelCharge();

    /**
     * @param ParcelCharges $parcelCharge
     * @return void
     */
    public function updateParcelCharge(ParcelCharges $parcelCharge);

    /**
     * @param ParcelCharges $parcelCharge
     * @return void
     */
    public function removeParcelCharge(ParcelCharges $parcelCharge);

    /**
     * @param ParcelSchedules $parcelSchedule
     * @return void
     */
    public function createParcelSchedule(ParcelSchedules $parcelSchedule);

    /**
     * @param $countryCode
     * @return array
     */
    public function getParcelSchedulesByCountry($countryCode);

    /**
     * @param $id
     * @return ParcelSchedules
     */
    public function getParcelScheduleById($id);

    /**
     * @param \DateTime $month
     * @return array
     */
    public function getParcelScheduleForMonth(\DateTime $month);

    /**
     * @return array
     */
    public function getAllParcelSchedule();

    /**
     * @param ParcelSchedules $schedules
     * @return void
     */
    public function removeParcelSchedule(ParcelSchedules $schedules);

    /**
     * @param ParcelSchedules $parcelSchedule
     * @return void
     */
    public function updateParcelSchedule(ParcelSchedules $parcelSchedule);

    /**
     * @param ParcelOrders $order
     * @return void
     */
    public function createParcelOrder(ParcelOrders $order);

    /**
     * @param $pickupDateId
     * @return array
     */
    public function getParcelOrderByPickUpDate($pickupDateId);

    /**
     * @param $orderId
     * @return ParcelOrders
     */
    public function getParcelOrderById($orderId);

    /**
     * @param $email
     * @return array
     */
    public function getParcelOrderByEmail($email);

    /**
     * @param $paymentRef
     * @return ParcelOrders
     */
    public function getParcelOrderByPaymentReference($paymentRef);

    /**
     * @return array
     */
    public function getAllParcelOrder();

    /**
     * @param $id
     * @param $status
     * @return void
     */
    public function updateParcelOrderStatus($id, $status);


}