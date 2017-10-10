@extends('app')

@section('content')

  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
        <div class="card-content">
         <h2><center><a href="/add_info">Add Information </a> | <a href="/list">Listing Page </a></center></h2>

          <table class="table is-narrow">
            <thead>
              <tr>
                <th>Name</th>
                <th>Province</th>
                <th>Telephone</th>
                <th>Postalcode</th>
                <th>Salary</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($user as $usr)
                <tr>
                  <th>{{$usr->name}}</th>
                  @foreach ($province as $object)
                    <td>{{$object->province_name}}</td>

                  @endforeach

                  <td>{{$usr->telephone}}</td>
                  <td>{{$usr->postalcode}}</td>
                  <td>{{$usr->salary}}</td>
                  <td class="has-text-right">
                    <a class="button is-outlined m-r-5" href="/show/{{ $usr->id }}">View</a>
                    <a class="button is-light" href="/edit/{{ $usr->id }}">Edit</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $user->links() }}

         </div>
         </div>
         </div>
         </div>
@endsection