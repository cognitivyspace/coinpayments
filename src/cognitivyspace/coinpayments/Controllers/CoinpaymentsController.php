<?php

namespace CognitivySpace\Coinpayments\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use CognitivySpace\Coinpayments\Models\Log;
use App\Http\Controllers\Controller;
use CognitivySpace\Coinpayments\Exceptions\IpnIncompleteException;

class CoinpaymentsController extends Controller
{
    public function validateIPN(Request $request)
    {
        $coinpayments = app('coinpayments');

        try {
            $coinpayments->validateIPNRequest($request);
        } catch (IpnIncompleteException $e) {
            cp_log($e->getIpn()->toArray(), 'IPN_INCOMPLETE', Log::LEVEL_ALL);
            return response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return response(Response::HTTP_OK);
    }
}
