<?php

namespace App\Controllers;

use App\Models\Purchases;

class Controller
{
    protected $purchase;

    public function __construct(Purchases $purchase)
    {
        $this->purchase = $purchase;
    }

    public function index()
    {
        $totalPages = ceil($this->purchase->countPurchases()/ITEMS_PER_PAGE);
        $currentPage = isset($_GET['p']) && $_GET['p'] <= $totalPages ? $_GET['p'] : 1;
        $offset = ($currentPage - 1) * ITEMS_PER_PAGE;

        $data['purchase'] = $this->purchase->getBatchPurchases( $offset, ITEMS_PER_PAGE);
        $data['pagination']['total_pages'] = $totalPages;
        $data['pagination']['current_page'] = $currentPage;
        $data['pagination']['start_page'] = max(1, $currentPage - PAGINATION_IN_ONE_SIDE);
        $data['pagination']['end_page'] = min($totalPages, $currentPage + PAGINATION_IN_ONE_SIDE);
        setView('index', $data);
    }

    public function create()
    {
        $data = [];
        if (isset($_POST['submit']) && checkToken($_POST['csrf'])) {
            $data = $this->purchase->checkForm($_POST);
            if (empty($data['errors'])) {
                $this->purchase->savePurchase($data['product_name'], $data['quantity'], $data['unit'], $data['price'], $data['purchase_date']);
                header('Location: /');
            }
        }

        setView('purchases/create', $data);
    }

    public function destroy()
    {
        $id = cleanInput($_POST['id']);
        if (checkToken($_POST['csrf']) && is_numeric($id)) {
            $this->purchase->delete($id);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function edit()
    {
        $id = cleanInput($_GET['id']);
        $data = $this->purchase->getModelById($id);
        $data['id'] = $id;
        setView('purchases/edit', $data);
    }

    public function update()
    {
        if (isset($_POST['submit']) && checkToken($_POST['csrf'])) {
            $data = $this->purchase->checkForm($_POST);
            $data['id'] = cleanInput($_POST['id']);
            if (empty($data['errors'])) {
                $this->purchase->updatePurchase($data['id'], $data['product_name'], $data['quantity'], $data['unit'], $data['price'], $data['purchase_date']);
                header('Location: ' . $_POST['referer']);
            }
        }
        setView('purchases/edit', $data);
    }

    public function page404()
    {
        setView('page404');
    }
}
