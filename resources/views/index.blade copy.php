@extends('layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Password</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($people as $person)
        <tr>
            <td>{{$person->id}}</td>
            <td>{{$person->name}}</td>
            <td>{{$person->email}}</td>
            <td>{{$person->phone}}</td>
            <td>{{$person->password}}</td>
            <td class="text-center">
                <a href="{{ route('people.edit', $person->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('people.destroy', $person->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

