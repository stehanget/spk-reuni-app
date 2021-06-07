@extends('layouts.app')

@section('title', 'Dashboard - ReKu')

@section('content')
  <div class="row justify-content-center mt-5">
    <div class="col-md-10">
      <form action="/" method="POST">
        @csrf
        <div class="row mb-3">
          <div class="col-md-4">
            <div class="form-group">
              <label for="major" class="form-label d-block">Jurusan</label>
              <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="major">
                <option selected value="0">Semua</option>
                @foreach ($majors as $major)
                  <option value="{{ $major->id }}" data-tokens="{{ $major->title }}">{{ $major->title }}</option>                    
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="university" class="form-label d-block">Universitas</label>
              <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="university">
                <option selected value="0">Semua</option>
                @foreach ($universities as $university)
                  <option value="{{ $university->id }}" data-tokens="{{ $university->title }}">{{ $university->title }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="category" class="form-label d-block">Kategori</label>
              <select class="selectpicker" name="category">
                <option selected value="0">Semua</option>
                <option value="1">Negeri</option>
                <option value="2">Swasta</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-4">
            <div class="form-group">
              <label for="entryFee" class="form-label d-block">Biaya Masuk</label>
              <select class="selectpicker" name="entryFee">
                <option selected value="0">Semua</option>
                <option value="1">1.000.000 - 3.000.000</option>
                <option value="2">3.000.000 - 5.000.000</option>
                <option value="3">5.000.000 - 7.000.000</option>
                <option value="4">7.000.000 - 10.000.000</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="location" class="form-label d-block">Lokasi</label>
              <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="location">
                <option selected value="0">Semua</option>
                @foreach ($locations as $location)
                  <option value="{{ $location->id }}" data-tokens="{{ $location->city }}">{{ $location->city }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
          <button type="submit" class="btn btn-dark px-3">Temukan</button>
        </div>
      </form>
    </div>
  </div>
@endsection