<?php
/**
 * Created by PhpStorm.
 * User: Saeed
 * Date: 8/7/2018
 * Time: 3:01 PM
 */

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

trait ImageUploadTrait
{
    public function uploadImages($file, $dirPath)
    {
        $dPath = $dirPath;
        $imagePath = $dPath.'/';

        File::exists(public_path($imagePath)) or File::makeDirectory(public_path($imagePath), 0777, true);

        $fileName1 = rand(0, 999).'-'.time().'.'.$file->getClientOriginalExtension();

        $file->move($dirPath, $fileName1);
        $public_path = $imagePath.$fileName1;

        return $public_path;
    }

    public function uploadImageThumb($file, $dirPath, $width, $height)
    {
        $dPath = $dirPath;
        $imagePath = $dPath.'/';

        File::exists(public_path($imagePath)) or File::makeDirectory(public_path($imagePath), 0777, true);

        $fileName1 = rand(0, 999).'-'.time().'.jpg';

        $resize_filePath = public_path($imagePath.$fileName1);

        $this->resizeImage($file, $dPath, $resize_filePath, $width, $height);
        $public_path = $imagePath.$fileName1;

        return $public_path;
    }

    protected static function resizeImage($file, $resize_dirPath, $resize_filePath, $width = null, $height = null)
    {
        //        dd($file);
        File::exists(public_path($resize_dirPath)) or File::makeDirectory(public_path($resize_dirPath), 0777, true);
        // open an image file
        $img = Image::make($file);

        // now you are able to resize the instance
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });

        //save image to resize_filePath
        $img->save($resize_filePath, 100);

    }

    public function upload_file_form($request, $input_name, $dirPath, $model = null, $delete = null)
    {
        if ($delete == null) {
            if (! is_null($request->file($input_name))) {
                if ($model != null) {
                    try {
                        unlink(public_path($model[$input_name]));
                    } catch (\Exception $e) {
                    }
                }

                $input = $request->file($input_name);
                $Path = $this->uploadImages($input, $dirPath, $request);
            } else {
                if ($model != null) {
                    $Path = $model[$input_name];
                } else {
                    $Path = null;
                }

            }

        } else {
            $Path = null;
        }

        return $Path;
    }
}
