<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Notes extends Model
{
    public static  function getList() {
        
        $id = Auth::user()->id;
        
        $res = DB::table('notes')
                    ->select('id', 'content')
                    ->where('user_id', '=', $id)
                    ->get();
        
        
        return $res;
    }
    
    public static  function addNote($content) {
        
        $id = Auth::user()->id;
                
        DB::table('notes')->insert([
            'user_id' => $id,
            'content' => ''
        ]);        
        
        return array('message' => 'Note was added');
    }
    
    public static  function editNote($note_id, $content) {
        
        $id = Auth::user()->id;
                
        DB::table('notes')
                ->where('user_id', '=', $id)
                ->where('id', '=', $note_id)
                ->update(['content' => $content]);      
        
        return array('message' => 'Note was changed');
    }
    
    public static  function deleteNote($note_id) {
        
        $id = Auth::user()->id;
                
        DB::table('notes')
                ->where('user_id', '=', $id)
                ->where('id', '=', $note_id)
                ->delete();      
        
        return array('message' => 'Note was deleted');
    }
}
