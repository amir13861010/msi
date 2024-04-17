<?php

namespace App\Livewire\Admin;

use App\Models\Gift;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Gifts extends Component
{
    use WithFileUploads;
    use WithPagination;


    public $isModalOpen = false;
    public $productName = '';
    public $scoreNeed = '';
    public $productQuantity = '';
    public $productPicture;
    public $selectedRatingId;
    private $validator;
    public $categories;
    public $category_id;

    public function mount()
    {
        $this->categories = \App\Models\Category::all();
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->productName = '';
        $this->scoreNeed = '';
        $this->productQuantity = '';
        $this->category_id = '';
        $this->productPicture = null;
        $this->selectedRatingId = null;
    }

    public function updateRating()
    {
        $rules = [
            'name' => ['required'],
            'scoreNeed' => ['required', 'numeric'],
            'productQuantity' => ['required', 'numeric'],
            'category_id' => ['required',],

        ];

        // اگر تصویر جدید انتخاب شده است، قواعد اعتبارسنجی برای تصویر را اضافه کنید
        if ($this->productPicture) {
            $rules['productPicture'] = ['image'];
        }

        $this->validator = Validator::make([
            'name' => $this->productName,
            'scoreNeed' => $this->scoreNeed,
            'productQuantity' => $this->productQuantity,
            'productPicture' => $this->productPicture,
            "category_id"=>$this->category_id
        ], $rules, [
            'name.required' => 'نام محصول وارد نشده است',
            'scoreNeed.required' => 'امتیاز مورد نیاز وارد نشده است',
            'scoreNeed.numeric' => ' امتیاز مورد نیاز باید یک عدد باشد',
            'productQuantity.required' => 'موجودی محصول وارد نشده است',
            'productQuantity.numeric' => 'موجودی محصول باید یک عدد باشد',
            'productPicture.image' => 'فایل محصول باید یک تصویر باشد',
            'category_id.required' => 'دسته بندی محصول انتخاب نشده است',

        ]);

        if ($this->validator->fails()) {
            $errorMessages = $this->validator->errors()->all();
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: $errorMessages);
            return;
        } else {


            // اگر $ratingAvatar تهی نیست، آن را ذخیره کنید
            if ($this->productPicture) {
                $avatarPath = $this->productPicture->store('products', 'public');

                $rating = \App\Models\Gift::findOrFail($this->selectedRatingId);

                $rating->update([
                    'name' => $this->productName,
                    'score' => $this->scoreNeed,
                    'category_id' => $this->category_id,

                    'quantity' => $this->productQuantity,
                    'image' => $avatarPath,
                ]);
            } else {
                $rating = \App\Models\Gift::findOrFail($this->selectedRatingId);

                $rating->update([
                    'name' => $this->productName,
                    'score' => $this->scoreNeed,
                    'quantity' => $this->productQuantity,
                    'category_id' => $this->category_id,

                ]);
            }


            $this->dispatch('swal:modal', title: "موفق", type: "success", text: "هدیه با موفقیت به‌روزرسانی شد");

            $this->closeModal();

        }
    }

    public function openModal()
    {
        $this->isModalOpen = true;
        if ($this->selectedRatingId) {
            $rating = \App\Models\Gift::findOrFail($this->selectedRatingId);
            $this->productName = $rating->name;
            $this->scoreNeed = $rating->score;
            $this->productQuantity = $rating->quantity;
            $this->category_id = $rating->category_id; // Set the category_id to preselect the category

        }
    }

    public function addRating()
    {

        $this->validator = Validator::make([
            'name' => $this->productName,
            'scoreNeed' => $this->scoreNeed,
            'productQuantity' => $this->productQuantity,
            'productPicture' => $this->productPicture,
            'category_id' => $this->category_id,
        ], [
            'name' => ['required'],
            'scoreNeed' => ['required', 'numeric'],
            'productQuantity' => ['required', 'numeric'],
            'productPicture' => ['required', 'image'],
            'category_id' => ['required',],
        ], [
            'name.required' => 'نام محصول وارد نشده است',
            'scoreNeed.required' => 'امتیاز مورد نیاز وارد نشده است',
            'scoreNeed.numeric' => ' امتیاز مورد نیاز باید یک عدد باشد',
            'productQuantity.required' => 'موجودی محصول وارد نشده است',
            'productQuantity.numeric' => 'موجودی محصول باید یک عدد باشد',
            'productPicture.image' => 'فایل محصول باید یک تصویر باشد',
            'productPicture.required' => 'فایل محصول انتخاب نشده است',
            'category_id.required' => 'دسته بندی محصول انتخاب نشده است',
        ]);
        if ($this->validator->fails()) {
            $errorMessages = $this->validator->errors()->all();
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: $errorMessages);
            return;
        } else {
            $avatarPath = $this->productPicture->store('products', 'public');
            \App\Models\Gift::create([
                'name' => $this->productName,
                'score' => $this->scoreNeed,
                'quantity' => $this->productQuantity,
                'image' => $avatarPath,
                'category_id' => $this->category_id,
            ]);

            $this->dispatch('swal:modal', title: "موفق", type: "success", text: "هدیه با موفقیت افوزده شد");

            // Clear the form fields after submission
            $this->name = '';
            $this->scoreNeed = '';
            $this->productQuantity = '';
            $this->productPicture = '';
            $this->category_id = '';

            // Close the modal after submission
            $this->closeModal();
        }
    }

    public function editRating($ratingId)
    {
        $this->selectedRatingId = $ratingId;
        $this->openModal();
    }

    public
    function deleteRating($id)
    {
        $rating = \App\Models\Gift::findOrFail($id);

        // Delete the associated file
        if (Storage::disk('public')->exists($rating->image)) {
            Storage::disk('public')->delete($rating->image);
        }

        // Delete the rating
        $rating->delete();
        $this->dispatch('swal:modal', title: "موفق", type: "success", text: "هدیه با موفقیت حذف شد");
return;
        // Refresh the ratings data
    }
    public function render()
    {
        return view('livewire.admin.gifts',[

            'ratings' => Gift::paginate(10),

        ]);
    }
}
