<?php


namespace App\Traits;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait RequestTrait
{

    public function savePhoto(FormRequest $request): string
    {
        $image_64 = $request->input('photo');
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = 'images/' . Str::random(10) . '.' . $extension;
        Storage::disk('public')->put($imageName, base64_decode($image));
        return $imageName;
    }

    public function response($data, $code = 200): JsonResponse
    {
        return response()->json(['data'=>$data], $code);
    }
}
