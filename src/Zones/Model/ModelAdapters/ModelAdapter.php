<?php
/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Zones\Model\ModelAdapters;


use Platitech\Parceler\Config\AbstractModelAdapter;
use Platitech\Parceler\Config\ModelAdapterInterface;
use Platitech\Parceler\Zones\Model\ModelAdapters\Pdo\PDOModel;

class ModelAdapter extends AbstractModelAdapter implements ModelAdapterInterface
{
    /**
     * @return PDOModel
     */
    public function getAdapter(){
        return new PDOModel();
    }
}