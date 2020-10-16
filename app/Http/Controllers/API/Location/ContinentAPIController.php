<?php

namespace App\Http\Controllers\API\Location;

use App\Http\Requests\API\Location\CreateContinentAPIRequest;
use App\Http\Requests\API\Location\UpdateContinentAPIRequest;
use App\Models\Location\Continent;
use App\Repositories\Location\ContinentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContinentController
 * @package App\Http\Controllers\API\Location
 */

class ContinentAPIController extends AppBaseController
{
    /** @var  ContinentRepository */
    private $continentRepository;

    public function __construct(ContinentRepository $continentRepo)
    {
        $this->continentRepository = $continentRepo;
    }

    /**
     * Display a listing of the Continent.
     * GET|HEAD /continents
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $continents = $this->continentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $continents->toArray(),
            __('messages.retrieved', ['model' => __('models/continents.plural')])
        );
    }

    /**
     * Store a newly created Continent in storage.
     * POST /continents
     *
     * @param CreateContinentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateContinentAPIRequest $request)
    {
        $input = $request->all();

        $continent = $this->continentRepository->create($input);

        return $this->sendResponse(
            $continent->toArray(),
            __('messages.saved', ['model' => __('models/continents.singular')])
        );
    }

    /**
     * Display the specified Continent.
     * GET|HEAD /continents/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Continent $continent */
        $continent = $this->continentRepository->find($id);

        if (empty($continent)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/continents.singular')])
            );
        }

        return $this->sendResponse(
            $continent->toArray(),
            __('messages.retrieved', ['model' => __('models/continents.singular')])
        );
    }

    /**
     * Update the specified Continent in storage.
     * PUT/PATCH /continents/{id}
     *
     * @param int $id
     * @param UpdateContinentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContinentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Continent $continent */
        $continent = $this->continentRepository->find($id);

        if (empty($continent)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/continents.singular')])
            );
        }

        $continent = $this->continentRepository->update($input, $id);

        return $this->sendResponse(
            $continent->toArray(),
            __('messages.updated', ['model' => __('models/continents.singular')])
        );
    }

    /**
     * Remove the specified Continent from storage.
     * DELETE /continents/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Continent $continent */
        $continent = $this->continentRepository->find($id);

        if (empty($continent)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/continents.singular')])
            );
        }

        $continent->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/continents.singular')])
        );
    }
}
