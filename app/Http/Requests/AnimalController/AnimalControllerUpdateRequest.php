<?php

namespace App\Http\Requests\AnimalController;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class AnimalControllerUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @author PlantUmlGen
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'especie_id' => 'required|integer|exists:especies,id',
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
        $animalId = $this->route('animal');
        $animal = \App\Models\Animal::findOrFail($animalId);
        $validatedData = $this->validated();
        $animal->update($validatedData);
        return response()->json([
            'success' => true,
            'data' => $animal,
            'message' => 'Animal actualizado correctamente.'
        ], 200);
    }
}
