<?php

namespace App\Utility;

use Symfony\Component\HttpFoundation\RequestStack;

class DbProcessor
{
    private $request;

    public function __construct(RequestStack $request)
    {
        $this->request = $request->getCurrentRequest();
    }

    public function __invoke(array $record)
    {
        //add more information to record (Client IP and Route)
        $record['extra']['ip'] = $this->request->getClientIp();
        $record['extra']['url'] = $this->request->getRequestUri();

        return $record;
    }
}