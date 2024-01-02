@extends('layouts.app')

@section('title', 'Edit Schedule')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Schedule</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Schedules</a></div>
                    <div class="breadcrumb-item">Edit Schedule</div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('schedule.update', $schedule) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Schedule</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text"
                                    class="form-control @error('subject_id')
                                    is-invalid
                                @enderror"
                                    name="subject_id">
                                @error('subject_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Day</label>
                                <select class="form-control @error('hari') is-invalid @enderror" name = "hari">
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                                @error('hari')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Start Time</label>
                                <input type="text" class="form-control" @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="00:00">
                                @error('jam_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>End Time</label>
                                <input type="text" class="form-control" @error('jam_selesai') is-invalid @enderror" name="jam_selesai" value="00.00">
                                @error('jam_selesai')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group mb-0">
                                <label>Room</label>
                                <input type="text" class="form-control" @error('ruangan') is-invalid @enderror" name="ruangan" value="A0">
                                @error('ruangan')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
