<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusCmsIntegrator\Tests\Core\EventListener;

use PHPUnit\Framework\TestCase;
use SolidDev\SyliusCmsIntegrator\Core\EventListener\ProductUpdatedListener;
use SolidDev\SyliusCmsIntegrator\Tests\Mocks\SpyingSynchronizeProductCommandDispatcher;
use Sylius\Component\Core\Event\ProductUpdated;

class ProductUpdatedListenerTest extends TestCase
{
    private SpyingSynchronizeProductCommandDispatcher $commandDispatcher;

    private ProductUpdatedListener $productUpdatedListener;

    protected function setUp(): void
    {
        $this->commandDispatcher = new SpyingSynchronizeProductCommandDispatcher();
        $this->productUpdatedListener = new ProductUpdatedListener(
            $this->commandDispatcher
        );
    }

    public function testListener(): void
    {
        $this->productUpdatedListener->__invoke(new ProductUpdated('product_code'));

        $this->assertTrue($this->commandDispatcher->productCodeIsSynchronized('product_code'));
    }
}
