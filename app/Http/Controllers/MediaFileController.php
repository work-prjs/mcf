<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMediaFileRequest;
use App\Http\Requests\UpdateMediaFileRequest;
use App\Repositories\MediaFileRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
// controller.stub

class MediaFileController extends AppBaseController
{
    /** @var  MediaFileRepository */
    private $mediaFileRepository;

    public function __construct(MediaFileRepository $mediaFileRepo)
    {
        $this->mediaFileRepository = $mediaFileRepo;
    }

    /**
     * Display a listing of the MediaFile.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $mediaFiles = $this->mediaFileRepository->paginate(10);

        return view('media_files.index')
            ->with('mediaFiles', $mediaFiles);
    }

    /**
     * Show the form for creating a new MediaFile.
     *
     * @return Response
     */
    public function create()
    {
        return view('media_files.create');
    }

    /**
     * Store a newly created MediaFile in storage.
     *
     * @param CreateMediaFileRequest $request
     *
     * @return Response
     */
    public function store(CreateMediaFileRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/media_files');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $mediaFile = $this->mediaFileRepository->create($input);

        Flash::success('Media File успешно сохранен.');

        return redirect(route('mediaFiles.index'));
    }

    /**
     * Display the specified MediaFile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mediaFile = $this->mediaFileRepository->find($id);

        if (empty($mediaFile)) {
            Flash::error('Media File not found');

            return redirect(route('mediaFiles.index'));
        }

        return view('media_files.show')->with('mediaFile', $mediaFile);
    }

    /**
     * Show the form for editing the specified MediaFile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mediaFile = $this->mediaFileRepository->find($id);

        if (empty($mediaFile)) {
            Flash::error('Media File не найдено');

            return redirect(route('mediaFiles.index'));
        }

        return view('media_files.edit')->with('mediaFile', $mediaFile);
    }

    /**
     * Update the specified MediaFile in storage.
     *
     * @param int $id
     * @param UpdateMediaFileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMediaFileRequest $request)
    {
        $mediaFile = $this->mediaFileRepository->find($id);

        if (empty($mediaFile)) {
            Flash::error('Media File не найдено');

            return redirect(route('mediaFiles.index'));
        }

        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/media_files');
            $publicPath = \Storage::url( $path );
            $input['image'] = $publicPath;
        }

        $mediaFile = $this->mediaFileRepository->update($input, $id);

        Flash::success('Media File обновили.');

        return redirect(route('mediaFiles.index'));
    }

    /**
     * Remove the specified MediaFile from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mediaFile = $this->mediaFileRepository->find($id);

        if (empty($mediaFile)) {
            Flash::error('Media File не найден');

            return redirect(route('mediaFiles.index'));
        }

        // TODO Удаляем файл
        if (isset($mediaFile['image'])) {
            // $input['image']=0;
            unlink( getcwd().$mediaFile['image'] );
        }

        $this->mediaFileRepository->delete($id);

        Flash::success('Media File удалено.');

        return redirect(route('mediaFiles.index'));
    }

    public function destroy_all()
    {
        \App\Models\MediaFile::truncate();
        Flash::success('Всё удалено!');
        return redirect(route('mediaFiles.index'));
    // destroy_all

    }

    /**
     * Remove the specified SubsEmail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function import(CreateMediaFileRequest $request)
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
            // $NewsubsEmail = $this->mediaFileRepository->create(['email'=> $email, 'active'=> $input['active'], 'subs'=>$input['subs'], 'group_email_id'=> $input['group_email_id'] ]);
            $this->mediaFileRepository->create(['name'=> $email ]);
        }
        // return var_dump($arr1);
        return redirect(route('mediaFiles.index'));
    }


    public function export(Request $request)
    {

    }

}
