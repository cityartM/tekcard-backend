<?php

namespace App\Http\Requests;

use App\Helpers\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        App::setLocale(Helper::checkApiLanguage());
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        if($this->isJson() || $this->is('multipart/form-data')){
            throw (new HttpResponseException(response([
                'success' => false,
                "code" => 422,
                'message' => Helper::translate(Helper::checkApiLanguage(),$validator->errors()->first()) ,
                'errors' => $validator->errors()->toArray(),
            ])->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY) ));
        }else{
            parent::failedValidation($validator);
        }

    }

}
