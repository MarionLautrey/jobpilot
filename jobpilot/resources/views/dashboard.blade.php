@extends('layouts.app')

@section('content')
<h1>📊 Tableau de bord des offres</h1>

<div style="display: flex; gap: 20px; flex-wrap: wrap;">
    <div style="background: #fff; border:1px solid #ccc; border-radius:8px; padding:20px; flex:1;">
        <h2>Total d'offres</h2>
        <p style="font-size:2em;">{{ $total }}</p>
    </div>
    <div style="background: #e6f7ff; border:1px solid #ccc; border-radius:8px; padding:20px; flex:1;">
        <h2>CDI</h2>
        <p style="font-size:2em;">{{ $cdi }}</p>
    </div>
    <div style="background: #fffbe6; border:1px solid #ccc; border-radius:8px; padding:20px; flex:1;">
        <h2>CDD</h2>
        <p style="font-size:2em;">{{ $cdd }}</p>
    </div>
    <div style="background: #e6ffe6; border:1px solid #ccc; border-radius:8px; padding:20px; flex:1;">
        <h2>Stages</h2>
        <p style="font-size:2em;">{{ $stage }}</p>
    </div>
    <div style="background: #f0e6ff; border:1px solid #ccc; border-radius:8px; padding:20px; flex:1;">
        <h2>Alternances</h2>
        <p style="font-size:2em;">{{ $alternance }}</p>
    </div>
</div>
@endsection
