<?php

namespace App\Utility;

use App\Entity\Log;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\Handler\AbstractProcessingHandler;

class DbHandler extends AbstractProcessingHandler
{
    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        parent::__construct();
        $this->manager = $manager;
    }

    protected function write(array $record): void
    {
        $log = new Log();

        $log->setIp($record['extra']['ip']);
        $log->setRoute($record['extra']['url']);

        $this->manager->persist($log);
        $this->manager->flush();
    }
}