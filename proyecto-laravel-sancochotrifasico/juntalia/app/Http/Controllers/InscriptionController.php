<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Event;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inscriptions = Inscription::with(['user', 'event'])->get();
        $users = User::all();
        $events = Event::all();
        return view('inscriptions.index', compact('inscriptions', 'users', 'events'));
    }


    public function userInscriptions()
    {
        $user = Auth::user();
        $inscriptions = Inscription::where('user_id', $user->id)->with('event')->get();

        return view('userEnrolled', compact('inscriptions'));
    }

    public function cancelInscription($id)
    {
        $inscription = Inscription::where('user_id', Auth::id())->where('event_id', $id)->first();
        
        if ($inscription) {
            $inscription->delete();
            return redirect()->route('user.inscriptions')->with('success', 'Inscripción anulada con éxito.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    /*public function store(Request $request)
    {
        $inscription = new Inscription();
        $inscription->user_id = $request->user_id;
        $inscription->event_id = $request->event_id;
        $inscription->save();
        return redirect()->route('inscriptions.index');
    }*/

    public function store(Request $request)
{
    // Validar que el usuario y el evento existen
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'event_id' => 'required|exists:events,id',
    ]);

    // Verificar si el usuario ya está inscrito en el evento
    $existingInscription = Inscription::where('user_id', $request->user_id)
                                      ->where('event_id', $request->event_id)
                                      ->first();

    if ($existingInscription) {
        return redirect()->back()->with('error', 'Ya estás inscrito en este evento.');
    }

    // Crear inscripción
    Inscription::create([
        'user_id' => $request->user_id,
        'event_id' => $request->event_id,
    ]);

    return redirect()->back()->with('success', 'Inscripción realizada con éxito.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inscription = Inscription::find($id);
        return view('inscriptions.edit', compact('inscription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        #no creo que sea necesario, ya que no se puede editar una inscripcion, solo se puede eliminar
        // $Inscription = Inscription::find($id);
        // $Inscription->user_id = $request->user_id;
        // $Inscription->event_id = $request->event_id;
        // $Inscription->save();
        // return redirect()->route('inscriptions.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inscription = Inscription::find($id);
        $inscription->delete();
        return redirect()->route('inscriptions.index');
    }

    public function indexreport()
    {
        $users = User::all(); // Obtener todos los usuarios
        $topUser = User::withCount('inscriptions')->orderByDesc('inscriptions_count')->first();
        return view('reports.inscriptionsreport', compact('users', 'topUser'));
    }
    
    public function pdf(Request $request)
    {
        if ($request->has('user_id')) {
            $user = User::with('inscriptions.event')->findOrFail($request->user_id);
            $pdf = Pdf::loadView('reports.user_inscriptions_report', compact('user'));
            return $pdf->download('UserInscriptionsReport.pdf');
        }
        
        $topUser = User::withCount('inscriptions')->orderByDesc('inscriptions_count')->first();
        $pdf = Pdf::loadView('reports.inscription_report', compact('topUser'));
        return $pdf->download('TopUserReport.pdf');
    }

    public function userInscriptionsReport(Request $request)
{
    // Validar que se haya seleccionado un usuario
    $request->validate([
        'user_id' => 'required|exists:users,id'
    ]);

    // Obtener el usuario con sus inscripciones
    $user = User::with('inscriptions.event')->findOrFail($request->user_id);

    // Generar el PDF con las inscripciones del usuario
    $pdf = Pdf::loadView('reports.user_inscriptions_report', compact('user'));

    return $pdf->download('UserInscriptionsReport.pdf');
}


    
    public function inscriptionsChart()
    {
        $events = \App\Models\Event::withCount('inscriptions')->get();

        return response()->json([
            'events' => $events->pluck('name'),
            'counts' => $events->pluck('inscriptions_count')
        ]);
    }
    
    
}
