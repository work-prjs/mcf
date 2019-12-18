<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChitRequest;
use App\Http\Requests\UpdateChitRequest;
use App\Repositories\ChitRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// controller.stub

class ChitController extends AppBaseController
{
    /** @var  ChitRepository */
    private $chitRepository;

    public function __construct(ChitRepository $chitRepo)
    {
        $this->chitRepository = $chitRepo;
    }

    /**
     * Display a listing of the Chit.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $chits = $this->chitRepository->paginate(10);

        return view('chits.index')
            ->with('chits', $chits);
    }

    /**
     * Show the form for creating a new Chit.
     *
     * @return Response
     */
    public function create()
    {
        return view('chits.create');
    }

    /**
     * Store a newly created Chit in storage.
     *
     * @param CreateChitRequest $request
     *
     * @return Response
     */
    public function store(CreateChitRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/chits');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $chit = $this->chitRepository->create($input);

        Flash::success('Chit успешно сохранен.');

        return redirect(route('chits.index'));
    }

    /**
     * Display the specified Chit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $chit = $this->chitRepository->find($id);

        if (empty($chit)) {
            Flash::error('Chit not found');

            return redirect(route('chits.index'));
        }

        return view('chits.show')->with('chit', $chit);
    }

    /**
     * Show the form for editing the specified Chit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $chit = $this->chitRepository->find($id);

        if (empty($chit)) {
            Flash::error('Chit не найдено');

            return redirect(route('chits.index'));
        }

        return view('chits.edit')->with('chit', $chit);
    }

    /**
     * Update the specified Chit in storage.
     *
     * @param int $id
     * @param UpdateChitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChitRequest $request)
    {
        $chit = $this->chitRepository->find($id);

        if (empty($chit)) {
            Flash::error('Chit не найдено');

            return redirect(route('chits.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/chits');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $chit = $this->chitRepository->update($input, $id);

        Flash::success('Chit обновили.');

        return redirect(route('chits.index'));
    }

    /**
     * Remove the specified Chit from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $chit = $this->chitRepository->find($id);

        if (empty($chit)) {
            Flash::error('Chit не найден');

            return redirect(route('chits.index'));
        }

        // TODO Удаляем файл
        if (isset($chit['image'])) {
            // $input['image']=0;
            unlink( getcwd().$chit['image'] );
        }

        $this->chitRepository->delete($id);

        Flash::success('Chit удалено.');

        return redirect(route('chits.index'));
    }

    public function destroy_all()
    {
        \App\Models\Chit::truncate();
        Flash::success('Всё удалено!');
        return redirect(route('chits.index'));
    // destroy_all

    }

    /**
     * Remove the specified SubsEmail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function import(CreateChitRequest $request)
    {

        $input = $request->all();
        $arr1 = preg_split('/\s+/', $input['elist']);
        if (!isset($input['active'])) {
            $input['active']=0;
        }
        if (!isset($input['subs'])) {
            $input['subs']=0;
        }
        // 
        foreach ($arr1 as $email ) {
            // $NewsubsEmail = $this->chitRepository->create(['email'=> $email, 'active'=> $input['active'], 'subs'=>$input['subs'], 'group_email_id'=> $input['group_email_id'] ]);
            $this->chitRepository->create(['name'=> $email ]);
        }
        // return var_dump($arr1);
        return redirect(route('chits.index'));
    }


    public function export(Request $request)
    {

    }

}
