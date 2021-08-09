<?php

namespace App\Controllers;


use App\Models\Product;
use Core\Controller;
use Core\Flash;
use Core\Helper;
use Core\View;

class Products extends Controller
{

    public function indexAction()
    {

        $products = Product::getAll();
        View::renderTemplate('Products/index.php', ['products' => $products]);
    }

    public function newAction()
    {
        $product = new Product($_POST);
        //Helper::debugVD($product);


        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
           // Helper::debugPR($_POST);

            if ($product->save()) {
                Flash::addMessage('Товар успешно сохранен');
                Helper::redirect('/products/new');
            }
        }

        View::renderTemplate('Products/new.twig', ['product'=> $product]);
    }


    /**
     * Show the edit page
     * @return void
     */
    public function editAction()
    {
        echo '<p>Hello from the ' . __METHOD__ . ' action ' . __CLASS__ . ' controller</p>';
        echo '<p>Query string parameters:</p><pre>' .
                htmlspecialchars(print_r($this->route_params, true))
                .'</pre>';
    }

}