@extends('layouts.main')
@section('title','Company | Edit || '.$company->name)
@section('content')
<main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Edit Company</strong>
            </div>           
            <form action="{{ route('companies.update',$company) }}" method="POST">
              @method('PUT')
              @csrf
              @include('companies._form')
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection