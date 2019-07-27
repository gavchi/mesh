<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers
 *
 * @author Aleksandr Gavva
 */
class ProductController extends Controller
{
    /**
     * Создание товара в категории
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $title = $request->input('title');
        $description = $request->input('description');
        //Упрощенный вариант без загрузки файла
        $image = $request->input('image');

        $category = Category::findOrFail($id);
        $product = $category->products()->create([
            'title' => $title,
            'description' => $description,
            'image' => $image,
        ]);
        return $product;

    }

    /**
     * Отображение товара
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }

    /**
     * Обновление товара
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->title = $request->input('title', $product->title);
        $product->description = $request->input('description', $product->description);
        //Упрощенный вариант без загрузки файла
        $product->image = $request->input('image', $product->image);
        $product->save();
        return $product;
    }

    /**
     * Удаление товара
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
}
