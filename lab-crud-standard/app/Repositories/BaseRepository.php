<?php 
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;


abstract class BaseRepository {

    protected $model;
    public function __construct(Model $model){

        $this->model = $model;
    }



    abstract function getFieldData():array;
    abstract function model():string;

    public function index(){
     return $this->model->paginate(4);
    }

public function create($validatedata){

    return  $this->model->create($validatedata);

}
// update

public function update(array $validatedData, $id) {
    
    $data = $this->model->find($id);
    if(!$data) {
      return abort(404, "task  not found");
    }
    
    return $data->update($validatedData);

  }


  public function find($id) {

    return $this->model->findOrFail($id);

   } 

  public function delete($id) {
    
    $data = $this->model->find($id);
    if(!$data) {
      return false;
    }
    
    return $data->delete($id);

  }

}
