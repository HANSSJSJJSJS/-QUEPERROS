<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminServiceController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

        $services = [
            [
                'category' => 'Medicina',
                'category_color' => 'blue',
                'name' => 'Consulta General',
                'description' => 'Revision general de la salud de la mascota con diagnostico basico.',
                'price' => 50000,
                'duration' => '30 min',
                'rating' => 4.8,
                'usage_month' => 42,
                'active' => true,
            ],
            [
                'category' => 'Prevencion',
                'category_color' => 'green',
                'name' => 'Vacunacion',
                'description' => 'Aplicacion de vacunas segun el calendario de vacunacion.',
                'price' => 35000,
                'duration' => '15 min',
                'rating' => 4.9,
                'usage_month' => 38,
                'active' => true,
            ],
            [
                'category' => 'Cuidado',
                'category_color' => 'yellow',
                'name' => 'Guarderia',
                'description' => 'Cuidado diario de mascotas en un ambiente seguro y divertido.',
                'price' => 80000,
                'duration' => '8 horas',
                'rating' => 4.7,
                'usage_month' => 25,
                'active' => true,
            ],
            [
                'category' => 'Estetica',
                'category_color' => 'purple',
                'name' => 'Peluqueria Canina',
                'description' => 'Bano, corte de pelo y arreglo de unas para tu mascota.',
                'price' => 45000,
                'duration' => '1 hora',
                'rating' => 4.6,
                'usage_month' => 19,
                'active' => true,
            ],
            [
                'category' => 'Emergencia',
                'category_color' => 'red',
                'name' => 'Emergencias 24h',
                'description' => 'Servicio de emergencia veterinaria disponible las 24 horas.',
                'price' => 120000,
                'duration' => 'Variable',
                'rating' => 4.9,
                'usage_month' => 12,
                'active' => true,
            ],
            [
                'category' => 'Cirugia',
                'category_color' => 'gray',
                'name' => 'Cirugia Dental',
                'description' => 'Limpieza dental profunda y procedimientos de cirugia oral.',
                'price' => 200000,
                'duration' => '2 horas',
                'rating' => 4.5,
                'usage_month' => 3,
                'active' => false,
            ],
        ];

        $totalServices = count($services);
        $activeServices = count(array_filter($services, fn ($s) => (bool) ($s['active'] ?? false)));
        $totalUses = array_sum(array_map(fn ($s) => (int) ($s['usage_month'] ?? 0), $services));
        $estimatedRevenue = array_sum(array_map(fn ($s) => (int) ($s['usage_month'] ?? 0) * (int) ($s['price'] ?? 0), $services));

        return view('admin.services.gestionservicios', [
            'admin' => $admin,
            'services' => $services,
            'stats' => [
                'total_services' => $totalServices,
                'active_services' => $activeServices,
                'total_uses' => $totalUses,
                'estimated_revenue' => $estimatedRevenue,
            ],
        ]);
    }
}
