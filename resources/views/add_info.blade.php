@extends('app')

@section('content')

  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
        <div class="card-content">
          <h2><center><a href="/add_info">Add Information </a> | <a href="/list">Listing Page </a></center></h2>

          <form action="store" method="POST" >
            {{csrf_field()}}
            <div class="field">
              <label for="name" class="label">Name</label>
              <p class="control">
                <input class="input {{$errors->has('name') ? 'is-danger' : ''}}" type="text" name="name" id="name" value="{{old('name')}}" required>
              </p>
              @if ($errors->has('name'))
                <p class="help is-danger">{{$errors->first('name')}}</p>
              @endif
            </div>

            <div class="field">
              <label for="province" class="label">Province</label>
              <p class="control">

               {!! Form::select('province_name', $province, $selectedProvince, ['class' => 'form-control m-bot15']) !!}

              @if ($errors->has('province'))
                <p class="help is-danger">{{$errors->first('province')}}</p>
              @endif
            </div>

            <div class="columns">
              <div class="column">
                <div class="field">
                  <label for="telephone" class="label">Telephone</label>
                  <p class="control">
                    <input class="input {{$errors->has('telephone') ? 'is-danger' : ''}}" type="telephone" name="telephone" id="telephone" required>
                  </p>
                  @if ($errors->has('telephone'))
                    <p class="help is-danger">{{$errors->first('telephone')}}</p>
                  @endif
                </div>
              </div>

              <div class="column">
                <div class="field">
                  <label for="postalcode" class="label">Postalcode</label>
                  <p class="control">
                    <input class="input {{$errors->has('postalcode') ? 'is-danger' : ''}}" type="postalcode" name="postalcode" id="postalcode" required>
                  </p>
                  @if ($errors->has('postalcode'))
                    <p class="help is-danger">{{$errors->first('postalcode')}}</p>
                  @endif
                </div>
              </div>
            </div>

            <div class="field">
              <label for="salary" class="label">Salary</label>
              <p class="control">
                <input class="input {{$errors->has('salary') ? 'is-danger' : ''}}" type="text" name="salary" id="salary" value="{{old('salary')}}" required>
              </p>
              @if ($errors->has('salary'))
                <p class="help is-danger">{{$errors->first('salary')}}</p>
              @endif
            </div>

          <button class="button is-primary is-pulled-right" style="height: 25px;">         Save</button>
          </form>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->

    </div>
  </div>

@endsection
