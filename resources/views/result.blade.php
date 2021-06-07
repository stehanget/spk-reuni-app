@extends('layouts.app')

@section('title', 'Result - ReKu')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-12">
      <a href="{{ route('index') }}" class="btn btn-danger mb-3">Kembali</a>
      <table class="table table-light table-hover">
        <thead>
          <tr class="text-center">
            <th>Rank</th>
            <th>Jurusan</th>
            <th>Akreditasi</th>
            <th>Universitas</th>
            <th>kategori</th>
            <th>Biaya Masuk</th>
            <th>Lokasi</th>
            <th>Taraf Hidup</th>
            <th>Score</th>
          </tr>
        </thead>
        <tbody>
          @if ($alternatives->isEmpty())
            <tr>
              <td colspan="9" class="text-center">Data Tidak Ditemukan</td>
            </tr>
          @endif
          @foreach ($alternatives as $alternative)
          <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $alternative->major->title }}</td>
            <td class="text-center">
              @if ($alternative->accreditation >= 0 && $alternative->accreditation <= 24)
                D
              @elseif ($alternative->accreditation >= 25 && $alternative->accreditation <= 49)
                C
              @elseif ($alternative->accreditation >= 50 && $alternative->accreditation <= 74)
                B
              @else
                A
              @endif
            </td>
            <td>{{ $alternative->university->title }}</td>
            <td>{{ $alternative->university->category }}</td>
            <td>Rp. {{ $alternative->entry_fee }}</td>
            <td>{{ $alternative->university->location->city.', '.$alternative->university->location->province }}</td>
            <td>Rp. {{ $alternative->university->location->standard_of_living }}</td>
            <td>{{ $alternative->score }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>     
    </div>
  </div>
@endsection