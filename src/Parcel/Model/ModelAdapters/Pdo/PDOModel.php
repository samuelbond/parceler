<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Parcel\Model\ModelAdapters\Pdo;


use Platitech\Parceler\Config\Config;
use Platitech\Parceler\Parcel\Entities\Countries;
use Platitech\Parceler\Parcel\Entities\ParcelCharges;
use Platitech\Parceler\Parcel\Entities\ParcelOrders;
use Platitech\Parceler\Parcel\Entities\ParcelSchedules;
use Platitech\Parceler\Parcel\Entities\ParcelTypes;
use Platitech\Parceler\Parcel\Model\ParcelModelInterface;

class PDOModel implements ParcelModelInterface
{
    /**
     * @var \PDO
     */
    private $connection;

    /**
     * PDOModel constructor.
     */
    public function __construct()
    {
        $this->connection = Config::getPDOConnection(false);
    }

    public function addCountry(Countries $country)
    {
        $stmt = $this->connection->prepare("INSERT INTO countries VALUES (:cname)");
        $stmt->bindParam(":cname", $countryName);
        $countryName = $country->getCountry();
        $stmt->execute();
    }

    public function getCountry($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM countries WHERE id = :cid");
        $stmt->bindParam(":cid", $id);
        $stmt->execute();
        return $stmt->fetchObject("Platitech\\Parceler\\Parcel\\Entities\\Countries");
    }

    public function getCountryByName($name)
    {
        $stmt = $this->connection->prepare("SELECT * FROM countries WHERE name = :cname");
        $stmt->bindParam(":cname", $name);
        $stmt->execute();
        return $stmt->fetchObject("Platitech\\Parceler\\Parcel\\Entities\\Countries");
    }

    public function getAllCountry()
    {
        $stmt = $this->connection->prepare("SELECT * FROM countries ");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Platitech\\Parceler\\Parcel\\Entities\\Countries");
    }

    public function updateCountry(Countries $country)
    {
        $stmt = $this->connection->prepare("UPDATE countries SET name = :cname");
        $stmt->bindParam(":cname", $countryName);
        $countryName = $country->getCountry();
        $stmt->execute();
    }

    public function createParcelCharge(ParcelCharges $parcelCharge)
    {
        $stmt = $this->connection->prepare("INSERT INTO parcelcharges VALUES (null, :country, :defaultcharge, :weightcharge,
                :specialpackagingcharge, :refrigeratecharge, :haszonetariff)");
        $stmt->bindParam(":country", $country);
        $stmt->bindParam(":defaultcharge", $defaultParcelCharge);
        $stmt->bindParam(":weightcharge", $weightCharge);
        $stmt->bindParam(":specialpackagingcharge", $specialCharge);
        $stmt->bindParam(":refrigeratecharge", $refrigerateCharge);
        $stmt->bindParam(":haszonetariff", $hasZoneTariff);
        $country = $parcelCharge->getCountry();
        $defaultParcelCharge = $parcelCharge->getDefaultcharge();
        $weightCharge = $parcelCharge->getWeightcharge();
        $specialCharge = $parcelCharge->getSpecialpackagingcharge();
        $refrigerateCharge = $parcelCharge->getRefrigeratecharge();
        $hasZoneTariff = $parcelCharge->getHaszonetariff();
        $stmt->execute();
    }

    public function getParcelChargeByCountry($countryCode)
    {
        $stmt = $this->connection->prepare("SELECT * FROM parcelcharges WHERE country = :country");
        $stmt->bindParam(":country", $countryCode);
        $stmt->execute();
        return $stmt->fetchObject("Platitech\\Parceler\\Parcel\\Entities\\ParcelCharges");
    }

    public function getParcelChargeById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM parcelcharges WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchObject("Platitech\\Parceler\\Parcel\\Entities\\ParcelCharges");
    }

    public function updateParcelCharge(ParcelCharges $parcelCharge)
    {
        $stmt = $this->connection->prepare("UPDATE ParcelCharges SET country = :country, defaultcharge = :defaultcharge,
                  weightcharge = :weightcharge, specialpackagingcharge = :spcharge, refrigeratecharge = :refcharge,
                  haszonetariff = :haszonetariff WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":country", $country);
        $stmt->bindParam(":defaultcharge", $defaultParcelCharge);
        $stmt->bindParam(":weightcharge", $weightCharge);
        $stmt->bindParam(":spcharge", $specialCharge);
        $stmt->bindParam(":refcharge", $refrigerateCharge);
        $stmt->bindParam(":haszonetariff", $hasZoneTariff);
        $id = $parcelCharge->getId();
        $country = $parcelCharge->getCountry();
        $defaultParcelCharge = $parcelCharge->getDefaultcharge();
        $weightCharge = $parcelCharge->getWeightcharge();
        $specialCharge = $parcelCharge->getSpecialpackagingcharge();
        $refrigerateCharge = $parcelCharge->getRefrigeratecharge();
        $hasZoneTariff = $parcelCharge->getHaszonetariff();
        $stmt->execute();
    }

    public function createParcelSchedule(ParcelSchedules $parcelSchedule)
    {
        $stmt = $this->connection->prepare("INSERT INTO parcelschedules VALUES (null, :pickupdate, :weight, :country)");
        $stmt->bindParam(":pickupdate", $pickUpDate);
        $stmt->bindParam(":weight", $maxWeight);
        $stmt->bindParam(":country", $country);
        $pickUpDate = $parcelSchedule->getPickupdate();
        $maxWeight = $parcelSchedule->getMaxweight();
        $country = $parcelSchedule->getCountry();
        $stmt->execute();
    }

    public function getParcelSchedulesByCountry($countryCode)
    {
        $stmt = $this->connection->prepare("SELECT * FROM parcelschedules WHERE country = :country");
        $stmt->bindParam(":country", $countryCode);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Platitech\\Parceler\\Parcel\\Entities\\ParcelSchedules");
    }

    public function getParcelScheduleById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM parcelschedules WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchObject("Platitech\\Parceler\\Parcel\\Entities\\ParcelSchedules");
    }

    public function getParcelScheduleForMonth(\DateTime $month)
    {
        $stmt = $this->connection->prepare("SELECT * FROM parcelschedules WHERE MONTH(pickupdate) = MONTH(:smonth)
                AND YEAR(pickupdate) = YEAR(:syear)");
        $stmt->bindParam(":smonth", $dateTime);
        $stmt->bindParam(":syear", $dateTime);
        $dateTime = $month;
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Platitech\\Parceler\\Parcel\\Entities\\ParcelSchedules");
    }

    public function updateParcelSchedule(ParcelSchedules $parcelSchedule)
    {
        $stmt = $this->connection->prepare("UPDATE parcelschedules SET pickupdate = :pickupdate, country = :country, maxweight = :weight WHERE id = :id");
        $stmt->bindParam(":pickupdate", $pickUpDate);
        $stmt->bindParam(":country", $country);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":weight", $maxWeight);
        $pickUpDate = $parcelSchedule->getPickupdate();
        $country = $parcelSchedule->getCountry();
        $id = $parcelSchedule->getId();
        $maxWeight = $parcelSchedule->getMaxweight();
        $stmt->execute();
    }

    public function removedCountry(Countries $country)
    {
        $stmt = $this->connection->prepare("DELETE FROM countries WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $id = $country->getId();
        $stmt->execute();
    }

    public function getAllParcelCharge()
    {
        $stmt = $this->connection->prepare("SELECT * FROM parcelcharges ");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Platitech\\Parceler\\Parcel\\Entities\\ParcelCharges");
    }

    public function removeParcelCharge(ParcelCharges $parcelCharge)
    {
        $stmt = $this->connection->prepare("DELETE FROM parcelcharges WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $id = $parcelCharge->getId();
        $stmt->execute();
    }

    public function getAllParcelSchedule()
    {
        $stmt = $this->connection->prepare("SELECT * FROM parcelschedules ");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Platitech\\Parceler\\Parcel\\Entities\\ParcelSchedules");
    }

    public function removeParcelSchedule(ParcelSchedules $schedules)
    {
        $stmt = $this->connection->prepare("DELETE FROM parcelschedules WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $id = $schedules->getId();
        $stmt->execute();
    }

    public function createParcelOrder(ParcelOrders $order)
    {
        $stmt = $this->connection->prepare("INSERT INTO parcelorders VALUES (:id, :name, :email, :phone, :srcaddress,
                :srcpostcode, :srccountry, :desaddress, :despostcode, :descountry, :rcname, :rcphone, :payref, :status,
                :weight, :length, :height, :width, :pickdate, :parceltype)");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":srcaddress", $srcAddress);
        $stmt->bindParam(":srcpostcode", $srcPostCode);
        $stmt->bindParam(":srccountry", $srcCountry);
        $stmt->bindParam(":desaddress", $desAddress);
        $stmt->bindParam(":despostcode", $desPostCode);
        $stmt->bindParam(":descountry", $desCountry);
        $stmt->bindParam(":rcname", $rcName);
        $stmt->bindParam(":rcphone", $rcPhone);
        $stmt->bindParam(":payref", $payRef);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":weight", $weight);
        $stmt->bindParam(":length", $length);
        $stmt->bindParam(":height", $height);
        $stmt->bindParam(":width", $width);
        $stmt->bindParam(":pickdate", $pickDate);
        $stmt->bindParam(":parceltype", $parcelType);
        $id = $order->getId();
        $name = $order->getName();
        $email = $order->getEmail();
        $phone = $order->getTelephone();
        $srcAddress = $order->getSourceaddress();
        $srcPostCode = $order->getSourcepostcode();
        $srcCountry = $order->getSourcecountry();
        $desAddress = $order->getDestinationaddress();
        $desPostCode = $order->getDestinationpostcode();
        $desCountry = $order->getDestinationcountry();
        $rcName = $order->getReceivername();
        $rcPhone = $order->getReceivertelephone();
        $payRef = $order->getPaymentref();
        $status = $order->getStatus();
        $weight = $order->getWeight();
        $length = $order->getLength();
        $height = $order->getHeight();
        $width = $order->getWidth();
        $pickDate = $order->getPickupdate();
        $parcelType = $order->getParceltype();
        $stmt->execute();
    }

    public function getParcelOrderByPickUpDate($pickupDateId)
    {
        $stmt = $this->connection->prepare("SELECT * FROM parcelorders WHERE pickupdate = :pdate");
        $stmt->bindParam(":pdate", $pickupDateId);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Platitech\\Parceler\\Parcel\\Entities\\ParcelOrders");
    }

    public function getParcelOrderById($orderId)
    {
        $stmt = $this->connection->prepare("SELECT * FROM parcelorders WHERE id = :id");
        $stmt->bindParam(":id", $orderId);
        $stmt->execute();
        return $stmt->fetchObject("Platitech\\Parceler\\Parcel\\Entities\\ParcelOrders");
    }

    public function getParcelOrderByEmail($email)
    {
        $stmt = $this->connection->prepare("SELECT * FROM parcelorders WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Platitech\\Parceler\\Parcel\\Entities\\ParcelOrders");
    }

    public function getParcelOrderByPaymentReference($paymentRef)
    {
        $stmt = $this->connection->prepare("SELECT * FROM parcelorders WHERE paymentref = :payref");
        $stmt->bindParam(":payref", $paymentRef);
        $stmt->execute();
        return $stmt->fetchObject("Platitech\\Parceler\\Parcel\\Entities\\ParcelOrders");
    }

    public function getAllParcelOrder()
    {
        $stmt = $this->connection->prepare("SELECT * FROM parcelorders");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Platitech\\Parceler\\Parcel\\Entities\\ParcelOrders");
    }

    public function updateParcelOrderStatus($id, $status)
    {
        $stmt = $this->connection->prepare("UPDATE parcelorders SET status = :status WHERE id = :id");
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function addParcelType(ParcelTypes $type)
    {
        $stmt = $this->connection->prepare("INSERT INTO parceltypes VALUES (:parceltype)");
        $stmt->bindParam(":parceltype", $parcelType);
        $parcelType = $type->getParceltype();
        $stmt->execute();
    }

    public function getParcelType($type)
    {
        $stmt = $this->connection->prepare("SELECT * FROM parceltypes WHERE parceltype = :parceltype");
        $stmt->bindParam(":parceltype", $type);
        $stmt->execute();
        return $stmt->fetchObject("Platitech\\Parceler\\Parcel\\Entities\\ParcelTypes");
    }

    public function getAllParcelType()
    {
        $stmt = $this->connection->prepare("SELECT * FROM parceltypes");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Platitech\\Parceler\\Parcel\\Entities\\ParcelTypes");
    }

    public function removeParcelType(ParcelTypes $type)
    {
        $stmt = $this->connection->prepare("DELETE FROM parceltypes WHERE parceltype = :parceltype");
        $stmt->bindParam(":parceltype", $parcelType);
        $parcelType = $type->getParceltype();
        $stmt->execute();
    }


}