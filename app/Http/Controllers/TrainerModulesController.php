<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainerModulesController extends Controller
{
    public function misTareas()
    {
        $user = Auth::user();

        $tasks = [
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
            [
                'title' => 'Paseo vespertino - Max',
                'time' => '04:00 PM',
                'status' => 'alta',
                'done' => false,
            ],
            [
                'title' => 'Revisión veterinaria - Bella',
                'time' => '05:30 PM',
                'status' => 'baja',
                'done' => false,
            ],
        ];

        return view('entrenador.mistareas', [
            'user' => $user,
            'tasks' => $tasks,
        ]);
    }

    public function mascotasAsignadas()
    {
        $user = Auth::user();

        $pets = [
            [
                'name' => 'Max',
                'breed' => 'Golden Retriever',
                'age' => '3 años',
                'owner' => 'Carlos Rodriguez',
                'phone' => '555-1234',
                'tags' => ['Paseo', 'Entrenamiento'],
            ],
            [
                'name' => 'Luna',
                'breed' => 'Border Collie',
                'age' => '2 años',
                'owner' => 'Maria Garcia',
                'phone' => '555-5678',
                'tags' => ['Entrenamiento', 'Socializacion'],
            ],
            [
                'name' => 'Rocky',
                'breed' => 'Bulldog Frances',
                'age' => '4 años',
                'owner' => 'Ana Martinez',
                'phone' => '555-9012',
                'tags' => ['Cuidado diario', 'Paseo'],
            ],
            [
                'name' => 'Bella',
                'breed' => 'Labrador',
                'age' => '1 año',
                'owner' => 'Pedro Sanchez',
                'phone' => '555-3456',
                'tags' => ['Entrenamiento', 'Paseo'],
            ],
        ];

        return view('entrenador.mascotas', [
            'user' => $user,
            'pets' => $pets,
        ]);
    }

    public function seguimiento()
    {
        $user = Auth::user();

        return view('entrenador.seguimiento', [
            'user' => $user,
        ]);
    }

    public function horario()
    {
        $user = Auth::user();

        $week = [
            'Lunes' => [
                [
                    'time' => '08:00',
                    'pet' => 'Max',
                    'activity' => 'Paseo',
                ],
                [
                    'time' => '10:00',
                    'pet' => 'Luna',
                    'activity' => 'Entrenamiento',
                ],
            ],
            'Martes' => [
                [
                    'time' => '09:00',
                    'pet' => 'Rocky',
                    'activity' => 'Cuidado',
                ],
                [
                    'time' => '14:00',
                    'pet' => 'Bella',
                    'activity' => 'Entrenamiento',
                ],
            ],
            'Miercoles' => [
                [
                    'time' => '08:00',
                    'pet' => 'Max',
                    'activity' => 'Paseo',
                ],
                [
                    'time' => '11:00',
                    'pet' => 'Luna',
                    'activity' => 'Socializacion',
                ],
            ],
            'Jueves' => [
                [
                    'time' => '10:00',
                    'pet' => 'Rocky',
                    'activity' => 'Paseo',
                ],
                [
                    'time' => '15:00',
                    'pet' => 'Bella',
                    'activity' => 'Entrenamiento',
                ],
            ],
            'Viernes' => [
                [
                    'time' => '08:00',
                    'pet' => 'Max',
                    'activity' => 'Paseo',
                ],
                [
                    'time' => '12:00',
                    'pet' => 'Luna',
                    'activity' => 'Entrenamiento',
                ],
            ],
        ];

        return view('entrenador.horario', [
            'user' => $user,
            'week' => $week,
        ]);
    }

    public function historial()
    {
        $user = Auth::user();

        $records = [
            [
                'date' => '18/03/2026',
                'pet' => 'Max',
                'service' => 'Paseo matutino',
                'duration' => '45 min',
                'notes' => 'Excelente comportamiento',
            ],
            [
                'date' => '18/03/2026',
                'pet' => 'Luna',
                'service' => 'Entrenamiento',
                'duration' => '60 min',
                'notes' => 'Progreso en comandos básicos',
            ],
            [
                'date' => '17/03/2026',
                'pet' => 'Rocky',
                'service' => 'Cuidado diario',
                'duration' => '8 hrs',
                'notes' => 'Día tranquilo',
            ],
            [
                'date' => '17/03/2026',
                'pet' => 'Max',
                'service' => 'Paseo vespertino',
                'duration' => '30 min',
                'notes' => 'Socialización con otros perros',
            ],
            [
                'date' => '16/03/2026',
                'pet' => 'Bella',
                'service' => 'Entrenamiento',
                'duration' => '45 min',
                'notes' => 'Primera sesión completada',
            ],
        ];

        return view('entrenador.historial', [
            'user' => $user,
            'records' => $records,
        ]);
    }

    public function chat()
    {
        $user = Auth::user();

        $conversations = [
            [
                'initial' => 'C',
                'name' => 'Carlos Rodriguez',
                'subtitle' => 'Dueño de Max',
                'active' => true,
            ],
            [
                'initial' => 'M',
                'name' => 'Maria Garcia',
                'subtitle' => 'Dueño de Luna',
                'active' => false,
            ],
            [
                'initial' => 'A',
                'name' => 'Ana Martinez',
                'subtitle' => 'Dueño de Rocky',
                'active' => false,
            ],
            [
                'initial' => 'P',
                'name' => 'Pedro Sanchez',
                'subtitle' => 'Dueño de Bella',
                'active' => false,
            ],
        ];

        $active = collect($conversations)->firstWhere('active', true) ?? $conversations[0];

        $messages = [
            [
                'from' => 'owner',
                'text' => 'Hola Juan, como estuvo Max hoy en el paseo?',
            ],
            [
                'from' => 'trainer',
                'text' => 'Hola Carlos! Max estuvo excelente, muy energico y obediente.',
            ],
            [
                'from' => 'owner',
                'text' => 'Que bueno escuchar eso! Ha mejorado mucho con el entrenamiento.',
            ],
            [
                'from' => 'trainer',
                'text' => 'Si, su progreso es muy notable. Mañana trabajaremos en comandos avanzados.',
            ],
        ];

        return view('entrenador.chat', [
            'user' => $user,
            'conversations' => $conversations,
            'activeConversation' => $active,
            'messages' => $messages,
        ]);
    }

    public function notificaciones()
    {
        $user = Auth::user();

        $notifications = [
            [
                'color' => 'red',
                'icon' => 'bell',
                'title' => 'Nueva cita asignada: Bella - Viernes 10:00 AM',
                'time' => 'Hace 5 min',
                'unread' => true,
            ],
            [
                'color' => 'blue',
                'icon' => 'bell',
                'title' => 'Carlos Rodriguez dejo un mensaje sobre Max',
                'time' => 'Hace 30 min',
                'unread' => true,
            ],
            [
                'color' => 'green',
                'icon' => 'bell',
                'title' => 'Pago recibido por servicios de marzo',
                'time' => 'Hace 2 horas',
                'unread' => false,
            ],
            [
                'color' => 'orange',
                'icon' => 'bell',
                'title' => 'Recordatorio: Vacuna de Luna vence en 5 dias',
                'time' => 'Hace 1 dia',
                'unread' => false,
            ],
        ];

        return view('entrenador.notificaciones', [
            'user' => $user,
            'notifications' => $notifications,
        ]);
    }

    public function perfil()
    {
        $user = Auth::user();

        $fullName = trim((string) ($user->name ?? ''));
        $parts = preg_split('/\s+/', $fullName, -1, PREG_SPLIT_NO_EMPTY) ?: [];
        $firstName = $parts[0] ?? '';
        $lastName = count($parts) > 1 ? implode(' ', array_slice($parts, 1)) : '';

        $profile = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone' => '+52 555 123 4567',
            'specialty' => 'Entrenamiento de obediencia, Socializacion',
            'title' => 'Entrenador Senior',
        ];

        return view('entrenador.perfil', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }
}
