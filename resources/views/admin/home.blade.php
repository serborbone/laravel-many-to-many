@extends('admin.layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Message after Login - ritorno il name della tabella user --}}
                    <span>You are Logged in {{{$user->name}}}!</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
