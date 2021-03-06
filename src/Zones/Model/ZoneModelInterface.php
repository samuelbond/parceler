<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Zones\Model;


use Platitech\Parceler\Zones\Entities\PostRegion;
use Platitech\Parceler\Zones\Entities\PostZone;
use Platitech\Parceler\Zones\Entities\ZoneCharge;

interface ZoneModelInterface
{
    /**
     * Create new Post Region
     * @param PostRegion $region
     * @return void
     */
    public function createPostRegion(PostRegion $region);

    /**
     * Create new Post Zone
     * @param PostZone $zone
     * @return void
     */
    public function  createPostZone(PostZone $zone);

    /**
     * Update Post Region
     * @param PostRegion $region
     * @return void
     */
    public function updatePostRegion(PostRegion $region);

    /**
     * Update Post Zone
     * @param PostZone $zone
     * @return void
     */
    public function  updatePostZone(PostZone $zone);


    /**
     * Get a given post region
     * @param $postRegion
     * @return PostRegion
     */
    public function getPostRegion($postRegion);

    /**
     * Get all post region
     * @return Array
     */
    public function getAllPostRegion();

    /**
     * Get a given post zone by id
     * @param $id
     * @return PostZone
     */
    public function getPostZone($id);

    /**
     * Gets a given post zone by name
     * @param $name
     * @return PostZone
     */
    public function getPostZoneByName($name);

    /**
     * Gets a given post zone by country
     * @param $countryCode
     * @return PostZone
     */
    public function getPostZoneByCountry($countryCode);

    /**
     * Gets all post zone
     * @return Array
     */
    public function getAllPostZones();

    /**
     * @param PostZone $postZone
     * @return void
     */
    public function removePostZone(PostZone $postZone);

    /**
     * @param PostRegion $region
     * @return void
     */
    public function removePostRegion(PostRegion $region);
}