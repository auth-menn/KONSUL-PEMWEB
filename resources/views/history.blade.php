@extends('layout')

@section('content')
    <div class="container">
        <div class="mt-5 mb-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Pasien</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Dokter</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointment as $row)
                        <tr>
                            <th scope="row">{{ $row->id }}</th>
                            <td>{{ $row->user }}</td>
                            <td>{{ $row->hari }}</td>
                            <td>{{ $row->jam }}</td>
                            <td>{{ $row->dokter }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                @if ($row->status == 'Aproved')
                                <form action="{{ route('appointment.submitTestimonial', $row->id) }}" method="POST">
                                        @csrf
                                        <textarea name="testimonial" class="form-control"></textarea>
                                        <button type="submit" class="btn btn-primary">Submit Testimonial</button>
                                       
                                    </form>
                                @endif
                                
                            </td>
                        </tr>
                       
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
