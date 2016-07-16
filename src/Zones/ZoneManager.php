<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Zones;


use Platitech\Parceler\Zones\Model\ModelAdapters\ModelAdapter;
use Platitech\Parceler\Zones\Model\ZoneModelInterface;

class ZoneManager
{
    /**
     * @var ZoneModelInterface
     */
    private $model;

    /**
     * ZoneManager constructor.
     */
    public function __construct()
    {
        $this->model = (new ModelAdapter())->getAdapter();
    }

    /**
     * @return ZoneModelInterface
     */
    public function getModel()
    {
        return $this->model;
    }



}