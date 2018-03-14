<?php

namespace Tests\Unit\Services;

use App\Models\BodyType;
use App\Repositories\BodyTypesRepository;
use App\Services\BodyTypesService;
use Illuminate\Support\Collection;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class BodyTypesServiceTest extends TestCase
{

    /**
     * @var MockObject
     */
    protected $bodyTypesRepository;

    /**
     * Mock object of service.
     *
     * @var BodyTypesService
     */
    protected $bodyTypesService;

    public function setUp()
    {
        $this->bodyTypesRepository = $this->getMockBuilder(BodyTypesRepository::class)
            ->setMethods(['get'])
            ->getMock();

        $this->bodyTypesService = new BodyTypesService($this->bodyTypesRepository);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetListForSelection()
    {
        $bodyType = $this->getMockBuilder(BodyType::class)->getMock();

        $expected = new Collection([$bodyType]);

        $this->bodyTypesRepository->expects($this->once())->method('get')->willReturn($expected);

        $actual = $this->bodyTypesService->getListForSelection();

        $this->assertEquals($expected, $actual);
    }
}
