<?php

namespace CodePress\CodeCategory\Tests\Controllers;

use CodePress\CodeCategory\Tests\AbstractTestCase;
use CodePress\CodeCategory\Controllers\AdminCategoriesController;
use CodePress\CodeCategory\Controllers\Controller;
use CodePress\CodeCategory\Models\Category;
use CodePress\CodeCategory\Repositories\CategoryRepository;
use Mockery as m;
use Illuminate\Contracts\Routing\ResponseFactory;

class AdminCategoriesControllerTest extends AbstractTestCase
{

	public function test_should_extend_from_controller()
	{
		$categoryRepository = m::mock(CategoryRepository::class);
		$responseFactory = m::mock(ResponseFactory::class);
		$controller = new AdminCategoriesController($responseFactory, $categoryRepository);

		$this->assertInstanceOf(Controller::class, $controller);
	}

	public function test_controller_should_run_index_method_and_return_correct_arguments()
	{
		$categoryRepository = m::mock(CategoryRepository::class);
		$responseFactory = m::mock(ResponseFactory::class);
		$controller = new AdminCategoriesController($responseFactory, $categoryRepository);
		$html = m::mock();

		$categoriesResult = ['cat1', 'cat2'];
		$categoryRepository->shouldReceive('all')->andReturn($categoriesResult);

		$responseFactory->shouldReceive('view')
			->with('codecategory::index', ['categories'=>$categoriesResult])
			->andReturn($html);

		$this->assertEquals($controller->index(), $html);
	}

}