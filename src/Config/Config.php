<?php

/*
 * This file is part of the Parceler package.
 * (c) Samuel A <samuelizuchi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Platitech\Parceler\Config;

use PDO;

class Config
{
    private static $DB_NAME;
    private static $DB_USER;
    private static $DB_PASS;
    private static $PDO_CONN;

    public static function getPDOConnection($force = false){
        if(self::$DB_NAME == null){
            $db_name = getenv("DB_NAME");
            $db_user = getenv("DB_USER");
            $db_pass = getenv("DB_PASS");
        }
        else{
            $db_name = self::$DB_NAME;
            $db_user = self::$DB_USER;
            $db_pass = self::$DB_PASS;
        }

        if(self::$PDO_CONN == null || $force){
            self::$PDO_CONN = new \PDO('mysql:host=localhost;dbname='.$db_name, $db_user, $db_pass, array(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION));
        }

        return self::$PDO_CONN;
    }

    /**
     * @return mixed
     */
    public static function getDBNAME()
    {
        return self::$DB_NAME;
    }

    /**
     * @param mixed $DB_NAME
     */
    public static function setDBNAME($DB_NAME)
    {
        self::$DB_NAME = $DB_NAME;
    }

    /**
     * @return mixed
     */
    public static function getDBUSER()
    {
        return self::$DB_USER;
    }

    /**
     * @param mixed $DB_USER
     */
    public static function setDBUSER($DB_USER)
    {
        self::$DB_USER = $DB_USER;
    }

    /**
     * @return mixed
     */
    public static function getDBPASS()
    {
        return self::$DB_PASS;
    }

    /**
     * @param mixed $DB_PASS
     */
    public static function setDBPASS($DB_PASS)
    {
        self::$DB_PASS = $DB_PASS;
    }



}