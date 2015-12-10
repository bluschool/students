<?php namespace Bluschool\Students\Http\Controllers\Admin;

use Bluschool\Students\Model\Students;
use Illuminate\Support\Facades\Input;
use Orchestra\Foundation\Http\Controllers\AdminController;

class HomeController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
    }

    protected function setupFilters()
    {
        $this->beforeFilter('control.csrf', ['only' => 'delete']);
    }

    /**
     * Get landing page.
     *
     * @return mixed
     */
    public function index()
    {
        return $this->processor->index($this);
    }

    public function indexSucceed(array $data)
    {
        set_meta('title', 'bluschool/students::title.students');

        return view('bluschool/students::index', $data);
    }


    /**
     * Show a role.
     *
     * @param  int  $roles
     *
     * @return mixed
     */
    public function show($students)
    {
        return $this->edit($students);
    }

    /**
     * Create a new role.
     *
     * @return mixed
     */
    public function create()
    {
        return $this->processor->create($this);
    }

    /**
     * Edit the role.
     *
     * @param  int  $roles
     *
     * @return mixed
     */
     public function edit($students)
     {
        return $this->processor->edit($this, $students);
     }

    /**
     * Create the role.
     *
     * @return mixed
     */
     public function store()
     {
        return $this->processor->store($this, Input::all());
     }

    /**
     * Update the role.
     *
     * @param  int  $roles
     *
     * @return mixed
     */
    public function update($students)
    {
        return $this->processor->update($this, Input::all(), $students);
    }

    /**
     * Request to delete a role.
     *
     * @param  int  $roles
     *
     * @return mixed;
     */
    public function delete($students)
    {
        return $this->destroy($students);
    }

    /**
     * Request to delete a role.
     *
     * @param  int  $roles
     *
     * @return mixed
     */
    public function destroy($students)
    {
        return $this->processor->destroy($this, $students);
    }


    /**
     * Response when create role page succeed.
     *
     * @param  array  $data
     *
     * @return mixed
     */
    public function createSucceed(array $data)
    {
        set_meta('title', trans('bluschool/students::title.students.create'));

        return view('bluschool/students::edit', $data);
    }

    /**
     * Response when edit role page succeed.
     *
     * @param  array  $data
     *
     * @return mixed
     */
    public function editSucceed(array $data)
    {
        set_meta('title', trans('bluschool/students::title.students.update'));

        return view('bluschool/students::edit', $data);
    }

    /**
     * Response when storing role failed on validation.
     *
     * @param  object  $validation
     *
     * @return mixed
     */
     public function storeValidationFailed($validation)
     {
        return $this->redirectWithErrors(handles('orchestra::students/reporter/create'), $validation);
     }

    /**
     * Response when storing role failed.
     *
     * @param  array  $error
     *
     * @return mixed
     */
     public function storeFailed(array $error)
     {
        $message = trans('orchestra/foundation::response.db-failed', $error);

        return $this->redirectWithMessage(handles('orchestra::students/reporter'), $message);
     }

    /**
     * Response when storing user succeed.
     *
     * @param  \Orchestra\Model\Role  $role
     *
     * @return mixed
     */
     public function storeSucceed(students $students)
     {
        $message = trans('bluschool/students::response.students.create', [
            'name' => $students->getAttribute('name')
        ]);

            return $this->redirectWithMessage(handles('orchestra::students/reporter'), $message);
     }

    /**
     * Response when updating role failed on validation.
     *
     * @param  object  $validation
     * @param  int     $id
     *
     * @return mixed
     */
     public function updateValidationFailed($validation, $id)
     {
        return $this->redirectWithErrors(handles("orchestra::students/reporter/{$id}/edit"), $validation);
     }

    /**
     * Response when updating role failed.
     *
     * @param  array  $errors
     *
     * @return mixed
     */
     public function updateFailed(array $errors)
     {
        $message = trans('orchestra/foundation::response.db-failed', $errors);

        return $this->redirectWithMessage(handles('orchestra::students/reporter'), $message);
     }

    /**
     * Response when updating role succeed.
     */
    public function updateSucceed(students $students)
    {
        $message = trans('orchestra/control::response.roles.update', [
            'name' => $students->getAttribute('name')
        ]);

        return $this->redirectWithMessage(handles('orchestra::students'), $message);
    }

    /**
     * Response when deleting role failed.
     *
     * @param  array  $error
     *
     * @return mixed
     */
    public function destroyFailed(array $error)
    {
        $message = trans('orchestra/foundation::response.db-failed', $error);

        return $this->redirectWithMessage(handles('orchestra::students'), $message);
    }

    /**
     * Response when updating role succeed.
     *
     * @param  \Orchestra\Model\Role  $role
     *
     * @return mixed
     */
    public function destroySucceed(students $students)
    {
        $message = trans('orchestra/control::response.roles.delete', [
            'name' => $students->getAttribute('name')
        ]);

   ;     return $this->redirectWithMessage(handles('orchestra::students'), $message);
    }

    /**
     * Response when user verification failed.
     *
     * @return mixed
     */
    public function userVerificationFailed()
    {
        return $this->suspend(500);
    }

}