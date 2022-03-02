<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusCmsIntegrator\Core\Repository;

use Sylius\Component\Core\Model\ProductInterface;

interface RemoteProductRepositoryInterface
{
    public function save(ProductInterface $product): void;

    public function remove(string $productCode): void;
}
