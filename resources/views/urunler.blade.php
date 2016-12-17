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
            <?php
            if ($_POST){//Post ile formdan değerler geldiyse
                $ad=$_POST["ad"];
                $soyad=$_POST["soyad"];
                $e_posta=$_POST["e_posta"];
                $kontrol=mysql_query("insert into deneme (ad,soyad,e_posta) values ('$ad','$soyad','$e_posta')");
                if ($kontrol){//Sorgu başarılı bir şekilde çalıştırıldıysa
            	    echo "Kayıt Başarılı";
                }
                else{
            	    echo "Kayıt Esnasında Bir Sorun Oluştu!";
                }
            }else{//Sayfa ilk defa açılıyorsa
            ?>
            	<form name="form1" method="post" action="index.php?sayfa=ekle">
            		Adı:<input type="text" name="ad"/><br/>
            		Soyadı:<input type="text" name="soyad"/><br/>
            		E-Posta:<input type="text" name="e_posta"/><br/>
            		<input type="submit" name="gonder" value="Kaydet"/>
            	</form>
            <?php
            }
            ?>
            <h1>Php-Mysql Veritabanı İşlemleri</h1>
            	<div id="menu">
            		<a href="index.php">Ana Sayfa</a>
            		<a href="index.php?sayfa=ekle">Kayıt Ekle</a>
            		<a href="index.php?sayfa=sil">Sil</a>
            		<a href="index.php?sayfa=duzenle">Düzenle</a>
            		<a href="index.php?sayfa=listele">Listele</a>
            		<a href="index.php?sayfa=arama">Arama</a>
            	</div>
            	<div id="icerik">
            	<?php
            	include("baglanti.php");
            	$sayfa=@$_GET["sayfa"];
            	switch($sayfa){
            		case "ekle";
            			include("ekle.php");
            		break;
            		case "sil";
            			include("sil.php");
            		break;
            		case "duzenle";
            			include("duzenle.php");
            		break;
            		case "listele";
            			include("listele.php");
            		break;
            		case "guncelle";
            			include("guncelle.php");
            		break;
            		case "arama";
            			include("arama.php");
            		break;
            		default;
            			include("anasayfa.php");
            		break;

            	}
            	?>
            	</div>
        </div>
        </div>
    </div>


@endsection