<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Category extends Component
{
    public $isModalOpen = false;
    public $categoryName = '';
    private $validator;
    public $categories;
    public $selectedCategoryId;

    public function openModal()
    {
        $this->isModalOpen = true;
        // اگر selectedCategoryId داریم، یعنی دسته بندی برای ویرایش انتخاب شده است
        // در این صورت، نام دسته بندی مورد نظر را در $categoryName قرار داده و فرم را برای ویرایش نمایش می‌دهیم
        if ($this->selectedCategoryId) {
            $this->categoryName = \App\Models\Category::findOrFail($this->selectedCategoryId)->name;
        }
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function mount()
    {
        $this->categories = \App\Models\Category::all();
    }

    public function addCategory()
    {
        $this->validator = Validator::make([
            'name' => $this->categoryName,
        ], [
            'name' => ['required'],
        ], [
            "name.required" => "نام دسته بندی وارد نشده است",
        ]);

        if ($this->validator->fails()) {
            $errorMessages = $this->validator->errors()->all();
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: $errorMessages);
            return;
        } else {
            $category = new \App\Models\Category();
            $category->name = $this->categoryName;
            $category->save();
            $this->dispatch('swal:modal', title: "موفق", type: "success", text: "دسته بندی با موفقیت ثبت شد");
            $this->closeModal();
        }
    }
    public function saveCategory()
    {
        if ($this->selectedCategoryId) {
            $this->updateCategory();
        } else {
            $this->addCategory();
        }
    }
    public function editCategory($categoryId)
    {
        $this->selectedCategoryId = $categoryId;
        $this->categoryName = \App\Models\Category::findOrFail($categoryId)->name;
        $this->openModal();
    }


    public function updateCategory()
    {
        // اینجا می‌توانید کد به‌روزرسانی دسته بندی را اضافه کنید
        $this->validator = Validator::make([
            'name' => $this->categoryName,
        ], [
            'name' => ['required'],
        ], [
            "name.required" => "نام دسته بندی وارد نشده است",
        ]);

        if ($this->validator->fails()) {
            $errorMessages = $this->validator->errors()->all();
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: $errorMessages);
            return;
        } else {
            $category = \App\Models\Category::findOrFail($this->selectedCategoryId);
            $category->update([
                "name"=>$this->categoryName
            ]);

            $this->dispatch('swal:modal', title: "موفق", type: "success", text: "دسته بندی با موفقیت به‌روزرسانی شد");
            $this->categoryName = null;
             $this->selectedCategoryId = null;
            $this->closeModal();
        }
    }

    public function deleteCategory($categoryId)
    {
        // اینجا می‌توانید کد حذف دسته بندی را اضافه کنید
        \App\Models\Category::findOrFail($categoryId)->delete();
        $this->dispatch('swal:modal', title: "موفق", type: "success", text: "دسته بندی با موفقیت حذف شد");
    }
    public function render()
    {
        return view('livewire.admin.category', $this->categories = \App\Models\Category::all());
    }
}
