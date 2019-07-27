<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers
 *
 * @author Aleksandr Gavva
 */
class CategoryController extends Controller
{
    /**
     * Список категорий в виде дерева
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rootCategory = Category::whereNull('parent_id')->first();
        return $rootCategory->getDescendants()->toHierarchy();
    }

    /**
     * Создание категории
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'parent_id' => 'required|exists:categories,id',
            'title' => 'required',
        ]);
        $parentId = $request->input('parent_id');
        $title = $request->input('title');

        $root = Category::findOrFail($parentId);
        $child = Category::create(['title' => $title]);
        $child->makeChildOf($root);
        return $child;

    }

    /**
     * Отображение категории
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $node = Category::findOrFail($id);
        return $node;
    }

    /**
     * Обновление категории
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $node = Category::findOrFail($id);
        $title = $request->input('title');
        $node->title = $title;
        $node->save();
        return $node;
    }

    /**
     * Удаление категории
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $node = Category::findOrFail($id);
        $node->delete();
    }

    /**
     * Список продуктов в категории
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function products($id)
    {
        $products = Product::where('category_id', $id)->get();
        return $products;
    }
}
