<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{
    use WithFileUploads;
    use WithPagination;



    public $isModalOpen = false;
    public $excelFile;
    public function openModal()
    {
        $this->isModalOpen = true;
    }
    public function uploadExcel()
    {
        // Validate the uploaded file

        $this->validator = Validator::make([
            'excelFile' => $this->excelFile,
        ], [
            'excelFile' => ['required',"mimes:xlsx,xls"],
        ], [
            "excelFile.required" => "فایل محصولات اپلود نشده است",
            "excelFile.mimes" => "فرمت فایل باید xlsx یا xls باشد",
        ]);

        if ($this->validator->fails()) {
            $errorMessages = $this->validator->errors()->all();
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: $errorMessages);
            return;
        }else {
            // Process the Excel file
            $path = $this->excelFile->store('temp'); // Store the uploaded file temporarily

            // Read data from Excel file
            $data = \Excel::toCollection([], $path)->first()->toArray();

            // Get column names
            $columns = $data[0];

            // Remove the first row (column names)
            unset($data[0]);

            // Insert data into the products table
            foreach ($data as $row) {
                $productData = [];
                foreach ($columns as $index => $columnName) {
                    $productData[$columnName] = $row[$index];
                }
                Product::create($productData);
            }

            // Delete the temporary file
            Storage::delete($path);

            // Show success message
            $this->dispatch('swal:modal', title: "موفق", type: "success", text: "فایل اکسل با موفقیت آپلود شد و اطلاعات آن به جدول محصولات افزوده شد");


            // Close the modal after successful upload
            $this->reset('excelFile');
            $this->closeModal();
        }
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->excelFile = null;
    }
    public function render()
    {
        return view('livewire.admin.products',[

                'products' => Product::paginate(10),

        ]);
    }
}
