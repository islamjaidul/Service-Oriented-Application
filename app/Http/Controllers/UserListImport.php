<?php
class UserListImport extends \Maatwebsite\Excel\Files\ExcelFile {

    public function getFile()
    {
        return storage_path('csv') . '/file.csv';
    }

    public function getFilters()
    {
        return [
            'chunk'
        ];
    }

}
