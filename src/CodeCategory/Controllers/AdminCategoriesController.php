<?php

namespace CodePress\CodeCategory\Controllers;

use CodePress\CodeCategory\Models\Category;
use CodePress\CodeCategory\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;

class AdminCategoriesController extends Controller
{

	/**
	 * @var CategoryRepository
	 */
	private $categoryRepository;

	/**
	 * @var Response
	 */
	private $response;

	public function __construct(ResponseFactory $response, CategoryRepository $categoryRepository)
	{
		$this->response = $response;
		$this->categoryRepository = $categoryRepository;
	}

	public function index()
	{
		$categories = $this->categoryRepository->all();

		return $this->response->view('codecategory::index', compact('categories'));
	}

	public function create()
	{
		$categories = $this->categoryRepository->all();

		return view('codecategory::create', compact('categories'));
	}

	public function store(Request $request)
	{
		$this->categoryRepository->create($request->all());

		return redirect()->route('admin.categories.index');
	}

	public function edit($id)
	{
		$categories = $this->categoryRepository->all();
		$category = $this->categoryRepository->find($id);

		return view('codecategory::edit', compact('categories', 'category'));
	}

	public function update($id, Request $request)
	{
		$data = $request->all();
		if(!isset($data['active']))
			$data['active'] = 0;

		$this->categoryRepository->update($data, $id);

		return redirect()->route('admin.categories.index');
	}

	public function destroy($id)
	{
		$this->categoryRepository->delete($id);

		return redirect()->route('admin.categories.index');
	}

}