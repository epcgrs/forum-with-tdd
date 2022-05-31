<?php

namespace App\Http\Controllers;

use Emmanuelpcg\Basics\ImageManipulation\ImageManipulation;
use Illuminate\Http\Request;
use Exception;

class UploadsController extends Controller
{
    use ImageManipulation;

    public function upload(Request $request)
    {
        try {
            return $this->resizeAndSaveImage(
                'avatar',
                'avatars', 300,
                300,
                'user-upload',
                'png'
            );
        } catch (Exception $exception) {
            return abort(400, $exception->getMessage());
        }
    }
}
