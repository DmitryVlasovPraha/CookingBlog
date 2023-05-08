<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest {
    /**
     * Определяет, есть ли права у пользователя на этот запрос
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Возвращает массив правил для проверки полей формы
     *
     * @return array
     */
    public function rules() {
        $unique = 'unique:pages,slug';
        if (in_array($this->route()->getName(), ['admin.page.update', 'user.page.update'])) {
            // получаем модель Post через маршрут admin/post/{post}
            $model = $this->route('page');
            $unique = 'unique:pages,slug,'.$model->id.',id';
        }
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'slug' => [
                'required',
                'max:100',
                $unique,
                'regex:~^[-_a-z0-9]+$~i',
            ],
            'content' => [
                'required',
                'min:5',
            ],
            'image' => [
                'mimes:jpeg,jpg,png',
                'max:5000'
            ],
        ];
    }

    /**
     * Возвращает массив сообщений об ошибках для заданных правил
     *
     * @return array
     */
    public function messages() {
        return [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'unique' => 'Такое значение поля «:attribute» уже используется',
            'min' => [
                'string' => 'Поле «:attribute» должно быть не меньше :min символов',
                'integer' => 'Поле «:attribute» должно быть :min или больше',
                'file' => 'Файл «:attribute» должен быть не меньше :min Кбайт'
            ],
            'max' => [
                'string' => 'Поле «:attribute» должно быть не больше :max символов',
                'file' => 'Файл «:attribute» должен быть не больше :max Кбайт'
            ],
            'mimes' => 'Файл «:attribute» должен иметь формат :values',
        ];
    }

    /**
     * Возвращает массив дружественных пользователю названий полей
     *
     * @return array
     */
    public function attributes() {
        return [
            'name' => 'Наименование',
            'slug' => 'ЧПУ (англ.)',
            'content' => 'Текст поста',
            'image' => 'Изображение',
        ];
    }
}
