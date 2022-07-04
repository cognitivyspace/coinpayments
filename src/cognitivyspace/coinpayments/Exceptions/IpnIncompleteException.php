<?php

namespace CognitivySpace\Coinpayments\Exceptions;

use Throwable;
use CognitivySpace\Coinpayments\Models\Ipn;

class IpnIncompleteException extends \Exception
{
    /**
     * @var Ipn
     */
    private $ipn;

    public function __construct($message = "", Ipn $ipn, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->ipn = $ipn;
    }

    /**
     * @return Ipn
     */
    public function getIpn()
    {
        return $this->ipn;
    }
}
