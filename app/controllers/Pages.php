<?php
/**
 * Created by PhpStorm.
 * User: suleymanaydoslu
 * Date: 27/11/2017
 * Time: 13:44
 */

class Pages{

    public function __construct()
    {
    }

    public function index()
    {
        echo "ok";
    }

    public function about($id, $name)
    {
        echo $id.'<br>';
        echo $name.'<br>';
        echo "this is about page";
    }
}