<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait FileUploadTrait
{
    /**
     * File upload trait used in controllers to upload files
     */
    public function saveFiles(Request $request)
    {
        if (! file_exists(public_path('uploads'))) {
            mkdir(public_path('uploads'), 0777);
            mkdir(public_path('uploads/thumb'), 0777);
        }
        $finalRequest = $request;
        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                if ($request->has($key . '_max_width') && $request->has($key . '_max_height')) {
                        // Check file width
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $file     = $request->file($key);
                    $image    = Image::make($file);
                    if (! file_exists(public_path('uploads/thumb'))) {
                        mkdir(public_path('uploads/thumb'), 0777, true);
                    }
                    Image::make($file)->resize(50, 50)->save(public_path('uploads/thumb') . '/' . $filename);
                    $width  = $image->width();
                    $height = $image->height();
                    if ($width > $request->{$key . '_max_width'} && $height > $request->{$key . '_max_height'}) {
                        $image->resize($request->{$key . '_max_width'}, $request->{$key . '_max_height'});
                    } elseif ($width > $request->{$key . '_max_width'}) {
                        $image->resize($request->{$key . '_max_width'}, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    } elseif ($height > $request->{$key . '_max_width'}) {
                        $image->resize(null, $request->{$key . '_max_height'}, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }
                    $image->save(public_path('uploads') . '/' . $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                } else {
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $request->file($key)->move(public_path('uploads'), $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                }
            }
        }
        return $finalRequest;
    }

    /**
     * Guarda Archivo en la carpeta enviada
     *
     * @param [type] $request
     * @param [type] $name
     * @param [type] $folder
     * @return void
     */
    public function upfileWithName($baseFileName, $folder, $files, $nameField, $prefix)
    {
        $filename = null;
        if (!is_null($files) && !empty($files)) {

            $filename = $_FILES[$nameField]['name'];
            $tmpName = $_FILES[$nameField]['tmp_name'];
            $extension = $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $nameFile = "{$baseFileName}_{$prefix}.{$extension}";
            $mover_foto = move_uploaded_file($tmpName, storage_path("$folder/$nameFile"));

            if($mover_foto)
            {
                return "/storage/$folder/$nameFile";
            }
        }

        return null;
    }

    public function uploadFile($request, $name, $folder)
    {
        $filename = null;
        if($request->hasFile($name)){
            $filename = $request->file($name)->store($folder);
        }
        return $filename;
    }

    public function uploadFiles($request, $name, $folder) {
        $name_files = array();
        if(is_array($request->$name)){

            if($request->hasFile($name)){

                foreach ($request->$name as $file) {
                    $name_file = $file->store($folder);
                    array_push($name_files, $name_file);
                }
            }
        }
        return json_encode($name_files);
    }
}
