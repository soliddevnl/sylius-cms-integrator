<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusCmsIntegrator\Core\CommandHandler;

use SolidDev\SyliusCmsIntegrator\Core\Command\SynchronizeProduct;
use SolidDev\SyliusCmsIntegrator\Core\Repository\RemoteProductRepositoryInterface;
use Sylius\Component\Core\Repository\ProductRepositoryInterface;

final class SynchronizeProductHandler
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private RemoteProductRepositoryInterface $remoteProductRepository
    ) {
    }

    public function __invoke(SynchronizeProduct $command): void
    {
        $product = $this->productRepository->findOneByCode($command->productCode);

        if (null === $product) {
            $this->remoteProductRepository->remove($command->productCode);

            return;
        }

        $this->remoteProductRepository->save($product);
    }
}
