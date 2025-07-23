<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Product;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    use ImageUploadTrait;

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        if ($product) {
            $image = $request->file('file');
            //upload image
            $imagePath = $this->uploadImages($image, 'uploads/gallery');
            $thumbPath = $this->uploadImageThumb($imagePath, 'uploads/gallery/thumbnail', 500, 273);

            $product->gallery()->create([
                'image' => $imagePath,
                'thumb' => $thumbPath,
            ]);

        }

    }

    public function destroy(Gallery $product_gallery)
    {

        try {
            unlink(public_path($product_gallery->image));
        } catch (\Exception $e) {
        }
        try {
            unlink(public_path($product_gallery->thumb));
        } catch (\Exception $e) {
        }

        $product_gallery->delete();

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->to(app('url')->previous().'#gallery');
    }
}
