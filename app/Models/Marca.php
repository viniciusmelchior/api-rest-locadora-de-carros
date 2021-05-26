<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'imagem'];

    public function rules(){
        return  [
            'nome' => 'required|unique:marcas,nome,'.$this->id.'|min:3',
            'imagem' => 'required|file|mimes:png,jpeg'
        ];
    }

    public function feedback(){
       return [
        'required' => 'O campo :attribute é obrigatório',
        'imagem.mimes' => 'O arquivo uma imagem do tipo png ou jpeg',
        'nome.unique' => 'O nome da marca já existe',
        'nome.min' => 'O nome deve ter no mínimo 3 caracteres'
        ];
    }

    //uma marca possui muitos modelos
    public function modelos(){
        return $this->hasMany("App\models\Modelo");
    }
}