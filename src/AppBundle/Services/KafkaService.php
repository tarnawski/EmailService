<?php

namespace AppBundle\Services;

class KafkaService
{
    /**
     * @var boolean
     */
    private $enable;
    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $port;

    /**
     * @var string
     */
    private $topic;

    public function __construct($kafka_enable, $kafka_host, $kafka_port, $kafka_topic)
    {
        $this->enable = $kafka_enable;
        $this->host = $kafka_host;
        $this->port = $kafka_port;
        $this->topic = $kafka_topic;
    }

    public function sendMessage()
    {
        if (!$this->enable) {
            return;
        }

        $produce = \Kafka\Produce::getInstance(null, null, $this->host.':'.$this->port);
        $produce->setRequireAck(-1);
        $produce->setMessages($this->topic, 0, array('CHANGE'));
        $result = $produce->send();

        return ($result['test'][0]['errCode'] == 0) ? true : false;
    }
}
