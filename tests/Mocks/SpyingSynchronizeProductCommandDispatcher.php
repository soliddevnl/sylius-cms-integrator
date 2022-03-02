<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusCmsIntegrator\Tests\Mocks;

use SolidDev\SyliusCmsIntegrator\Core\CommandDispatcher\SynchronizeProductCommandDispatcherInterface;

final class SpyingSynchronizeProductCommandDispatcher implements SynchronizeProductCommandDispatcherInterface
{
    private array $codes = [];

    public function synchronize(string $productCode): void
    {
        $this->codes[] = $productCode;
    }

    public function productCodeIsSynchronized(string $productCode): bool
    {
        return in_array($productCode, $this->codes);
    }
}
