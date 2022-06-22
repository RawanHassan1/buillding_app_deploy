<?php

namespace App\Imports;


use App\Issue;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Http\Controllers\Excel;
use Auth;

class IssuesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Issue([
           'name'     => $row[0],
           'email'    => $row[1], 
           'phone'    => $row[2],
           'msg'      => $row[3],
           //'attachment'         => $row[4], 
           'building_number'    => $row[4],
           'apartment_number'   => $row[5],
           'user_id'            => Auth::user()->id,
        ]);

    }
}
