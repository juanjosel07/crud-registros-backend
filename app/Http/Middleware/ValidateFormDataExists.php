<?php

namespace App\Http\Middleware;

use App\Models\FormData;
use Closure;
use Illuminate\Http\Request;

class ValidateFormDataExists
{
    /**
     * Handle an incoming request.
     *

     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $formDataId = $request->route('formData');
		$formData = FormData::find($formDataId);
		if(!$formData){
			return response()->json(
				[
					'success' => false,
					'message' => 'Registro no encontrado',
					]
					,404);
				}
		$request->attributes->add(['formData' => $formData]);

        return $next($request);
    }
}
