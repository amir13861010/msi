<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;


class Rating extends Component
{
    use WithFileUploads;


    public $isModalOpen = false;
    public $ratingName = '';
    public $ratingFrom = '';
    public $ratingTo = '';
    public $ratingAvatar;
    public $selectedRatingId;
    private $validator;
    public $ratings;


    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->ratingName = '';
        $this->ratingFrom = '';
        $this->ratingTo = '';
        $this->ratingAvatar = null;
        $this->selectedRatingId = null;
    }

    public function updateRating()
    {
        $rules = [
            'name' => ['required'],
            'from' => ['required', 'numeric'],
            'to' => ['required', 'numeric'],
        ];

        // اگر تصویر جدید انتخاب شده است، قواعد اعتبارسنجی برای تصویر را اضافه کنید
        if ($this->ratingAvatar) {
            $rules['avatar'] = ['image', 'dimensions:width=36,height=36'];
        }

        $this->validator = Validator::make([
            'name' => $this->ratingName,
            'from' => $this->ratingFrom,
            'to' => $this->ratingTo,
            'avatar' => $this->ratingAvatar,
        ], $rules, [
            'name.required' => 'نام سطح وارد نشده است',
            'from.required' => 'شروع امتیاز وارد نشده است',
            'from.numeric' => 'شروع امتیاز باید یک عدد باشد',
            'to.required' => 'پایان امتیاز وارد نشده است',
            'to.numeric' => 'پایان امتیاز باید یک عدد باشد',
            'avatar.image' => 'فایل آواتار باید یک تصویر باشد',
            'avatar.dimensions' => 'ابعاد تصویر باید 36x36 پیکسل باشد',
        ]);

        if ($this->validator->fails()) {
            $errorMessages = $this->validator->errors()->all();
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: $errorMessages);
            return;
        } else {


            // اگر $ratingAvatar تهی نیست، آن را ذخیره کنید
            if ($this->ratingAvatar) {
                $avatarPath = $this->ratingAvatar->store('avatars', 'public');

                $rating = \App\Models\Rating::findOrFail($this->selectedRatingId);

                $rating->update([
                    'name' => $this->ratingName,
                    'from' => $this->ratingFrom,
                    'to' => $this->ratingTo,
                    'avatar' => $avatarPath,
                ]);
            } else {
                $rating = \App\Models\Rating::findOrFail($this->selectedRatingId);

                $rating->update([
                    'name' => $this->ratingName,
                    'from' => $this->ratingFrom,
                    'to' => $this->ratingTo,
                ]);
            }

            $this->dispatch('swal:modal', title: "موفق", type: "success", text: "سطح با موفقیت به‌روزرسانی شد");

            $this->closeModal();

        }
    }

    public function openModal()
    {
        $this->isModalOpen = true;
        if ($this->selectedRatingId) {
            $rating = \App\Models\Rating::findOrFail($this->selectedRatingId);
            $this->ratingName = $rating->name;
            $this->ratingFrom = $rating->from;
            $this->ratingTo = $rating->to;
        }
    }

    public function addRating()
    {

        $this->validator = Validator::make([
            'name' => $this->ratingName,
            'from' => $this->ratingFrom,
            'to' => $this->ratingTo,
            'avatar' => $this->ratingAvatar,
        ], [
            'name' => ['required'],
            'from' => ['required'],
            'to' => ['required'],
            'avatar' => ['required', 'image'],
        ], [
            "name.required" => "نام سطح وارد نشده است",
            "from.required" => "شروع بازه امتیاز وارد نشده است",
            "to.required" => "پایان بازه امتیاز وارد نشده است",
            "avatar.required" => "آواتار وارد نشده است",
            "avatar.images" => "آواتار وارد شده باید تصویر باشد",
        ]);
        if ($this->validator->fails()) {
            $errorMessages = $this->validator->errors()->all();
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: $errorMessages);
            return;
        } else {
            $avatarPath = $this->ratingAvatar->store('avatars', 'public'); // Store the uploaded file in 'public/avatars' directory
            \App\Models\Rating::create([
                'name' => $this->ratingName,
                'from' => $this->ratingFrom,
                'to' => $this->ratingTo,
                'avatar' => $avatarPath,
            ]);
            $this->dispatch('swal:modal', title: "موفق", type: "success", text: "سطح با موفقیت افوزده شد");

            // Clear the form fields after submission
            $this->name = '';
            $this->from = '';
            $this->to = '';
            $this->avatar = '';

            // Close the modal after submission
            $this->closeModal();
        }
    }

    public
    function editRating($ratingId)
    {
        $this->selectedRatingId = $ratingId;
        $this->openModal();
    }

    public
    function deleteRating($id)
    {
        $rating = \App\Models\Rating::findOrFail($id);

        // Delete the associated file
        if (Storage::disk('public')->exists($rating->avatar)) {
            Storage::disk('public')->delete($rating->avatar);
        }

        // Delete the rating
        $rating->delete();
        $this->dispatch('swal:modal', title: "موفق", type: "success", text: "سطح با موفقیت حذف شد");

        // Refresh the ratings data
        $this->ratings = \App\Models\Rating::all();
    }

    public function render()
    {
        return view('livewire.admin.rating', $this->ratings = \App\Models\Rating::all());
    }
}
