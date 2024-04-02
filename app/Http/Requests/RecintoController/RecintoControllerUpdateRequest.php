<?php

namespace App\Http\Requests\RecintoController;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class RecintoControllerUpdateRequest extends FormRequest
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
            'descripcion' => 'nullable|string',
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
        $recintoId = $this->route('recinto');
        $recinto = \App\Models\Recinto::findOrFail($recintoId);

        $validatedData = $this->validated();
        $recinto->update($validatedData);

        return response()->json([
            'success' => true,
            'data' => $recinto,
            'message' => 'Recinto actualizado correctamente.'
        ], 200);
    }
}