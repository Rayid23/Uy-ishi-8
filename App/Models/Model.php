<?php

namespace App\Models;

use App\Databases\Database;

use PDO;

class Model extends Database
{
    public static $limit = 10;

    public static function Create($data)
    {
        if (isset($data["password"])) {
            $data["password"] = md5($data["password"]);
        }

        $columns = implode(",", array_keys($data));
        $placeholders = implode(",", array_fill(0, count($data), '?'));
        $sql = "INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)";
        $stmt = self::NewConnect()->prepare($sql);
        $stmt->execute(array_values($data));
    } #Защищено от sql атаки


    public static function Update(int $id, array $data)
    {

        $set = "";

        foreach ($data as $key => $value) {
            $set .= $key . "='" . $value . "',";
        }

        $set = substr($set, 0, -1);

        $sql = "UPDATE " . static::$table . " SET {$set} WHERE id={$id}";
        self::NewConnect()->exec($sql);
    }

    public static function SelectAll(int $start)
    {
        $sql = "SELECT * FROM " . static::$table . " LIMIT $start,99999";
        $statement = self::NewConnect()->query($sql);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    } #Защищено от sql атаки

    public static function SelectToLimit(int $start){
        $sql = "SELECT * FROM ". static::$table . " LIMIT $start,15";
        $statement = self::NewConnect()->query($sql);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public static function SelectToQuery($sql)
    {
        try {
            $sqlReady = $sql;

            $statement = self::NewConnect()->query($sql);
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            return false;
        }
    } #Защищено от sql атаки


    public static function DeleteAll()
    {
        $sql = "DELETE FROM " . static::$table;
        self::NewConnect()->exec($sql);
    } #Защищено от sql атаки

    public static function Delete(int $id)
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id={$id}";
        self::NewConnect()->exec($sql);
    } #Защищено от sql атаки

    public static function Show(int $id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id={$id}";
        $Result = self::NewConnect()->query($sql);

        return $Result->fetch(PDO::FETCH_OBJ);
    } #Защищено от sql атаки

    public static function WhereCol($col, $opt, $data)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE {$col}{$opt}:data";

        $stmt = self::NewConnect()->prepare($sql);
        $stmt->bindParam(":data", $data, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } #Защищено от sql атаки

    public static function WhereColLimit($col, $opt, $data, $start)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE {$col}{$opt}:data LIMIT $start, 15";

        $stmt = self::NewConnect()->prepare($sql);
        $stmt->bindParam(":data", $data, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } #Защищено от sql атаки

    public static function attach($data)
    {
        $set = [];
        $params = [];

        foreach ($data as $key => $value) {

            if ($key == "password") {
                $value = md5($value);
            }

            $set[] = "{$key} = :{$key}";
            $params[$key] = $value;
        }
        $set = implode(' AND ', $set);
        
        $sql = "SELECT * FROM ". static::$table . " WHERE {$set}";
        $stmt = self::NewConnect()->prepare($sql);

        foreach ($params as $paramKey => $paramValue) {
            $stmt->bindValue(":{$paramKey}", $paramValue, PDO::PARAM_STR);
        }


        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);      
    } #Защищено от sql атаки

    public static function DeleteWhere($col, $opt, $data)
    {
        $sql = "DELETE FROM " . static::$table . " WHERE {$col}{$opt}{$data}";
        self::NewConnect()->exec($sql);
    } #Не Защищено от sql атаки

    public static function WhereCol2($col, $opt, $data, $col2, $opt2, $data2)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE {$col}{$opt}'{$data}' AND {$col2}{$opt2}'{$data2}'";

        $Result = self::NewConnect()->query($sql);

        return $Result->fetchAll(PDO::FETCH_OBJ);
    } #Не Защищено от sql атаки

    public static function Pagenet()
    {

        $sqlCountUser = "SELECT * FROM " . static::$table;
        $sqlCountUserRes = self::NewConnect()->query($sqlCountUser);
        $sqlCountUserRow = $sqlCountUserRes->fetchAll(PDO::FETCH_OBJ);

        return ceil(count($sqlCountUserRow) / self::$limit);
    } #Защищено от sql атаки

    public static function WhereLike($column, $word)
    {

        $sql = "SELECT * FROM " . static::$table . " WHERE {$column} LIKE '%{$word}%'";
        $Result = self::NewConnect()->query($sql);
        return $Result->fetchAll(PDO::FETCH_OBJ);
    }
}
