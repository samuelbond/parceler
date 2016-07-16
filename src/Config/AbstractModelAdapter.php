<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Config;


abstract class AbstractModelAdapter
{
    protected $default = "PDO";

    /**
     * AbstractModelAdapter constructor.
     * @param string $default
     */
    public function __construct($default = "PDO")
    {
        $this->default = $default;
    }


    /**
     * @return string
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param string $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }



}