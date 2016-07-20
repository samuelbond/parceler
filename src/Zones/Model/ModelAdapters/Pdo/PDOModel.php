<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Zones\Model\ModelAdapters\Pdo;


use Platitech\Parceler\Config\Config;
use Platitech\Parceler\Zones\Entities\PostRegion;
use Platitech\Parceler\Zones\Entities\PostZone;
use Platitech\Parceler\Zones\Entities\ZoneCharge;
use Platitech\Parceler\Zones\Model\ZoneModelInterface;

class PDOModel implements ZoneModelInterface
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


    public function getPostRegion($postRegion)
    {
        $stmt = $this->connection->prepare("SELECT * FROM postregion WHERE postzone = :postzone");
        $stmt->bindParam(":postzone", $postRegion);
        $stmt->execute();
        return $stmt->fetchObject("Platitech\\Parceler\\Zones\\Entities\\PostRegion");
    }

    public function getAllPostRegion()
    {
        $stmt = $this->connection->prepare("SELECT * FROM postregion");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Platitech\\Parceler\\Zones\\Entities\\PostRegion");
    }

    public function getPostZone($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM postzone WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchObject("Platitech\\Parceler\\Zones\\Entities\\PostZone");
    }

    public function getPostZoneByName($name)
    {
        $stmt = $this->connection->prepare("SELECT * FROM postzone WHERE name = :name");
        $stmt->bindParam(":name", $name);
        $stmt->execute();
        return $stmt->fetchObject("Platitech\\Parceler\\Zones\\Entities\\PostZone");
    }

    public function getPostZoneByCountry($countryCode)
    {
        $stmt = $this->connection->prepare("SELECT * FROM postzone WHERE country = :country");
        $stmt->bindParam(":country", $countryCode);
        $stmt->execute();
        return $stmt->fetchObject("Platitech\\Parceler\\Zones\\Entities\\PostZone");
    }

    public function getAllPostZones()
    {
        $stmt = $this->connection->prepare("SELECT * FROM postzone");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Platitech\\Parceler\\Zones\\Entities\\PostZone");
    }

    public function createPostRegion(PostRegion $region)
    {
        $stmt = $this->connection->prepare("INSERT INTO postregion (name, postzone) VALUES (:name, :postzone)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":postzone", $postZone);
        $name = $region->getName();
        $postZone = $region->getPostzone();
        $stmt->execute();
    }

    public function  createPostZone(PostZone $zone)
    {
        $stmt = $this->connection->prepare("INSERT INTO postzone VALUES (null, :name, :country, :charge)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":country", $country);
        $stmt->bindParam(":charge", $charge);
        $name = $zone->getName();
        $country = $zone->getCountry();
        $charge = $zone->getZonecharge();
        $stmt->execute();
    }


    public function updatePostRegion(PostRegion $region)
    {
        $stmt = $this->connection->prepare("UPDATE postregion set name = :name, postzone = :postzone WHERE postzone = :pzone");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":postzone", $postZone);
        $stmt->bindParam(":pzone", $postZone);
        $name = $region->getName();
        $postZone = $region->getPostzone();
        $stmt->execute();
    }

    public function  updatePostZone(PostZone $zone)
    {
        $stmt = $this->connection->prepare("UPDATE postzone set name = :name, country = :country, zonecharge= :charge WHERE id = :id");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":country", $country);
        $stmt->bindParam(":charge", $charge);
        $stmt->bindParam(":id", $id);
        $name = $zone->getName();
        $id = $zone->getId();
        $country = $zone->getCountry();
        $charge = $zone->getZonecharge();
        $stmt->execute();
    }

    public function removePostZone(PostZone $postZone)
    {
        $stmt1 = $this->connection->prepare("DELETE FROM postregion WHERE postzone = :postzone");
        $stmt1->bindParam(":postzone", $id);
        $id = $postZone->getId();
        $stmt1->execute();
        $stmt2 = $this->connection->prepare("DELETE FROM postzone WHERE id = :id");
        $stmt2->bindParam(":id", $id);
        $stmt2->execute();
    }


    public function removePostRegion(PostRegion $region)
    {
        $stmt = $this->connection->prepare("DELETE FROM postregion WHERE postzone = :postzone");
        $stmt->bindParam(":postzone", $id);
        $id = $region->getPostzone();
        $stmt->execute();
    }


}