<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class SalesOrderController extends Controller
{
    private $baseUrl;
    private $salesOrderCollection = [];

    /**
     * Create a new SalesOrderController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->baseUrl = Config::get('constants.tradepotApiUrl');
    }

    /**
     * Get sales order list from external API.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::withOptions(['verify' => false,])
            ->get($this->baseUrl."controllers/api/picking/listoso.php");
        
        dd($response->json());
    }
}
