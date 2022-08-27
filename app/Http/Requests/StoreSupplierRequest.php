<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'brands'              => ['array', 'nullable'],
            'brands.*'            => ['exists:brands,id'],
        ];
    }

    public function author(): User
    {
        return $this->user();
    }

    public function title(): string
    {
        return $this->get('title');
    }

    public function email(): string
    {
        return $this->get('email');
    }

    public function phone(): string
    {
        return $this->get('phone');
    }

    public function address(): string
    {
        return $this->get('address');
    }

    public function brands(): array
    {
        return $this->get('brands', []);
    }
}