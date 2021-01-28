<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class SalesOrderController extends Controller
{
    private $baseUrl;
    private $itemPerPage = 10;

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
    public function index(Request $request)
    {
        //Calling external API
        $response = Http::withOptions(['verify' => false,])->get($this->baseUrl . "controllers/api/picking/listoso.php");

        //Check the response status, If failed return empty array
        if ($response->failed()) {
            return [];
        }

        //Current page
        $page = isset($request->page) ? $request->page : 1;

        $startingPoint = ($page * $this->itemPerPage) - $this->itemPerPage;
        $responseArray = array_slice($response->json(), $startingPoint, $this->itemPerPage, true);

        //Create a LengthAwarePaginator instance
        $result = new LengthAwarePaginator($responseArray, count($response->json()), $this->itemPerPage, $page);

        return $result;
    }
}
