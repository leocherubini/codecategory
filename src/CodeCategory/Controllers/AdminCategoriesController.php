<?php

namespace CodePress\CodeCategory\Controllers;

use CodePress\CodeCategory\Models\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{

	/**
	 * @var Category
	 */
	private $categoryModel;

	public function __construct(Category $categoryModel)
	{
		$this->categoryModel = $categoryModel;
	}

	public function index()
	{
		$categories = $this->categoryModel->all();

		return view('codecategory::index', compact('categories'));
	}

	public function create()
	{
		$categories = $this->categoryModel->all();

		return view('codecategory::create', compact('categories'));
	}

	public function store(Request $request)
	{
		$this->categoryModel->create($request->all());

		return redirect()->route('admin.categories.index');
	}
}