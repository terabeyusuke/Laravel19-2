@extends('layouts.front')

@section('content')
  <table class="teble table-dark">
    <thead>
      <tr>
        <th width="10%">ID</th>
        <th width="20%">名前</th>
        <th width="20%">趣味</th>
        <th width="10%">性別</th>
        <th width="40%">自己紹介</th>
      </th>
    </thead>
    <tbody>

      @foreach($profiels as $profiel)
    <tr>
        <th>{{ $profiel->id }}</th>
        <td>{{ str_limit($profiel->name, 100) }}</td>
        <td>{{ str_limit($profiel->hobby, 250) }}</td>
        <td>{{ str_limit($profiel->gender, 250) }}</td>
        <td>{{ str_limit($profiel->introduction, 250) }}</td>
        <td>

        </td>
    </tr>
      @endforeach
      @endsection
    </tbody>
  </table>    
