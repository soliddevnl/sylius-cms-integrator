<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusCmsIntegrator\Core\CommandHandler;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SolidDev\SyliusCmsIntegrator\Core\Command\SynchronizeProduct;
use SolidDev\SyliusCmsIntegrator\Core\Repository\RemoteProductRepositoryInterface;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Core\Repository\ProductRepositoryInterface;

class SynchronizeProductHandlerTest extends TestCase
{
    private ProductRepositoryInterface|MockObject $productRepository;

    private RemoteProductRepositoryInterface $remoteProductRepository;

    private SynchronizeProductHandler $handler;

    protected function setUp(): void
    {
        $this->productRepository = $this->createMock(ProductRepositoryInterface::class);
        $this->remoteProductRepository = $this->createMock(RemoteProductRepositoryInterface::class);
        $this->handler = new SynchronizeProductHandler(
            $this->productRepository,
            $this->remoteProductRepository
        );
    }

    public function testWithExistingProductCode(): void
    {
        $product = $this->createMock(ProductInterface::class);

        $this->productRepository->expects($this->once())
            ->method('findOneByCode')
            ->with('product_code')
            ->willReturn($product);

        $this->remoteProductRepository->expects($this->once())
            ->method('save')
            ->with($product);

        $this->handler->__invoke(new SynchronizeProduct('product_code'));
    }

    public function testWithRemovedProductCode(): void
    {
        $this->productRepository->expects($this->once())
            ->method('findOneByCode')
            ->with('product_code')
            ->willReturn(null);

        $this->remoteProductRepository->expects($this->once())
            ->method('remove')
            ->with('product_code');

        $this->handler->__invoke(new SynchronizeProduct('product_code'));
    }
}
