@extends('layouts.app')
@section('content')
<div class="row" id="messageHome" tabindex="0">

</div>
<div class="row">
    <div class="nav flex-column nav-pills col-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-cotizacion-tab" data-toggle="pill" href="#v-pills-cotizacion" role="tab" aria-controls="v-pills-cotizacion" aria-selected="true">Cotizaciones</a>
        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
    </div>
    <div class="tab-content col-10" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-cotizacion" role="tabpanel" aria-labelledby="v-pills-cotizacion-tab">
            <div class="table-responsive pl-5" id='tblContainer'>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/cotizaciones.js')}}">

</script>
@endsection