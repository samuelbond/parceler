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

    public function getZoneCharge($postZone)
    {
        $stmt = $this->connection->prepare("SELECT * FROM zonecharge WHERE postzone = :postzone");
        $stmt->bindParam(":postzone", $postZone);
        $stmt->execute();
        return $stmt->fetchObject("Platitech\\Parceler\\Zones\\Entities\\ZoneCharge");
    }

    public function getAllZoneCharges()
    {
        $stmt = $this->connection->prepare("SELECT * FROM zonecharge");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Platitech\\Parceler\\Zones\\Entities\\ZoneCharge");
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

    public function getAllPostZones()
    {
        $stmt = $this->connection->prepare("SELECT * FROM postzone");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Platitech\\Parceler\\Zones\\Entities\\PostZone");
    }

    public function createZoneCharge(ZoneCharge $charge)
    {
        $stmt = $this->connection->prepare("INSERT INTO zonecharge VALUES (:postzone, :zonecharge)");
        $stmt->bindParam(":postzone", $postZone);
        $stmt->bindParam(":zonecharge", $zoneCharge);
        $postZone = $charge->getPostzone();
        $zoneCharge = $charge->getZonecharge();
        $stmt->execute();
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
        $stmt = $this->connection->prepare("INSERT INTO postzone VALUES (null, :name)");
        $stmt->bindParam(":name", $name);
        $name = $zone->getName();
        $stmt->execute();
    }

    public function updateZoneCharge(ZoneCharge $charge)
    {
        $stmt = $this->connection->prepare("UPDATE zonecharge set postzone = :postzone, zonecharge = :zonecharge WHERE postzone = :pzone ");
        $stmt->bindParam(":postzone", $postZone);
        $stmt->bindParam(":zonecharge", $zoneCharge);
        $stmt->bindParam(":pzone", $postZone);
        $postZone = $charge->getPostzone();
        $zoneCharge = $charge->getZonecharge();
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
        $stmt = $this->connection->prepare("UPDATE postzone set name = :name WHERE id = :id");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":id", $id);
        $name = $zone->getName();
        $id = $zone->getId();
        $stmt->execute();
    }

    public function removePostZone(PostZone $postZone)
    {
        $stmt1 = $this->connection->prepare("DELETE FROM postregion WHERE postzone = :postzone");
        $stmt1->bindParam(":postzone", $id);
        $id = $postZone->getId();
        $stmt1->execute();
        $stmt2 = $this->connection->prepare("DELETE FROM zonecharge WHERE postzone = :postzone");
        $stmt2->bindParam(":postzone", $id);
        $stmt2->execute();
        $stmt3 = $this->connection->prepare("DELETE FROM postzone WHERE id = :id");
        $stmt3->bindParam(":id", $id);
        $stmt3->execute();
    }

    public function removeZoneCharge(ZoneCharge $charge)
    {
        $stmt = $this->connection->prepare("DELETE FROM zonecharge WHERE postzone = :postzone");
        $stmt->bindParam(":postzone", $id);
        $id = $charge->getPostzone();
        $stmt->execute();
    }

    public function removePostRegion(PostRegion $region)
    {
        $stmt = $this->connection->prepare("DELETE FROM postregion WHERE postzone = :postzone");
        $stmt->bindParam(":postzone", $id);
        $id = $region->getPostzone();
        $stmt->execute();
    }


}