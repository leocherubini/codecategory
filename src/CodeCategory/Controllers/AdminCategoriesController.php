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

	public function edit($id)
	{
		$categories = $this->categoryModel->all();
		$category = $this->categoryModel->find($id);

		return view('codecategory::edit', compact('categories', 'category'));
	}

	public function update($id, Request $request)
	{
		$data = $request->all();
		if(!isset($data['active']))
			$data['active'] = 0;

		$this->categoryModel->find($id)->update($data);

		return redirect()->route('admin.categories.index');
	}

	public function destroy($id)
	{
		$this->categoryModel->find($id)->delete();

		return redirect()->route('admin.categories.index');
	}

}