<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\News;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class NewsGalleryController extends Controller
{
    use ImageUploadTrait;

    public function store(Request $request)
    {
        $news = News::find($request->news_id);
        if ($news) {
            $image = $request->file('file');
            //upload image
            $imagePath = $this->uploadImages($image, 'uploads/gallery');
            $thumbPath = $this->uploadImageThumb($imagePath, 'uploads/gallery/thumbnail', 500, 273);

            $news->gallery()->create([
                'image' => $imagePath,
                'thumb' => $thumbPath,
            ]);

        }

    }

    public function destroy(Gallery $news_gallery)
    {

        try {
            unlink(public_path($news_gallery->image));
        } catch (\Exception $e) {
        }
        try {
            unlink(public_path($news_gallery->thumb));
        } catch (\Exception $e) {
        }

        $news_gallery->delete();

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->to(app('url')->previous().'#gallery');
    }
}
