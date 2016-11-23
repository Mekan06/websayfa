@extends('layouts.ciftci')
@section('icerik')
    <div class="container">
        <div class="row">
        <div class="col-md-12 alert alert-info">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <form method="post" action="{{ URL::to('iletisim') }}">
            {{ csrf_field() }}
            <input type="text" name="ad" class="form-control" placeholder="Adınız"  />
            <input type="text" name="mail" class="form-control" placeholder="Mail Adresiniz" />
            <input type="text" name="konu" class="form-control" placeholder="Konu" />
            <textarea class="form-control" name="mesaj" placeholder="mesajınız"></textarea>
            <input  class="btn btn-success" type="submit" value="Gönder" />

            </form>
        </div>
        </div>
    </div>

@endsection