<?php

namespace App\Models\BaseModels;

use Illuminate\Database\Eloquent\Model;

class UserListExport extends \Maatwebsite\Excel\Files\NewExcelFile {

    public function getFilename()
    {
        return 'hihi';
    }
}