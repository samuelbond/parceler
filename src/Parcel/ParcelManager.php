<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Parcel;


use Platitech\Parceler\Parcel\Model\ModelAdapters\ModelAdapter;
use Platitech\Parceler\Parcel\Model\ParcelModelInterface;

class ParcelManager
{
    /**
     * @var ParcelModelInterface
     */
    private $model;


    public function __construct()
    {
        $this->model = (new ModelAdapter())->getAdapter();
    }

    /**
     * @return ParcelModelInterface
     */
    public function getModel()
    {
        return $this->model;
    }
}