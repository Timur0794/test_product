@extends('layouts.main')
@section('content')
    <div class="container">
        <h1>Последние  добавленные товары:</h1>
        <ul class="product-list">
            @foreach ($latestProducts as $product)
                <li>
                    @if ($product->photo)
                        <img src="{{ 'storage/' . $product->photo }}" alt="{{ $product->name }}" style="width: 100px;">
                    @endif
                    {{ $product->name }} - {{ $product->formattedPrice }}
                </li>
            @endforeach
        </ul>

        <h1>Все товары:</h1>
        <ul class="product-list">
            @foreach ($allProducts as $product)
                <li>
                    {{ $product->name }} - {{ $product->formattedPrice }}
                    @if ($product->photo)
                        <img src="{{ 'storage/' . $product->photo }}" alt="{{ $product->name }}" style="width: 100px;">
                    @endif
                </li>
            @endforeach
        </ul>

        <div class="pagination" style="display: flex; justify-content: center; margin-top: 20px;">
            {{ $allProducts->links() }}
        </div>
    </div>
@endsection
