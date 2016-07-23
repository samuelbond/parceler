<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Zones\Entities;


class PostRegion
{
    private $name;
    private $postzone;
    private $postzoneName;

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
    public function getPostzone()
    {
        return $this->postzone;
    }

    /**
     * @param mixed $postzone
     */
    public function setPostzone($postzone)
    {
        $this->postzone = $postzone;
    }

    /**
     * @return mixed
     */
    public function getPostzoneName()
    {
        return $this->postzoneName;
    }

    /**
     * @param mixed $postzoneName
     */
    public function setPostzoneName($postzoneName)
    {
        $this->postzoneName = $postzoneName;
    }




}