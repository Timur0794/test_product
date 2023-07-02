<?php

namespace App\Services\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data)
    {
        $data['photo'] = Storage::disk('public')->put('/images', $data['photo']);
        Product::firstOrCreate($data);
    }

    public function update($product, $data)
    {
        if(isset($data['photo']))
        {
            $data['photo'] = Storage::disk('public')->put('/images', $data['photo']);
        }
        $product->update($data);
    }
}
