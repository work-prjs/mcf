<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactContractorRequest;
use App\Http\Requests\UpdateContactContractorRequest;
use App\Repositories\ContactContractorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContactContractorController extends AppBaseController
{
    /** @var  ContactContractorRepository */
    private $contactContractorRepository;

    public function __construct(ContactContractorRepository $contactContractorRepo)
    {
        $this->contactContractorRepository = $contactContractorRepo;
    }

    /**
     * Display a listing of the ContactContractor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contactContractors = $this->contactContractorRepository->paginate(10);

        return view('contact_contractors.index')
            ->with('contactContractors', $contactContractors);
    }

    /**
     * Show the form for creating a new ContactContractor.
     *
     * @return Response
     */
    public function create()
    {
        return view('contact_contractors.create');
    }

    /**
     * Store a newly created ContactContractor in storage.
     *
     * @param CreateContactContractorRequest $request
     *
     * @return Response
     */
    public function store(CreateContactContractorRequest $request)
    {
        $input = $request->all();

        $contactContractor = $this->contactContractorRepository->create($input);

        Flash::success('Contact Contractor saved successfully.');

        return redirect(route('contactContractors.index'));
    }

    /**
     * Display the specified ContactContractor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactContractor = $this->contactContractorRepository->find($id);

        if (empty($contactContractor)) {
            Flash::error('Contact Contractor not found');

            return redirect(route('contactContractors.index'));
        }

        return view('contact_contractors.show')->with('contactContractor', $contactContractor);
    }

    /**
     * Show the form for editing the specified ContactContractor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactContractor = $this->contactContractorRepository->find($id);

        if (empty($contactContractor)) {
            Flash::error('Contact Contractor not found');

            return redirect(route('contactContractors.index'));
        }

        return view('contact_contractors.edit')->with('contactContractor', $contactContractor);
    }

    /**
     * Update the specified ContactContractor in storage.
     *
     * @param int $id
     * @param UpdateContactContractorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactContractorRequest $request)
    {
        $contactContractor = $this->contactContractorRepository->find($id);

        if (empty($contactContractor)) {
            Flash::error('Contact Contractor not found');

            return redirect(route('contactContractors.index'));
        }

        $contactContractor = $this->contactContractorRepository->update($request->all(), $id);

        Flash::success('Contact Contractor updated successfully.');

        return redirect(route('contactContractors.index'));
    }

    /**
     * Remove the specified ContactContractor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactContractor = $this->contactContractorRepository->find($id);

        if (empty($contactContractor)) {
            Flash::error('Contact Contractor not found');

            return redirect(route('contactContractors.index'));
        }

        $this->contactContractorRepository->delete($id);

        Flash::success('Contact Contractor deleted successfully.');

        return redirect(route('contactContractors.index'));
    }
}
