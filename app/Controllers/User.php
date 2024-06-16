<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use App\Models\LogModel;

class User extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $model = new UserModel();
        $data['result'] = $model->orderBy('rand()')->first();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $model = new UserModel();
        $data['result'] = $model->where('id_user', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $rules = $this->validate([
            'device_id' => 'required',
            'no_hp'  => 'required',
        ]);

        if(!$rules){
            return $this->failValidationErrors($this->validator->getErrors());
        }else{
            $model = new UserModel();
            $data['result'] = $model->orderBy('rand()')->first();

            $modelLog = new LogModel();
            $dataLog = [
                'id_user'  => $data['result']['id_user'],
                'device_id' => $this->request->getVar('device_id'),
                'no_hp'  => $this->request->getVar('no_hp'),
                'log_api'  => "user",
                'nama'  => $data['result']['nama'],
                'method'  => "POST",
            ];
            $modelLog->insert($dataLog);

            return $this->respond($data);
        }
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
