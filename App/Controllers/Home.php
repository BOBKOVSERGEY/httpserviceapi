<?php


namespace App\Controllers;


use Core\Controller;
use Core\View;

class Home extends Controller
{
    /**
     * Before filter - called before an action method
     * @return void
     */
    protected function before()
    {
        //echo '(before)';
        //return false;
    }

    /**
     * After filter - called after an action method
     * @return void
     */
    protected function after()
    {
        //echo '(after)';
    }

    /**
     * Show the index page
     *
     * return void
     */
    public function indexAction()
    {
        //echo 'Hello from the ' . __METHOD__ . ' - action ' . __CLASS__ . ' - controller';
        /*View::render('Home/index.php', [
                'name' => 'Dave',
                'colours' => ['red', 'green', 'blue']
        ]);*/
        View::renderTemplate('Home/index.php', [
                'name' => 'Dave',
                'colours' => ['red', 'green', 'blue']
        ]);
    }
}