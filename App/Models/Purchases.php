<?php

namespace App\Models;

use database\Sql;

class Purchases
{
    public $db;

    public function __construct(Sql $db)
    {
        $this->db = $db;
    }

    public function getBatchPurchases(int $start, int $batchSize)
    {
        $sql = "SELECT * FROM `purchases` ORDER BY id DESC LIMIT $start, $batchSize";
        return $this->db->select($sql);
    }

    public function countPurchases(): int
    {
        $sql = 'SELECT count(*) as count FROM `purchases`';
        return $this->db->select($sql, 'one')['count'];
    }

    public function getModelById(int $id): array
    {
        $sql = 'SELECT * FROM `purchases` WHERE id = ' . $id . ' LIMIT 1';
        return $this->db->select($sql, 'one');
    }

    public function delete(int $id): void
    {
        $sql = 'DELETE FROM `purchases` WHERE id = '. $id;
        $this->db->save($sql);
    }

    public function savePurchase(string $productName, int $quantity, string $unit, float $price, string $purchaseDate): void
    {
        $sql = 'INSERT INTO `purchases` (product_name, quantity, unit, price,
                    purchase_date, created_at, updated_at) 
                VALUES ("' . $productName . '", ' . $quantity . ', "' . $unit . '", "' . $price . '",
                    "' . $purchaseDate . '", NOW(), NOW()
            )';
        $this->db->save($sql);
    }

    public function updatePurchase(int $id, string $productName, int $quantity, string $unit, float $price, string $purchaseDate)
    {
        $sql = 'UPDATE `purchases` SET 
                  product_name = "' . $productName . '",
                  quantity = ' . $quantity . ',
                  unit = "' . $unit . '",
                  price = "' . $price . '",
                  purchase_date = "' . $purchaseDate . '",
                  updated_at = NOW()
            WHERE id = ' . $id;
        $this->db->save($sql);
    }

    public function checkForm($arr): array
    {
        $data = [];
        $data['product_name'] = cleanInput($arr['product_name']);
        if (strlen($data['product_name']) < 3) {
            $data['errors'][] = 'Некоректно введене поле назви продукту. Мінімум три символи.';
        }
        $data['quantity'] = cleanInput($arr['quantity']);
        if ($data['quantity'] <= 0 || !is_numeric($data['quantity'])) {
            $data['errors'][] = 'Некоректно введена кількість.';
        }
        $data['unit'] = cleanInput($arr['unit']);
        if (strlen($data['unit']) == 0 ) {
            $data['errors'][] = 'Некоректно введене поле одиниці виміру.';
        }
        $data['price'] = str_replace(',','.', cleanInput($arr['price']));
        if ($data['price'] <= 0 || !is_numeric($data['price'])) {
            $data['errors'][] = 'Некоректно введена ціна.';
        }

        $data['purchase_date'] = cleanInput($arr['purchase_date']);
        $pattern = '/^\d{4}-\d{2}-\d{2}$/';
        if (!preg_match($pattern, trim($data['purchase_date']))) {
            $data['errors'][] = 'Некоректно введена дата закупки.';
        }
        return $data;
    }
}
