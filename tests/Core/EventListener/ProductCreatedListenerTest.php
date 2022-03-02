<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusCmsIntegrator\Tests\Core\EventListener;

use PHPUnit\Framework\TestCase;
use SolidDev\SyliusCmsIntegrator\Core\EventListener\ProductCreatedListener;
use SolidDev\SyliusCmsIntegrator\Tests\Mocks\SpyingSynchronizeProductCommandDispatcher;
use Sylius\Component\Core\Event\ProductCreated;

class ProductCreatedListenerTest extends TestCase
{
    private SpyingSynchronizeProductCommandDispatcher $commandDispatcher;

    private ProductCreatedListener $productCreatedListener;

    protected function setUp(): void
    {
        $this->commandDispatcher = new SpyingSynchronizeProductCommandDispatcher();
        $this->productCreatedListener = new ProductCreatedListener(
            $this->commandDispatcher
        );
    }

    public function testListener(): void
    {
        $this->productCreatedListener->__invoke(new ProductCreated('product_code'));

        $this->assertTrue($this->commandDispatcher->productCodeIsSynchronized('product_code'));
    }
}
