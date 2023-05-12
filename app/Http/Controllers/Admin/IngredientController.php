<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;


class IngredientController extends Controller
{
    /**
     * Показывает список всех тегов блога
     */
    public function index() {
        $items = Ingredient::paginate(8);
        return view('admin.ingredient.index', compact('items'));
    }

    /**
     * Показывает форму для создания тега
     */
    public function create() {
        return view('admin.ingredient.create');
    }

    /**
     * Сохраняет новый тег в базу данных
     */
    public function store(Request $request) {
        $this->validator($request->all(), null)->validate();
        $ingredient = Ingredient::create($request->all());
        return redirect()
            ->route('admin.ingredient.index')
            ->with('success', 'Новый тег блога успешно создан');
    }

    /**
     * Показывает форму для редактирования тега
     */
    public function edit(Ingredient $ingredient) {
        return view('admin.ingredient.edit', compact('ingredient'));
    }

    /**
     * Обновляет тег блога в базе данных
     */
    public function update(Request $request, Ingredient $ingredient) {
        $this->validator($request->all(), $ingredient->id)->validate();
        $ingredient->update($request->all());
        return redirect()
            ->route('admin.ingredient.index')
            ->with('success', 'Тег блога был успешно исправлен');
    }

    /**
     * Удаляет тег блога из базы данных
     */
    public function destroy(Ingredient $ingredient) {
        $ingredient->delete();
        return redirect()
            ->route('admin.ingredient.index')
            ->with('success', 'Тег блога был успешно удален');
    }

    /**
     * Возвращает объект валидатора с нужными правилами
     */
    private function validator($data, $id) {
        $unique = 'unique:ingredients'; //slug;
        if ($id) {
            // проверка на уникальность slug тега при редактировании,
            // исключая этот тег по идентифкатору в таблице БД tags
            $unique = 'unique:ingredients,'.$id.',id';//slug,
        }
        $rules = [
            'name' => [
                'required',
                'string',
                'max:50',
            ],
           /* 'slug' => [
                'required',
                'max:50',
                $unique,
                'regex:~^[-_a-z0-9]+$~i',
            ]*/
        ];
        $messages = [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'max' => 'Поле «:attribute» должно быть не больше :max символов',
        ];
        $attributes = [
            'name' => 'Наименование',
            //'slug' => 'ЧПУ (англ.)'
        ];
        return \Illuminate\Support\Facades\Validator::make($data, $rules, $messages, $attributes);
    }
}
