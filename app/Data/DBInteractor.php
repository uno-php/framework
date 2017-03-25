<?php

namespace App\Data;

use PDO;
use PDOException;

abstract class DBInteractor {

    protected $db;

    function __construct()
    {
        $this->db = $this->connect();
    }

    protected function connect()
    {
        $config = config('database');

        $dsn = $config['driver'] .":host=". $config['host'] . ";dbname=" . $config['database'] . ";";

//        dd($dsn);
//
        try {
            $pdo = new PDO($dsn, $config['username'], $config['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;

        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    protected function executeQuery($sql) // SELECT
    {
        try {

            $sth = $this->db->query($sql);

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $results = $sth->fetchAll();

            // return count($results) > 1 ? $results : $results[0];

            return $results;
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }


    }

    protected function executeAction($sql, $data = null) // INSERT/UPDATE/DELETE
    {
        try {
            $sth = $this->db->prepare($sql);

            if ($data === null)
            {
                $sth->execute();
            }
            else
            {
                $sth->execute($data);
            }

            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}