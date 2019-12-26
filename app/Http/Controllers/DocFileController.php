<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocFileRequest;
use App\Http\Requests\UpdateDocFileRequest;
use App\Repositories\DocFileRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// controller.stub

class DocFileController extends AppBaseController
{
    /** @var  DocFileRepository */
    private $docFileRepository;

    public function __construct(DocFileRepository $docFileRepo)
    {
        $this->docFileRepository = $docFileRepo;
    }

    /**
     * Display a listing of the DocFile.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $docFiles = $this->docFileRepository->paginate(10);

        return view('doc_files.index')
            ->with('docFiles', $docFiles);
    }

    /**
     * Show the form for creating a new DocFile.
     *
     * @return Response
     */
    public function create()
    {
        return view('doc_files.create');
    }

    /**
     * Store a newly created DocFile in storage.
     *
     * @param CreateDocFileRequest $request
     *
     * @return Response
     */
    public function store(CreateDocFileRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('doc_file')) {
            $path = $request->file('doc_file')->store('public/doc_files');
            $publicPath = \Storage::url( $path );
            $input['doc_file'] = $publicPath;
        }

        $request->validate([
            'file.*' => 'required|file|max:50000|mimes:pdf,docx,doc,xls,xlsx',
        ]);

        $docFile = $this->docFileRepository->create($input);

        Flash::success('Doc File успешно сохранен.');

        return redirect(route('docFiles.index'));
    }

    /**
     * Display the specified DocFile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $docFile = $this->docFileRepository->find($id);

        if (empty($docFile)) {
            Flash::error('Doc File not found');

            return redirect(route('docFiles.index'));
        }

        return view('doc_files.show')->with('docFile', $docFile);
    }

    /**
     * Show the form for editing the specified DocFile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $docFile = $this->docFileRepository->find($id);

        if (empty($docFile)) {
            Flash::error('Doc File не найдено');

            return redirect(route('docFiles.index'));
        }

        return view('doc_files.edit')->with('docFile', $docFile);
    }

    /**
     * Update the specified DocFile in storage.
     *
     * @param int $id
     * @param UpdateDocFileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocFileRequest $request)
    {
        $docFile = $this->docFileRepository->find($id);

        if (empty($docFile)) {
            Flash::error('Doc File не найдено');

            return redirect(route('docFiles.index'));
        }


          $this->validate($request, [
              'doc_file' => 'bail|required|required|file|max:50000|mimes:pdf,docx,doc,xls,xlsx',
              'name' => 'required',
          ]);

        // $request->validate([
        //     // 'file.*' => 'required|file|max:50000|mimes:pdf,docx,doc,xls,xlsx',
        //     'doc_file' => 'required|file|max:50000|mimes:pdf,docx,doc,xls,xlsx',
        // ]);

        // $validator = Validator::make($request->all(), [
        //     'doc_file'   => 'mimes:doc,pdf,docx,zip'
        // ]);

        $input = $request->all();
        if ($request->hasFile('doc_file')) {
            $path = $request->file('doc_file')->store('public/doc_files');
            $publicPath = \Storage::url( $path );
            $input['doc_file'] = $publicPath;
        }

        $docFile = $this->docFileRepository->update($input, $id);

        Flash::success('Doc File обновили.');

        return redirect(route('docFiles.index'));
    }

    /**
     * Remove the specified DocFile from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $docFile = $this->docFileRepository->find($id);

        if (empty($docFile)) {
            Flash::error('Doc File не найден');

            return redirect(route('docFiles.index'));
        }

        // TODO Удаляем файл
        if (isset($docFile['doc_file'])) {
            // $input['image']=0;
            unlink( getcwd().$docFile['doc_file'] );
        }

        $this->docFileRepository->delete($id);

        Flash::success('Doc File удалено.');

        return redirect(route('docFiles.index'));
    }

    public function destroy_all()
    {
        \App\Models\DocFile::truncate();
        Flash::success('Всё удалено!');
        return redirect(route('docFiles.index'));
    // destroy_all

    }

    /**
     * Remove the specified SubsEmail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function import(CreateDocFileRequest $request)
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
            // $NewsubsEmail = $this->docFileRepository->create(['email'=> $email, 'active'=> $input['active'], 'subs'=>$input['subs'], 'group_email_id'=> $input['group_email_id'] ]);
            $this->docFileRepository->create(['name'=> $email ]);
        }
        // return var_dump($arr1);
        return redirect(route('docFiles.index'));
    }


    public function export(Request $request)
    {

    }

}
