<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {

        $module = Product::latest()->get();
        $categories = Category::all();

        return view('admin.product.index', compact('module', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
        ]);

        $category = Category::find($request->category);

        $image = $request->file('image');
        $imagePath = $this->uploadImages($image, 'uploads/product');

        $catalogPath = null;
        if (isset($request->catalog)) {
            $catalog = $request->file('catalog');
            $catalogPath = $this->uploadImages($catalog, 'uploads/product/catalog');
        }

        $bannerPath = null;
        if (isset($request->banner)) {
            $banner = $request->file('banner');
            $bannerPath = $this->uploadImages($banner, 'uploads/product/banner');
        }

        $videoPath = null;
        if (isset($request->video)) {
            $video = $request->file('video');
            $videoPath = $this->uploadImages($video, 'uploads/product/video');
        }

        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 0;
        }

        if ($request->faq[0]['question'] == null) {
            $request['faq'] = null;
        }

        Product::create([
            'language_id' => $category->language->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'image' => $imagePath,
            'banner' => $bannerPath,
            'status' => $status,
            'body' => $request->body,
            'catalog' => $catalogPath,
            'video' => $videoPath,
            'faq' => $request->faq,

        ]);

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $module = Product::latest()->get();
        $categories = Category::all();
        $edit_item = $product;

        return view('admin.product.index', compact('module', 'edit_item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
        ]);

        $category = Category::find($request->category);

        //upload image
        if (! is_null($request->file('image'))) {
            try {
                unlink(public_path($product->image));
            } catch (\Exception $e) {
            }

            $image = $request->file('image');
            $imagePath = $this->uploadImages($image, 'uploads/product');

        } else {
            $imagePath = $product->image;
        }

        if (! is_null($request->file('catalog'))) {
            try {
                unlink(public_path($product->catalog));
            } catch (\Exception $e) {
            }

            $catalog = $request->file('catalog');
            $catalogPath = $this->uploadImages($catalog, 'uploads/product/catalog');

        } else {
            $catalogPath = $product->catalog;
        }

        if (! is_null($request->file('banner'))) {
            try {
                unlink(public_path($product->banner));
            } catch (\Exception $e) {
            }

            $banner = $request->file('banner');
            $bannerPath = $this->uploadImages($banner, 'uploads/product/banner');

        } else {
            $bannerPath = $product->banner;
        }

        //video
        if ($request->delete_video) {

            try {
                unlink(public_path($product->video));
            } catch (\Exception $e) {
            }

            $videoPath = null;
        } else {
            if (! is_null($request->file('video'))) {
                try {
                    unlink(public_path($product->video));
                } catch (\Exception $e) {
                }
                $video = $request->file('video');
                $videoPath = $this->uploadImages($video, 'uploads/product/video');

            } else {
                $videoPath = $product->video;
            }
        }

        if ($request->status) {
            $status = $request->status;
        } else {
            $status = 0;
        }

        if ($request->faq[0]['question'] == null) {
            $request['faq'] = null;
        }

        $product->update([
            'language_id' => $category->language->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'image' => $imagePath,
            'banner' => $bannerPath,
            'status' => $status,
            'body' => $request->body,
            'catalog' => $catalogPath,
            'video' => $videoPath,
            'faq' => $request->faq,

        ]);

        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {

        //        foreach (Product::all() as $product){
        //            try {
        //                unlink(public_path($product->image));
        //            }catch (\Exception $e){}
        //            try {
        //                unlink(public_path($product->banner));
        //
        //            }catch (\Exception $e){}
        //            try {
        //                unlink(public_path($product->catalog));
        //
        //            }catch (\Exception $e){}
        //            try {
        //                unlink(public_path($product->video));
        //            }catch (\Exception $e){}
        //
        //
        //            foreach ($product->gallery as $gallery){
        //                try {
        //                    unlink(public_path($gallery->thumb));
        //                }catch (\Exception $e){}
        //                try {
        //                    unlink(public_path($gallery->image));
        //                }catch (\Exception $e){}
        //
        //                $gallery->delete();
        //
        //            }
        //
        //            foreach ($product->tableLists as $tableLists){
        //                $tableLists->delete();
        //            }
        //
        //            $product->delete();
        //        }
        //

        try {
            unlink(public_path($product->image));
        } catch (\Exception $e) {
        }
        try {
            unlink(public_path($product->banner));

        } catch (\Exception $e) {
        }
        try {
            unlink(public_path($product->catalog));

        } catch (\Exception $e) {
        }
        try {
            unlink(public_path($product->video));
        } catch (\Exception $e) {
        }

        foreach ($product->gallery as $gallery) {
            try {
                unlink(public_path($gallery->thumb));
            } catch (\Exception $e) {
            }
            try {
                unlink(public_path($gallery->image));
            } catch (\Exception $e) {
            }

            $gallery->delete();

        }

        foreach ($product->tableLists as $tableLists) {
            $tableLists->delete();
        }

        $product->delete();
        session()->flash('alert-success', ['با موفقیت انجام شد.']);

        return redirect()->back();
    }

    public function dtajax()
    {
        $module = Product::latest();

        return DataTables::of($module)
            ->addColumn('category', function ($module) {
                return $module->category
                    ? '<a href="'.route('admin.category.show', $module->category_id).'">'.$module->category->name.'</a>'
                    : '<span class="text-muted">بدون دسته</span>';
            })

            ->addColumn('status', function ($module) {
                if ($module->status == 1) {
                    return '<span class="text-success">فعال</span>';
                } else {
                    return '<span class="text-danger">غیر فعال</span>';
                }
            })
            ->addColumn('action', function ($module) {

                return '
                    <form class="form-horizontal deleteConfirm" method="POST"
                          action="'.route('admin.product.destroy', $module->id).'" role="form">

                        <a href="'.route('admin.product.edit', $module->id).'" class="">
                            <i class="fa fa-edit font-size-16 align-middle mr-1"></i>  </a>

                        <a href="'.route('admin.product.show', $module->id).'#gallery" class="">
                            <i class="fa fa-eye font-size-16 align-middle mr-1"></i>  </a>

                        '.method_field('DELETE').'
                        '.csrf_field().'
                        <button type="submit" class="btn btn-link btn-rounded waves-effect text-danger">
                            <i class="fa fa-trash font-size-16 align-middle mr-1"></i>
                        </button>
                    </form>

                ';

            })

            ->rawColumns(['category', 'status', 'action'])
            ->make(true);
    }
}
