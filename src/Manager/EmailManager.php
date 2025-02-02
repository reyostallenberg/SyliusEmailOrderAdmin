<?php

namespace FMDD\SyliusEmailOrderAdminPlugin\Manager;

use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Mailer\Sender\SenderInterface;

class EmailManager
{
    /**
     * @var SenderInterface
     */
    private $emailSender;
    /**
     * @var string
     */
    private $environment;
    /**
     * @var array
     */
    private $emails;

    /**
     * @param SenderInterface $emailSender
     * @param string $environment
     * @param array $emailsAdmin
     */
    public function __construct(SenderInterface $emailSender, string $environment, array $emailsAdmin)
    {
        $this->emailSender = $emailSender;
        $this->environment = $environment;
        $this->emails = $emailsAdmin;
    }

    /**
     * @param OrderInterface $order
     */
    public function sendOrderPayedEmail(OrderInterface $order)
    {
        if ($this->environment != "dev")
            $this->emailSender->send('order_payed',
                $this->emails, ['order' => $order]);
        else
            $this->emailSender->send('order_payed',
                $this->emails, ['order' => $order]);
    }
}
