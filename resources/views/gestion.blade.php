@extends('layouts.app')

@section('content')
    <div>
        @livewire('section-calendar')
        @livewire('section-plans')
        @livewire('section-circular')
    </div>
@endsection