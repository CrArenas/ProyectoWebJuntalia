<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\City;
use App\Models\Category;
use App\Models\Comment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function categoryFilter () {

    }

    public function index()
    {
        $events = Event::with(['city', 'category', 'user'])->get();
        
        $cities = City::all();
        $categories = Category::all();
        $users = User::all();

        return view('events.index', compact('events', 'cities', 'categories', 'users'));
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
    public function store(Request $request)
    {
        $event = new Event();
        $event->user_id = Auth::id();
        $event->city_id = $request->city_id;
        $event->category_id = $request->category_id;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->event_date_time = $request->event_date_time;
        $event->age_restriction = $request->age_restriction;
        $event->cost = $request->cost;
        $event->status = $request->status;
        $event->pets = $request->pets;
        $event->address = $request->address;
        $event->lat = $request->event_lat;
        $event->lng = $request->event_lng;
        $event->save();
        return redirect()->route('events.index');
    }

    public function showDetails($id)
    {
        $event = Event::with('category')->findOrFail($id);
        $comments = Comment::where('event_id', $id)->with('user')->latest()->get();

        return view('eventDetails', compact('event', 'comments'));
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'event_id' => $id,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comentario agregado exitosamente.');
    }

    public function byCategory($id)
    {
        $events = Event::where('category_id', $id)->get();
        $category = Category::find($id);

        return view('events.byCategory', compact('events', 'category'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Buscar el evento con sus comentarios y el usuario que los hizo
        $event = Event::with(['category', 'comments.user'])->findOrFail($id);

        return view('eventDetails', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id); 
        
        $users = User::all();
        $categories = Category::all();
        $cities = City::all();
        
        return view('events.edit', compact('event', 'users', 'categories', 'cities')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);
        $event->city_id = $request->city_id;
        $event->category_id = $request->category_id;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->event_date_time = $request->event_date_time;
        $event->age_restriction = $request->age_restriction;
        $event->cost = $request->cost;
        $event->status = $request->status;
        $event->pets = $request->pets;
        $event->address = $request->address;
        $event->lat = $request->lat;
        $event->lng = $request->lng;
        $event->save();
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('events.index');
    }

    public function indexreport()
    {
        $events = Event::with('inscriptions.user')->get(); // Cargar eventos con usuarios inscritos
        return view('reports.eventsreport', compact('events'));
    }
    
    public function pdf(Request $request)
    {
        $event = Event::with('inscriptions.user')->findOrFail($request->event_id); // Obtener inscritos
        $pdf = Pdf::loadView('reports.event_report', compact('event'));
        return $pdf->download('EventReport.pdf');
    }

     public function eventsChart()
     {
         $categories = \App\Models\Category::withCount('events')->get();
     
         return response()->json([
             'categories' => $categories->pluck('name'),
             'counts' => $categories->pluck('events_count')
         ]);
     }

     public function obtenerEventosCercanos(Request $request)
     {
         // Obtener las coordenadas de la solicitud
         $latitud = $request->query('lat');
         $longitud = $request->query('lng');
 
         // Validar que se proporcionaron coordenadas
         if (!$latitud || !$longitud) {
             return response()->json(['error' => 'Ubicación no proporcionada'], 400);
         }
 
         // Consulta SQL para calcular la distancia usando la fórmula de Haversine
         $events = Event::selectRaw("
             *, 
             (6371 * acos(
                 cos(radians(?)) * cos(radians(lat)) * 
                 cos(radians(lng) - radians(?)) + 
                 sin(radians(?)) * sin(radians(lat))
             )) AS distancia", [$latitud, $longitud, $latitud])
             ->having('distancia', '<', 10) // Filtra eventos a menos de 10 km
             ->orderBy('distancia') // Ordena los eventos del más cercano al más lejano
             ->get();
 
         return response()->json($events);
     }

     // Usuarios que manipulan eventos propios

     public function userIndexEvents()
    {
        $user = Auth::user();
        $events = Event::where('user_id', $user->id)->get();
        return view('myEvents', compact('events'));
    }

    public function userDeleteEvents($id)
    {
        $event = Event::where('id', $id)->where('user_id', Auth::id())->first();
        
        if ($event) {
            $event->delete();
            return redirect()->route('events.myEvents')->with('success', 'Evento eliminado con éxito.');
        }
        return redirect()->route('events.myEvents')->with('error', 'No tienes permisos para eliminar este evento.');
    }

}
