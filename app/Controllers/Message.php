<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\MessageModel;
use App\Models\LogModel;
use App\Models\UserModel;

class Message extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $model = new MessageModel();
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
        //
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
            $model = new MessageModel();
            $data['result'] = $model->orderBy('rand()')->first();

            $modelUser = new UserModel();
            $modelLog = new LogModel();
            $dataLog = [
                'id_user'  => $data['result']['id_user'],
                'device_id' => $this->request->getVar('device_id'),
                'no_hp'  => $this->request->getVar('no_hp'),
                'log_api'  => "message",
                'nama'  => $modelUser->select('nama')->where('id_user', $data['result']['id_user'])->first(),
                'pesan'  => $data['result']['pesan'],
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
