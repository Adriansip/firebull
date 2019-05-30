@extends('layouts.app')
@section('scripts')
<link rel="stylesheet" href="{{asset('css/cursos.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <p class="text-title descripcion">Tenemos a su disposición la siguiente lista de cursos y estudios de seguridad e higiene que exige la STPS impartidos por instructores altamente capacitados con registro ante la secretaría del trabajo y
            previsión social:</p>
    </div>
</div>
<div class="row">

    <div class="col-md-12 table-responsive-lg">
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="text-center">No. curso</th>
                    <th scope="col" class="text-center">Descripcion del curso</th>
                    <th scope="col" class="text-center">Norma de seguridad</th>
                    @if(Auth::user())
                    <th scope="col" class="text-center">Solicitar curso</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $curso)
                <tr>
                    <th scope="row" class="text-center">{{$curso->idCurso}}</th>
                    <td class="text-center">{{$curso->curso}}</td>
                    <td class="text-center">{{$curso->norma}}</td>
                    @if(Auth::user())
                    <td class="text-center"><button class="btn btn-success">Solicitar</button></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!!$cursos->render()!!}
@endsection
@section('scripts')
<script src="{{asset('js/contacto.js')}}"></script>
@endsection