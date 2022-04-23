<?php
$sayfa="Ürünler";
include('inc/ahead.php');

if($_POST){ //veri güncelle

    $aktif=0;
    if(isset($_POST["aktif"])) $aktif=1;
    
    $hata='';
    
    if($_POST["baslik"] !='' && $_POST["client"] !='' && $_POST["date"] !='' && $_POST["category"] !='' && $_POST["aciklama"] !='' && $_POST["icerik"] !='' && $_POST["sira"] !='' && $_FILES["kfoto"]['name'] !=''){
        if($_FILES['kfoto']['error'] != 0){
            $hata.='Dosya yüklenirken hata oluştu.';
        }
        else{
            copy($_FILES['kfoto']['tmp_name'],'../assets/img/logos/'.strtolower($_FILES["kfoto"]['name']));
            $ekleSorgu=$baglanti->prepare('insert into portfolyolar set kfoto=:kfoto, baslik=:baslik, client=:client, date=:date, category=:category, aciklama=:aciklama, icerik=:icerik, sira=:sira, aktif=:aktif');
            $ekle=$ekleSorgu->execute([
                'kfoto'=>strtolower($_FILES["kfoto"]['name']),
                'baslik'=>$_POST['baslik'],
                'client'=>$_POST['client'],
                'date'=>$_POST['date'],
                'category'=>$_POST['category'],
                'aciklama'=>$_POST['aciklama'],
                'icerik'=>$_POST['icerik'],
                'sira'=>$_POST['sira'],
                'aktif'=>$aktif
            ]);
    
            if($ekle){
                echo' <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>'; 
                echo "<script> Swal.fire( {title:'Başarılı', text:'Ekleme Başarılı', icon:'success', confirmButtonText:'Kapat' }).then((value)=>{
                    if(value.isConfirmed){window.location.href='aportfolyo.php'}})</script>";
            }
        }
    
        if($hata!=''){
            echo' <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>'; 
            echo "<script> Swal.fire( {title:'Hata', text:'$hata', icon:'error', confirmButtonText:'Kapat' })</script>";
    }
    }


}
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ürün Ekle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Ürün Ekle</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Küçük Foto</label>
                                        <input type="file" name="kfoto" required class="form-control-file">
                                    </div>                              
                                    <div class="form-group">
                                        <label>Başlık</label>
                                        <input type="text" name="baslik" required class="form-control" value="<?= @$_POST["baslik"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanım</label>
                                        <input type="text" name="client" required class="form-control" value="<?= @$_POST["client"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tarih</label>
                                        <input type="text" name="date" required class="form-control" value="<?= @$_POST["date"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Fiyat</label>
                                        <input type="text" name="category" required class="form-control" value="<?= @$_POST["category"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Açıklama</label>
                                        <input type="text" name="aciklama" required class="form-control" value="<?= @$_POST["aciklama"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>İçerik</label>
                                        <input type="text" name="icerik" required class="form-control" value="<?= @$_POST["icerik"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Sıra</label>
                                        <input type="text" name="sira" required class="form-control" value="<?= @$_POST["sira"]?>">
                                    </div>
                                    <div class="form-group form-check">
                                        <label><input type="checkbox" name="aktif" class="form-check-input">Aktif mi?</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Ekle" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include('inc/afooter.php');
?>