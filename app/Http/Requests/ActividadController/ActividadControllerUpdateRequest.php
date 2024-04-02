<?php

namespace App\Http\Requests\ActividadController;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class ActividadControllerUpdateRequest extends FormRequest
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
            'dia' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
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
        $actividadId = $this->route('actividad');
        $actividad = \App\Models\Actividad::findOrFail($actividadId);
        $validatedData = $this->validated();
        $actividad->update($validatedData);
        return response()->json([
            'success' => true,
            'data' => $actividad,
            'message' => 'Actividad actualizada correctamente.'
        ], 200);
    }
}
