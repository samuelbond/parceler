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
use Platitech\Parceler\Parcel\Entities\ParcelSchedules;
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
        $stmt = $this->connection->prepare("INSERT INTO parcelcharges VALUES (null, :country, :defaultcharge, :weightcharge, :haszonetariff)");
        $stmt->bindParam(":country", $country);
        $stmt->bindParam(":defaultcharge", $defaultParcelCharge);
        $stmt->bindParam(":weightcharge", $weightCharge);
        $stmt->bindParam(":haszonetariff", $hasZoneTariff);
        $country = $parcelCharge->getCountry();
        $defaultParcelCharge = $parcelCharge->getDefaultcharge();
        $weightCharge = $parcelCharge->getWeightcharge();
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
                  weightcharge = :weightcharge, haszonetariff = :haszonetariff WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":country", $country);
        $stmt->bindParam(":defaultcharge", $defaultParcelCharge);
        $stmt->bindParam(":weightcharge", $weightCharge);
        $stmt->bindParam(":haszonetariff", $hasZoneTariff);
        $id = $parcelCharge->getId();
        $country = $parcelCharge->getCountry();
        $defaultParcelCharge = $parcelCharge->getDefaultcharge();
        $weightCharge = $parcelCharge->getWeightcharge();
        $hasZoneTariff = $parcelCharge->getHaszonetariff();
        $stmt->execute();
    }

    public function createParcelSchedule(ParcelSchedules $parcelSchedule)
    {
        $stmt = $this->connection->prepare("INSERT INTO parcelschedules VALUES (null, :pickupdate, :country)");
        $stmt->bindParam(":pickupdate", $pickUpDate);
        $stmt->bindParam(":country", $country);
        $pickUpDate = $parcelSchedule->getPickupdate();
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
        $stmt = $this->connection->prepare("UPDATE parcelschedules SET pickupdate = :pickupdate, country = :country WHERE id = :id");
        $stmt->bindParam(":pickupdate", $pickUpDate);
        $stmt->bindParam(":country", $country);
        $stmt->bindParam(":id", $id);
        $pickUpDate = $parcelSchedule->getPickupdate();
        $country = $parcelSchedule->getCountry();
        $id = $parcelSchedule->getId();
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


}