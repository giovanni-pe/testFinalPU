<?php

namespace App\Http\Requests\EspecieController;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class EspecieControllerUpdateRequest extends FormRequest
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
            'descripcion' => 'nullable|string|max:255',
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
        $especieId = $this->route('especy');
        $especie = \App\Models\Especie::findOrFail($especieId);
        $validatedData = $this->validated();
        $especie->update($validatedData);
        return response()->json([
            'success' => true,
            'data' => $especie,
            'message' => 'Especie actualizada correctamente.'
        ], 200);
    }
}
