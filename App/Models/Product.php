<?php


namespace App\Models;

use Core\Helper;
use Core\Model;
use DateTime;
use PDO;
use PDOException;

class Product extends Model
{
    public $errors = [];

    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $this->$key = Helper::security($value);
        }
    }

    public function validate()
    {
        // check name
        if ($this->name == '') {
            $this->errors['name'] = 'Поле Название обязательно для заполнения';
        }
        if(!static::validateDate($this->date)) {
            $this->errors['date'] = 'Не корректно заполнена дата';
        }
        if ($this->price == '') {
            $this->errors['price'] = 'Поле Цена обязательно для заполнения';
        } else if (!is_numeric($this->price)) {
            $this->errors['price'] = 'Поле Цена должно быть числом';
        }
    }

    /**
     * @param $date
     * @param string $format
     * @return bool
     */
    public static function validateDate($date, $format = 'd.m.Y H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    /**
     * Save the user model with the current property values
     */
    public function save()
    {
        $this->validate();


        if (empty($this->errors)) {

            $this->date = date('Y-m-d H:i:s', strtotime($this->date));
            $this->price = number_format($this->price, 2, '.', ' ');

            $sql = 'INSERT INTO PRODUCTS (NAME, PRICE, DATE)
                VALUES (:name, :price, :date)';

            $db = static::getDB();

            $stmt = $db->prepare($sql);
            //Helper::debugVD($this->data, 1);
            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':price', $this->price, PDO::PARAM_STR);
            $stmt->bindValue(':date', $this->date, PDO::PARAM_STR);
            return $stmt->execute();
        }

        return false;
    }


    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT NAME, PRICE, DATE FROM PRODUCTS ORDER BY DATE');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}