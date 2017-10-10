@extends('app')

@section('content')

  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
        <div class="card-content">
          <h2><center><a href="/add_info">Add Information </a> | <a href="/list">Listing Page </a></center></h2>

          <form action="{{ route('update', $user->id) }}" method="POST" >
           {{method_field('PUT')}}
            {{csrf_field()}}

                <div class="field">
              <label for="name" class="label">Name</label>
              <p class="control">
                <input type="text" class="input" name="name" id="name" value="{{$user->name}}">
              </p>
            </div>

                <div class="field">
              <label for="province" class="label">Province</label>
              <p class="control">
                {!! Form::select('province_name', $province, $selectedProvince, ['class' => 'form-control m-bot15']) !!}
              </p>
            </div>


           <div class="columns">
              <div class="column">
            <div class="field">
              <label for="telephone" class="label">Telephone</label>
              <p class="control">
                <input type="text" class="input" name="telephone" id="telephone" value="{{$user->telephone}}">

              </p>
            </div>
          </div>

              <div class="column">
            <div class="field">
              <label for="postalcode" class="label">Postalcode</label>
              <p class="control">
                <input type="text" class="input" name="postalcode" id="postalcode" value="{{$user->postalcode}}">
              </p>
            </div>
          </div>
        </div>

            <div class="field">
              <label for="salary" class="label">Salary</label>
              <p class="control">
                <input type="text" class="input" name="salary" id="salary" value="{{$user->salary}}">
              </p>
            </div>

          <button class="button is-primary is-pulled-right" style="height: 25px;">Update</button>
          </form>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->

    </div>
  </div>

@endsection



