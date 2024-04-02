<?php

namespace App\Http\Requests\AnimalController;

use App\Services\AnimalService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class AnimalControllerIndexRequest extends FormRequest
{
    protected $animalService;
    public function __construct(AnimalService $animalService)
    {
        $this->animalService = $animalService;
    }
    /**
     * Get the validation rules that apply to the request.
     * @author PlantUmlGen
     * @return array
     */
    public function rules(): array
    {
        return [
            // '' => '',
        ];
    }

    /**
     * messages
     * @author PlantUmlGen
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'The :attribute is required.',
            'max' => 'The :attribute is very long.',
            'unique' => 'The :attribute has already been taken.',
            'exists' => 'Could not find :attribute',
        ];
    }

    /**
     * response
     * @author PlantUmlGen
     * @return JsonResponse
     */
    public function response(): JsonResponse
    {
        $params = $this->input();
        $size = isset($params['size']) ? $params['size'] : 1;
        $animales = $this->animalService->obtenerAnimalesConCuidadores($size);
        return response()->json([
            'success' => true,
            'data' => $animales
        ]);
    }
}
