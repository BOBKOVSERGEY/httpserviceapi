<?php

namespace App\Controllers;

use App\Models\Product;
use Core\Controller;
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
        if(!empty($_POST)) {
            Helper::debugPR($_POST, 1);
            $product = new Product($_POST);



            if ($product->save()) {


                Helper::redirect('/products/new');

            }
        }

        View::renderTemplate('Products/new.php');
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