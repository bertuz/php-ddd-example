<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Mooc\Shared\Infrastructure\PhpUnit;

use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
use Doctrine\ORM\EntityManager;

abstract class MoocContextInfrastructureTestCase extends InfrastructureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $arranger = new MoocEnvironmentArranger($this->service(EntityManager::class));

        $arranger->arrange();
    }

    protected function tearDown(): void
    {
        $arranger = new MoocEnvironmentArranger($this->service(EntityManager::class));

        $arranger->close();

        parent::tearDown();
    }

    protected function clearUnitOfWork(): void
    {
        $this->service(EntityManager::class)->clear();
    }
}
