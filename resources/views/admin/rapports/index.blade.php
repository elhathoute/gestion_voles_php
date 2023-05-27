@extends('layouts.master')

@section('content')
@if(auth()->user()->is_admin==2)
<section class="classes mt-5">
        <div class="classes-description mb-5">
            <a href="{{ route('customer.rapport.create') }}" class="btn btn-rounded btn-success waves-effect waves-light ms-2"><i class="bx bx-plus font-size-16 me-2 align-middle"></i>Add Rapport</a>
        </div>
        <?php
        $rapports = ["abu", "Bucharest", "damascus", "dubai"]; ?>
        <div class="container">
        <h3 class="mt-3">Edition Mai 2023</h3>
        @foreach($rapports as $airport)
        <div class="card  my-3 p-4 px-2 w-100" style="width:18rem;" >
            <a href=<?php echo "/rapports/rapport-aeroport-".$airport.".pdf"?>>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                </svg>
                flightsApp , rapport de chiffre de vols passés par l'aeroport <?php echo $airport ?> (MAI 2023) PDF</a>
        </div>
        @endforeach
        </div>
    </section>
    @endif
@endsection
