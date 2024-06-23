<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Menu;

class Frontoffice extends BaseController
{
    public function index()
    {
        $menu = new Menu();
        $data['categories'] = $menu->distinct()->select('category')->get()->getResultArray();
        $data['menu'] = $menu->findAll();



        return view('front_office', $data);
    }
}
