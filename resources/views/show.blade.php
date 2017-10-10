@extends('app')

@section('content')

<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
        <div class="card-content">
          <h2><center><a href="/add_info">Add Information </a> | <a href="/list">Listing Page </a></center></h2>

           <br>
            <div class="field">
              <h2><b> Name : {{ $user->name }} </b></h2>
            </div>
           <br>

            <div class="field">
              @foreach ($province as $object)
                <h2><b> Province : {{ $object->province_name }} </b></h2>
              @endforeach
            </div>
            <br>


            <div class="field">
              <h2><b> Telephone : {{ $user->telephone }} </b></h2>
            </div>
            <br>


            <div class="field">
              <h2><b> Postalcode : {{ $user->postalcode }} </b></h2>
            </div>
            <br>


            <div class="field">
              <h2><b> Salary : {{ $user->salary }} </b></h2>
            </div>




        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->

    </div>
  </div>
@endsection
