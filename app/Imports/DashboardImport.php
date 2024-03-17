<?php

namespace App\Imports;

use App\Models\Dashboard;
use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Support\Facades\Crypt;

class DashboardImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }
    public function model(array $row)
    {
        return new Dashboard([
            'user_id'     => $this->userId,
            'websiteUrl'  => $row[0], // Accessing first column
            'yourEmail'   => $row[1], // Accessing second column
            'yourPassword' => Crypt::encryptString($row[2]), // Accessing third column
        ]);
    }

    public function map($row): array
    {
        // You can also apply transformations here if needed
        return [
            $row[0], // Website URL
            $row[1], // Email
            $row[2], // Password
        ];
    }

    public function startRow(): int
    {
        return 2; // Start reading the data from the second row if the first row is data and not headers
    }
}
