<?php

namespace App\Http\Requests\EspecieController;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class EspecieControllerDestroyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @author PlantUmlGen
     * @return array
     */
    public function rules(): array
    {
        return [
            '' => '',
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
        return $especie->delete()
            ? response()->json(['success' => true, 'message' => 'Especie eliminada correctamente.'], 200)
            : response()->json(['success' => false, 'message' => 'No se pudo eliminar la especie.'], 500);
    }
}
