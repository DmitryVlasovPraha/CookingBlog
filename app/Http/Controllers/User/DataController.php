<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller {
    /**
     * Показывает форму для редактирования данных
     */
    public function edit(User $user) {
        $timezones = User::TIMEZONES;
        return view('user.data', compact('user', 'timezones'));
    }

    /**
     * Обновляет данные пользователя в базе данных
     */
    public function update(Request $request, User $user) {
        /*
         * Проверяем данные формы
         */
        $request->validate([
            'name' => 'string|required|max:255',
            'timezone' => 'nullable|string|max:255'
        ]);
        /*
         * Обновляем пользователя
         */
        $user->update($request->only(['name', 'timezone']));
        /*
         * Возвращаемся на главную
         */
        return redirect()
            ->route('user.index')
            ->with('success', 'Данные успешно обновлены');
    }
}
