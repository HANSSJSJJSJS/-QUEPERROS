<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class TrainerDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $stats = [
            'assigned_pets' => 4,
            'completed_tasks' => 2,
            'pending_tasks' => 4,
            'rating' => 4.8,
        ];

        $todayTasks = [
            [
                'title' => 'Paseo matutino - Max',
                'time' => '08:00 AM',
                'status' => 'alta',
                'done' => true,
            ],
            [
                'title' => 'Entrenamiento obediencia - Luna',
                'time' => '10:00 AM',
                'status' => 'alta',
                'done' => true,
            ],
            [
                'title' => 'Alimentación - Rocky',
                'time' => '12:00 PM',
                'status' => 'media',
                'done' => false,
            ],
            [
                'title' => 'Sesión de socialización',
                'time' => '02:00 PM',
                'status' => 'media',
                'done' => false,
            ],
        ];

        $assignedPets = [
            [
                'name' => 'Max',
                'breed' => 'Golden Retriever',
                'age' => '3 años',
            ],
            [
                'name' => 'Luna',
                'breed' => 'Border Collie',
                'age' => '2 años',
            ],
            [
                'name' => 'Rocky',
                'breed' => 'Bulldog Francés',
                'age' => '4 años',
            ],
            [
                'name' => 'Bella',
                'breed' => 'Labrador',
                'age' => '1 año',
            ],
        ];

        return view('entrenador.dashboardentrenador', [
            'user' => $user,
            'stats' => $stats,
            'todayTasks' => $todayTasks,
            'assignedPets' => $assignedPets,
        ]);
    }
}
