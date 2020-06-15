@php /** @var \App\Models\BlogCategory $item  */ @endphp



<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
    </li>
</ul>
<br>
<div class="container">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="title">Заголовок</label>
      <input name="title" value="{{ old('title', $item->title) }}"
             id="title"
             type="text"
             class="form-control"
             minlength="3"
             required>
    </div>
  </div>

  <div class="form-group">
    <label for="slug">Идентификатор</label>
    <input name="slug" value="{{ $item->slug }}"
           id="slug"
           type="text"
           class="form-control">
  </div>

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="parent_id">Родитель</label>
        <select name="parent_id"
                id="parent_id"
                class="form-control"
                placeholder="Выберите категорию"
                required>
            @foreach($categoryList as $categoryOption)
                <option value="{{ $categoryOption->id }}"
                    @if($categoryOption->id == $item->parent_id) selected @endif>
                    {{ $categoryOption->id_title }}
                </option>
            @endforeach
        </select>
    </div>
  </div>

    <div class="form-group">
        <label for="description">Описание</label>
        <textarea   name="description"
                    id="description"
                    class="form-control"
                    rows="6">{{ old('description', $item->description) }}
        </textarea>
    </div>

</div>
