<?php

namespace CodePress\CodeCategory\Controllers;

use CodePress\CodeCategory\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;

class AdminCategoriesController extends Controller
{

	/**
	 * @var Category
	 */
	private $categoryModel;

	/**
	 * @var Response
	 */
	private $response;

	public function __construct(ResponseFactory $response, Category $categoryModel)
	{
		$this->response = $response;
		$this->categoryModel = $categoryModel;
	}

	public function index()
	{
		$categories = $this->categoryModel->all();

		return $this->response->view('codecategory::index', compact('categories'));
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