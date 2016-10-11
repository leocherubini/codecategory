<?php

namespace CodePress\CodeCategory\Tests\Models;

use CodePress\CodeCategory\Tests\AbstractTestCase;
use CodePress\CodeCategory\Models\Category;

class CategoryTest extends AbstractTestCase
{

	public function setUp()
	{
		parent::setUp();
		$this->migrate();
	}

	public function test_check_if_a_category_can_be_persisted()
	{
		$category = Category::create(['name'=>'Category Test', 'active'=>true]);

		$this->assertEquals('Category Test', $category->name);

		$categories = Category::all()->first();
		$this->assertEquals('Category Test', $category->name);
	}

}