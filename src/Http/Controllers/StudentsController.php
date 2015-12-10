<?php namespace Bluschool\Students\Http\Controllers;


use Bluschool\Students\Http\Requests\StudentsRequest;
use Bluschool\Students\Model\Students;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;
use Orchestra\Foundation\Http\Controllers\AdminController;

class StudentsController extends AdminController {

    public function __construct()
    {
//        $this->middleware('registration');
        $this->middleware('students');
    }

    protected function setupFilters()
    {
        $this->beforeFilter('control.csrf', ['only' => 'delete']);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Students $students)
	{
        return view('bluschool/students::students', compact('students'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('bluschool/students::edit');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StudentsRequest $request )
	{
        try {
            $file = Input::file('file1');
            $filename1 = 'students_'.uniqid() . '.jpg';
            $destinationPath = 'images/students';
            $itemImage = Image::make($file)->fit(350, 450);
            $itemImage->save($destinationPath . '/' . $filename1);
            $request['photo'] = $destinationPath.'/'.$filename1;

            $attachFile = Input::file('file2');
            $filename2 = 'students_attach_'.uniqid() . '.jpg';
            $destinationPathAttach = 'images/students';
            $itemAttachment = Image::make($attachFile)->fit(450, 350);

            $itemAttachment->save($destinationPathAttach . '/' . $filename2);
            $request['attachment'] = $destinationPathAttach.'/'.$filename2;

            $students = Students::create($request->all());

        } catch (Exception $e) {
            Flash::error('Unable to Save');
            return $this->redirect(handles('bluschool/students::students'));
        }
        Flash::success($students->name.' Saved Successfully');
        return $this->redirect(handles('bluschool/students::member'));

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
