<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller {
    
    public function generateSlug($key) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $lenght = 8;
        $randomString = '';
        for ($i = 0; $i < $lenght; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return Str::slug($key.'-'.$randomString);
    }

    protected function respondWithTransformer($data, $statusCode = 200, $headers = []) {
        $this->checkTransformer();

        if ($data instanceof Collection) {
            $data = $this->transformer->collection($data);
        } else {
            $data = $this->transformer->item($data);
        }

        return $this->respond($data, $statusCode, $headers);
    }

    private function checkTransformer() {
        // if ($this->transformer === null || ! $this->transformer instanceof Transformer) {
        //     throw new Exception('Invalid data transformer.');
        // }
    }

    protected function respond($data, $statusCode = 200, $headers = []) {
        return response()->json($data, $statusCode, $headers);
    }

    protected function respondFailedLogin() {
        return $this->respond([
            'errors' => [
                'email or password' => 'is invalid',
            ]
        ], 422);
    }
}
