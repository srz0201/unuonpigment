<?php
/**
 * Created by PhpStorm.
 * User: Saeed
 * Date: 8/8/2018
 * Time: 11:12 AM
 */

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait FileUploadTrait
{
    public function uploadFile($file, $path, $category)
    {
        $filePath = $path.'/'.$category;
        $dPath = storage_path($filePath);

        File::exists($dPath) or File::makeDirectory($dPath, 0777, true);

        $fileName = rand(0, 999).'-'.time().'.'.$file->getClientOriginalExtension();

        $file->move($dPath, $fileName);
        $public_path = $filePath.'/'.$fileName;

        return $public_path;
    }

    public function uploadDemo($file, $path, $category)
    {
        $filePath = $path.'/'.$category;
        $dPath = public_path($filePath);

        File::exists($dPath) or File::makeDirectory($dPath, 0777, true);

        $fileName = 'demo-'.rand(0, 999).'-'.time().'.'.$file->getClientOriginalExtension();

        $file->move($dPath, $fileName);
        $public_path = $filePath.'/'.$fileName;

        return $public_path;
    }
}
