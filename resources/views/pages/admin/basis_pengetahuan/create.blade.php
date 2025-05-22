@extends('layouts.app-vertical')

@section('page-title')
  <x-page-title-vertical :title="'Basis Pengetahuan'" :btnBack="false" :redirect="'/basis-pengetahuan'"></x-page-title-vertical>
@endsection

@section('content')
    <x-slot name="header">Tambah Basis Pengetahuan</x-slot>

    <form action="{{ route('basis-pengetahuan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Gejala</label>
            <select name="gejala_id" class="form-control" required>
                <option value="">-- Pilih Gejala --</option>
                @foreach($gejalas as $gejala)
                    <option value="{{ $gejala->id }}">{{ $gejala->kode }} - {{ $gejala->nama_gejala }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Kerusakan</label>
            <select name="kerusakan_id" class="form-control" required>
                <option value="">-- Pilih Kerusakan --</option>
                @foreach($kerusakans as $kerusakan)
                    <option value="{{ $kerusakan->id }}">{{ $kerusakan->kode }} - {{ $kerusakan->nama_kerusakan }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>CF Pakar</label>
            <input type="number" step="0.01" max="1" min="0" name="cf_pakar" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection


