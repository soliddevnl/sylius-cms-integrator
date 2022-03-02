<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusCmsIntegrator\Core\EventListener;

use SolidDev\SyliusCmsIntegrator\Core\CommandDispatcher\SynchronizeProductCommandDispatcherInterface;
use Sylius\Component\Core\Event\ProductUpdated;

final class ProductUpdatedListener
{
    private SynchronizeProductCommandDispatcherInterface $commandDispatcher;

    public function __construct(SynchronizeProductCommandDispatcherInterface $commandDispatcher)
    {
        $this->commandDispatcher = $commandDispatcher;
    }

    public function __invoke(ProductUpdated $event): void
    {
        $this->commandDispatcher->synchronize($event->code);
    }
}
