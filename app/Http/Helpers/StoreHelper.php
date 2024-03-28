<?php

namespace App\Http\Helpers;

class StoreHelper
{
    public static function storeFile($file, $type)
    {
        if ($type == 'music') {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/store/music'), $fileName);

            return 'store/music/' . $fileName;
        } elseif ($type == 'thumbnail') {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/store/thumbnail'), $fileName);

            return 'store/thumbnail/' . $fileName;
        } else {
            return null;
        }
    }
}
