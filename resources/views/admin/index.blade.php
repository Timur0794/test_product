@extends('layouts.main')
@section('content')
    <div class="container">
        <h1>Список товаров</h1>
        <a href="{{ route('admin.product.create') }}">Создать товар</a>

        <ul class="product-list">
            @foreach ($products as $product)
                <li>
                    <div class="product-item">
                        <div class="product-image">
                            @if ($product->photo)
                                <img src="{{ 'storage/' . $product->photo }}" alt="{{ $product->name }}" style="width: 100px;">
                            @endif
                        </div>

                        <div class="product-info">
                            {{ $product->name }} - {{ $product->formattedPrice }} тенге
                        </div>

                        <div class="product-actions">
                            <a href="{{ route('admin.product.edit', $product->id) }}"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.product.delete', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="icon-button"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="pagination" style="display: flex; justify-content: center; margin-top: 20px;">
            {{ $products->links() }}
        </div>
    </div>
@endsection
