<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusHeadlessCmsIntegrator\Tests\Core\CommandDispatcher;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SolidDev\SyliusCmsIntegrator\Core\Command\SynchronizeProduct;
use SolidDev\SyliusCmsIntegrator\Core\CommandDispatcher\SynchronizeProductCommandDispatcher;
use SolidDev\SyliusCmsIntegrator\Core\CommandDispatcher\SynchronizeProductCommandDispatcherInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;

class SynchronizeProductCommandDispatcherTest extends TestCase
{
    private MessageBusInterface|MockObject $messageBus;

    private SynchronizeProductCommandDispatcherInterface $commandDispatcher;

    protected function setUp(): void
    {
        $this->messageBus = $this->createMock(MessageBusInterface::class);
        $this->commandDispatcher = new SynchronizeProductCommandDispatcher(
            $this->messageBus
        );
    }

    public function testSync(): void
    {
        $this->messageBus->expects($this->once())
            ->method('dispatch')
            ->with($this->callback(function (SynchronizeProduct $command) {
                self::assertEquals('product_code', $command->productCode);

                return true;
            }))
            ->willReturn(new Envelope(new \stdClass()));

        $this->commandDispatcher->synchronize('product_code');
    }
}
