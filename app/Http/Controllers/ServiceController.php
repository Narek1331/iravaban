<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceService;
class ServiceController extends Controller
{
    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }
    public function legal()
    {
        // Fetch services of type 'legal' using the ServiceService
        $legalServices = $this->serviceService->getServicesByType('legal');

        return view("services.legal",compact("legalServices"));
    }

    public function proBono()
    {
        // Fetch services of type 'pro-bono-free-legal-aid' using the ServiceService
        $proBonoService = $this->serviceService->getServicesByType('pro-bono-free-legal-aid');

        return view("services.pro-bono",compact("proBonoService"));
    }

    public function mediator()
    {
        // Fetch services of type 'mediator' using the ServiceService
        $mediatorService = $this->serviceService->getServicesByType('mediator');

        return view("services.mediator",compact("mediatorService"));
    }
}
