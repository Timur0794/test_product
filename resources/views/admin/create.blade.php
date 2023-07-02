@extends('layouts.main')
@section('content')
   <h1>Создать товар</h1>
   <div class="container">
    <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name"> Наименование </label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="price"> Цена </label>
            <input type="number" name="price" id="price" required>
        </div>
        <div class="mb-3">
            <label for="photo">Изображение</label>
            <div class="text-center">
            <input type="file" name="photo" id="photo" accept="image/*" onchange="previewImage(event)">
            <img id="preview" src="#" alt="Изображение товара" class="img-thumbnail rounded mx-auto d-block" style="max-width: 200px; display: none; margin-top: 10px;"Ò>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

   <a href="{{ route('admin.product.index') }}">Назад к списку товаров</a>
   </div>
@endsection
@section('scripts')
    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function() {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>
@endsection
