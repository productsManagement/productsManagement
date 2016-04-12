<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\BaseModels\UserListExport;

class ExampleController extends Controller
{
     public function exportUserList(UserListExport $export)
    {
        // work on the export
        return $export->sheet('sheetName', function($sheet)
        {

        })->export('xls');
    }

    public function export(){
    	Excel::create('ExcelExport', function ($excel) {

    $excel->sheet('Sheetname', function ($sheet) {

        // first row styling and writing content
        $sheet->mergeCells('A1:W1');
        $sheet->row(1, function ($row) {
            $row->setFontFamily('Comic Sans MS');
            $row->setFontSize(30);
        });

        $sheet->row(1, array('Some big header here'));

        // second row styling and writing content
        $sheet->row(2, function ($row) {

            // call cell manipulation methods
            $row->setFontFamily('Comic Sans MS');
            $row->setFontSize(15);
            $row->setFontWeight('bold');

        });

        $sheet->row(2, array('Something else here'));

        // getting data to display - in my case only one record
        $users = User::get()->toArray();

        // setting column names for data - you can of course set it manually
        $sheet->appendRow(array_keys($users[0])); // column names

        // getting last row number (the one we already filled and setting it to bold
        $sheet->row($sheet->getHighestRow(), function ($row) {
            $row->setFontWeight('bold');
        });

        // putting users data as next rows
        foreach ($users as $user) {
            $sheet->appendRow($user);
        }
    });

})->export('xls');
    }
}
