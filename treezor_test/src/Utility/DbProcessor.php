<?php

namespace App\Utility;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Security;

class DbProcessor
{
    private $request;
    private $security;

    public function __construct(RequestStack $request, Security $security)
    {
        $this->request = $request->getCurrentRequest();
        $this->security = $security;
    }

    public function __invoke(array $record)
    {
        //add more information to record (Client IP and Route)
        $record['extra']['ip'] = $this->request->getClientIp();
        $record['extra']['url'] = $this->request->getBaseUrl();

        return $record;
    }
}