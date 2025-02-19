@extends('dashboard')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{ route('posts.create') }}" class="btn btn-md btn-success
                        mb-3">TAMBAH MAHASISWA</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">FOTO</th>
                                <th scope="col">NIM</th>
                                <th scope="col">NAMA MAHASISWA</th>
                                <th scope="col">ACT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('storage/public/posts/'. $post->foto_mahasiswa )}}"
                                        class="rounded-circle" style="width: 80px; height: 85px">
                                </td>
                                <td>{{ $post->nim }}</td>
                                <td>{{ $post->nama_mahasiswa }}</td>
                                <td align="text-center">
                                    <!-- <a id="edit" data-toggel="mo" href=""></a> -->
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('posts.download') }}" class="btn btn-sm btn-primary">PDF</a>
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        <!-- <a href=""><button  class="btn btn-default btn-xs"><i class="fa fa-print"></i>Cetak</button></a> -->
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data Mahasiswa belum Tersedia. </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
                <!-- Footer Start -->
                @include('components.footer')
                <!-- Footer End -->
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="/ / cdnjs.cloudflare.com / ajax / libs / toastr.js / latest / toastr.min.js ">
</script>