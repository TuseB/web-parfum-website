<?php
$sayfa="Kullanıcılar";
include('inc/ahead.php');
$sorgu=$baglanti->prepare("select * from kullanici where id=:id");
$sorgu->execute(['id'=>$_GET['id']]);
$sonuc=$sorgu->fetch();
if($_POST){ //veri güncelle

$aktif=0;
if(isset($_POST["aktif"])) $aktif=1;

if($_POST["kadi"] !='' && $_POST["email"] !='' && $_POST["yetki"] !=''){
        $ekleSorgu=$baglanti->prepare('update kullanici set kadi=:kadi, email=:email, yetki=:yetki, aktif=:aktif where id=:id');
        $ekle=$ekleSorgu->execute([
            'kadi'=>$_POST['kadi'],
            'email'=>$_POST['email'],
            'yetki'=>$_POST['yetki'],
            'aktif'=>$aktif,
            'id'=>$_GET['id']
        ]);

        if($ekle){
            echo' <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>'; 
            echo "<script> Swal.fire( {title:'Başarılı', text:'Güncelleme Başarılı', icon:'success', confirmButtonText:'Kapat' }).then((value)=>{
                if(value.isConfirmed){window.location.href='kullanici.php'}})</script>";
        }
        else{
            echo' <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>'; 
            echo "<script> Swal.fire( {title:'Hata', text:'Güncelleme Başarısız', icon:'error', confirmButtonText:'Kapat' })</script>";
    }
    }

}
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kullanıcı Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Kullanıcı Güncelle</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Kullanıcı Adı</label>
                                        <input type="text" name="kadi" required class="form-control" value="<?= $sonuc["kadi"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" required class="form-control" value="<?= $sonuc["email"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Yetki</label> <br>
                                        <label><input type="radio" name="yetki" value="1" <?= $sonuc['yetki']=='1'?'checked':'' ?>>Admin</label> <br>
                                        <label><input type="radio" name="yetki" value="2" <?= $sonuc['yetki']=='2'?'checked':'' ?>>Normal Kullanıcı</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <label>
                                        <input type="checkbox" name="aktif" <?= $sonuc['aktif']=='1'?'checked':'' ?> class="form-check-input"> Aktif mi?</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Güncelle" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include('inc/afooter.php');
?>