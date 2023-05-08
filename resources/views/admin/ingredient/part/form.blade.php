@csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Наименование"
           required maxlength="100" value="{{ old('name') ?? $ingredient->name ?? '' }}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="slug" placeholder="ЧПУ (на англ.)"
           required maxlength="100" value="{{ old('slug') ?? $ingredient->slug ?? '' }}">
</div>
<div class="form-group">
    <textarea class="form-control" name="content" id="editor" placeholder="Контент"
              required rows="10">{{ old('content') ?? $ingredient->content ?? '' }}</textarea>
</div>

<div class="form-group">
    <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg">
</div>

@isset($ingredient->image)
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remove" id="remove">
        <label class="form-check-label" for="remove">
            Удалить загруженное изображение
        </label>
    </div>
@endisset

<div class="form-group">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
