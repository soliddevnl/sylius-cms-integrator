<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusCmsIntegrator\Core\CommandDispatcher;

use SolidDev\SyliusCmsIntegrator\Core\Command\SynchronizeProduct;
use Symfony\Component\Messenger\MessageBusInterface;

class SynchronizeProductCommandDispatcher implements SynchronizeProductCommandDispatcherInterface
{
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function synchronize(string $productCode): void
    {
        $this->messageBus->dispatch(new SynchronizeProduct($productCode));
    }
}
