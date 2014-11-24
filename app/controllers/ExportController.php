<?php
    
class ExportController extends BaseController {
    
    public function record_export($id) {
        Excel::create($Facility, function($excel) {
            
        })->export('csv');
    }
    /**
    * Need to test if this works to export all Records table
    **/
    /*
    public function get_export() {
        $table = Records:all();
        $file = fopen('file.csv', 'w');
        foreach($table as $row) {
            fputcsv($file, $row->to_array());
        }
        fclose($file);
        return Redirect::to('consolidated');
    }
    */
    
    /**
    * Export Users Table
    **/
    public function user_export($id) {
        Excel::create($User, function($excel) {
        })->export('csv');
    }
    
    public function user_export_xls($id) {
        Excel::create($User, function($excel) {
        })->export('xls');
    }
    
    /**
    * Export Facility table
    **/
    public function facility_export($id) {
        Excel::create($Facility, function($excel) {
        
        })->export('csv');
    }
    
    public function facility_export_xls($id) {
        Excel::create($Facility, function($excel) {
        
        })->export('xls');
    }
    
    /**
    * Export Record Table
    **/
    public function record_export($id) {
        Excel::create($Record, function($excel) {
            
        })->export('csv');
    }

    public function record_export_xls($id) {
        Excel::create($Record, function($excel) {
            
        })->export('xls');
    }
    
}