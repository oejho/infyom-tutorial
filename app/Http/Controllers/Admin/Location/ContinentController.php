<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Requests\Admin\Location\CreateContinentRequest;
use App\Http\Requests\Admin\Location\UpdateContinentRequest;
use App\Repositories\Location\ContinentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContinentController extends AppBaseController
{
    /** @var  ContinentRepository */
    private $continentRepository;

    public function __construct(ContinentRepository $continentRepo)
    {
        $this->continentRepository = $continentRepo;
    }

    /**
     * Display a listing of the Continent.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $continents = $this->continentRepository->all();

        return view('admin.location.continents.index')
            ->with('continents', $continents);
    }

    /**
     * Show the form for creating a new Continent.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.location.continents.create');
    }

    /**
     * Store a newly created Continent in storage.
     *
     * @param CreateContinentRequest $request
     *
     * @return Response
     */
    public function store(CreateContinentRequest $request)
    {
        $input = $request->all();

        $continent = $this->continentRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/continents.singular')]));

        return redirect(route('admin.location.continents.index'));
    }

    /**
     * Display the specified Continent.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $continent = $this->continentRepository->find($id);

        if (empty($continent)) {
            Flash::error(__('messages.not_found', ['model' => __('models/continents.singular')]));

            return redirect(route('admin.location.continents.index'));
        }

        return view('admin.location.continents.show')->with('continent', $continent);
    }

    /**
     * Show the form for editing the specified Continent.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $continent = $this->continentRepository->find($id);

        if (empty($continent)) {
            Flash::error(__('messages.not_found', ['model' => __('models/continents.singular')]));

            return redirect(route('admin.location.continents.index'));
        }

        return view('admin.location.continents.edit')->with('continent', $continent);
    }

    /**
     * Update the specified Continent in storage.
     *
     * @param int $id
     * @param UpdateContinentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContinentRequest $request)
    {
        $continent = $this->continentRepository->find($id);

        if (empty($continent)) {
            Flash::error(__('messages.not_found', ['model' => __('models/continents.singular')]));

            return redirect(route('admin.location.continents.index'));
        }

        $continent = $this->continentRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/continents.singular')]));

        return redirect(route('admin.location.continents.index'));
    }

    /**
     * Remove the specified Continent from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $continent = $this->continentRepository->find($id);

        if (empty($continent)) {
            Flash::error(__('messages.not_found', ['model' => __('models/continents.singular')]));

            return redirect(route('admin.location.continents.index'));
        }

        $this->continentRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/continents.singular')]));

        return redirect(route('admin.location.continents.index'));
    }
}
