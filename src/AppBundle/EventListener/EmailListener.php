<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\Email;
use AppBundle\Services\KafkaService;
use Doctrine\ORM\Event\LifecycleEventArgs;

class EmailListener
{
    /**
     * @var KafkaService
     */
    private $kafkaService;

    public function __construct(KafkaService $kafkaService)
    {
        $this->kafkaService = $kafkaService;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof Email) {
            return;
        }

        $this->kafkaService->sendMessage();
    }
}
