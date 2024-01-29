<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Services\PersonnelProductService;
use App\Models\Personnel;

use Validator;
use App\Http\Resources\Personnel as PersonnelResource;

class PersonnelController extends BaseController
{
    /**
     * Get Product Personnel in charge of.
     *
     * @return \Illuminate\Http\Response
     */
    protected $personnelProductService;

    public function __construct(PersonnelProductService $personnelProductService)
    {
        $this->personnelProductService = $personnelProductService;
    }

    public function getProduct($personnelId)
    {
        $personnel = Personnel::findOrFail($personnelId);
        $product = $this->personnelProductService->getProduct($personnel);

        return response()->json($product);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnel = Personnel::all();

        return $this->sendResponse(PersonnelResource::collection($personnel), 'Personnel retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'product_id' => 'required|integer'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $personnel = Personnel::create($input);

        return $this->sendResponse(new PersonnelResource($personnel), 'Personnel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personnel = Personnel::find($id);

        if (is_null($personnel)) {
            return $this->sendError('Personnel not found.');
        }

        return $this->sendResponse(new PersonnelResource($personnel), 'Personnel retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnel $personnel)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'product_id' => 'required|integer'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $personnel->update($request->all());

        return $this->sendResponse(new PersonnelResource($personnel), 'Personnel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personnel $personnel)
    {
        $personnel->delete();

        return $this->sendResponse([], 'Personnel deleted successfully.');
    }
}
