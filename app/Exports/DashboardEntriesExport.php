<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Dashboard; // Add this line
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use ZipArchive;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Add this line
use Exception;
use Illuminate\Support\Facades\Auth;

class DashboardEntriesExport
{
    private $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function export()
    {
        // Step 1: Create the Excel File
        $spreadsheet = new Spreadsheet();

        // Step 2: Populate the Spreadsheet with Data
        $this->populateSpreadsheet($spreadsheet);

        // Step 3: Save the Excel File
        $tempExcelPath = Storage::path('public/temp_excel.xlsx');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($tempExcelPath);

        // Step 4: Create the Zip Archive and Encrypt
        $zip = new ZipArchive();
        $tempZipPath = Storage::path('public/temp_excel.zip');

        if ($zip->open($tempZipPath, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($tempExcelPath, Auth::user()->name . '.xlsx');

            // Check if encryption is supported
            if (method_exists($zip, 'setPassword')) {
                // Log the decrypted password for debugging purposes

                $zip->setPassword($this->password);

                if (method_exists($zip, 'setEncryptionIndex')) {
                    // Encrypt the file within the archive if the method is available
                    $zip->setEncryptionIndex(0, ZipArchive::EM_AES_256); // Assuming the file is at index 0
                }
                $zip->close();

                // Delete the temporary Excel file as it's no longer needed
                unlink($tempExcelPath);
            } else {
                $zip->close(); // Close the zip file if setting a password isn't supported
                unlink($tempZipPath); // Delete the unfinished zip file
                throw new Exception('Encryption not supported on this server.');
            }
        } else {
            throw new Exception('Cannot open zip file for writing.');
        }

        // Step 5: Output the Zip File to the User
        if (file_exists($tempZipPath)) {
            // Ensure ob_clean is called to clean the output buffer to prevent file corruption
            if (ob_get_level()) ob_end_clean();
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename=' . Auth::user()->name . ".zip");
            header('Content-Length: ' . filesize($tempZipPath));
            readfile($tempZipPath);

            // Delete the temporary Zip file after sending it to the user
            unlink($tempZipPath);
            exit;
        } else {
            throw new Exception('Zip file does not exist.');
        }
    }

    private function populateSpreadsheet(Spreadsheet $spreadsheet)
    {
        // Fetch data from the Dashboard model
        $dashboards = Dashboard::all();

        // Example: Populate the first worksheet with data
        $worksheet = $spreadsheet->getActiveSheet();
        $row = 1;
        foreach ($dashboards as $dashboard) {
            $worksheet->setCellValue('A' . $row, $dashboard->websiteUrl);
            $worksheet->setCellValue('B' . $row, $dashboard->yourEmail);

            // Decrypt the password before setting it
            $decryptedPassword = Crypt::decryptString($dashboard->yourPassword);
            $worksheet->setCellValue('C' . $row, $decryptedPassword);

            // Increment row for the next entry
            $row++;
        }
    }
}
