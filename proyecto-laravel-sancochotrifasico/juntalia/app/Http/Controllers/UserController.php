<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\Event;


class UserController extends Controller
{
    // ✅ Obtener todos los usuarios (desde React)
    public function index(Request $request)
    {
        $query = User::query();

        // Buscar por correo si se proporciona
        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        // Paginación de 10 usuarios por página
        $users = $query->paginate(50);

        return response()->json($users, 200);
    }

    // ✅ Obtener un usuario por ID
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        return response()->json($user, 200);
    }

    // ✅ Crear un usuario (desde React)
    public function store(Request $request)
    {
        // Validar los datos
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'birth_date' => ['required', 'date'],
            'phone' => ['required', 'string', 'min:10'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Crear el usuario
        $user = User::create([
            'rol_id' => 2, // ✅ Se asigna rol_id = 2 por defecto
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // 🔹 Se encripta la contraseña
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
        ]);

        return response()->json($user, 201);
    }

        public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // ✅ Validar datos incluyendo el rol_id
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:8',
            'birth_date' => 'sometimes|date',
            'phone' => 'sometimes|string|min:10',
            'rol_id' => 'sometimes|integer|exists:roles,id', // ✅ Se permite actualizar el rol_id
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // ✅ Actualizar usuario incluyendo rol_id si se envía
        $user->update([
            'name' => $request->name ?? $user->name,
            'last_name' => $request->last_name ?? $user->last_name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'birth_date' => $request->birth_date ?? $user->birth_date,
            'phone' => $request->phone ?? $user->phone,
            'rol_id' => $request->rol_id ?? $user->rol_id, // ✅ Permitir actualizar rol_id
        ]);

        return response()->json($user, 200);
    }
    public function destroy($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    
        // 🔹 Obtener eventos creados por el usuario
        $events = $user->events;
    
        // 🔹 Eliminar inscripciones de cada evento
        foreach ($events as $event) {
            $event->inscriptions()->delete();
        }
    
        // 🔹 Eliminar comentarios de cada evento
        foreach ($events as $event) {
            $event->comments()->delete();
        }
    
        // 🔹 Eliminar eventos del usuario
        $user->events()->delete();
    
        // 🔹 Eliminar inscripciones asociadas al usuario
        $user->inscriptions()->delete();
    
        // 🔹 Eliminar comentarios asociados al usuario
        $user->comments()->delete();
    
        // 🔹 Ahora sí, eliminar el usuario
        $user->delete();
    
        return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
    }
    
    
    
}







/*

class UserController extends Controller
{
    

    public function register() {
        //$rols = Rol::all();
        //return view('users.register', compact('rols'));
        return view('users.register');
    }

    public function index()
    {
        $roles = Rol::all();
        $users = User::with(['rol'])->get();
        return view('users.index', compact('users', 'roles'));
    }

    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        $user = new User();
        //$user->rol_id = $request->rol_id;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;
        $user->save();
        return redirect()->route('users.index');
    }

  
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $user = User::find($id);    
        $roles = Rol::all();
        
        return view('users.edit', compact('user', 'roles'));
    }

    
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        
        //$user->rol_id = $request->rol_id;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;
        $user->save();
        return redirect()->route('users.index');
    }

  
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');

    }
}*/
