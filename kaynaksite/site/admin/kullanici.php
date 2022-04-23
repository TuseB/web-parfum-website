<?php
$sayfa="Kullanıcılar";
include('inc/ahead.php');
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?= $sayfa ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active"><?= $sayfa ?></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="kullaniciEkle.php" class="btn btn-primary">Kullanıcı Ekle</a>
                            
                            </div>
                            <div class="card-body">
                                <table id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kullanıcı Adı</th>
                                            <th>Yetki</th>
                                            <th>Email</th>
                                            <th>Aktif</th>
                                            <th>Parola<br>Güncelle</th>
                                            <th>Güncelle</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        $sorgu=$baglanti->prepare("select * from kullanici");
                                        $sorgu->execute();
                                        while($sonuc=$sorgu->fetch())
                                        {
                                        ?>
                                        <tr>
                                            <td><?=$sonuc["kadi"]?></td>
                                            <td><?=$sonuc["yetki"]==1?'Admin':'Normal Kullanıcı' ?></td>
                                            <td><?=$sonuc["email"]?></td>
                                            <td><span class="fa fa-2x fa-<?= $sonuc["aktif"]=="1" ?"check text-success":"times text-danger" ?>"></span></td>
                                            <td><a href="kullaniciParolaGuncelle.php?id=<?=$sonuc["id"]?>">
                                                <span class="fa fa-key fa-2x"></span>
                                                </a></td>
                                                <td><a href="kullaniciGuncelle.php?id=<?=$sonuc["id"]?>">
                                                <span class="fa fa-edit fa-2x"></span>
                                                </a></td>
                                            <td class="text-center">
                                
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#silModal<?=$sonuc["id"]?>"><span class="fa fa-trash fa-2x text-danger"></span></a>
                                                    <!-- Modal -->
<div class="modal fade" id="silModal<?=$sonuc["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Silmek istediğinizden emin misiniz?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
        <a href="sil.php?id=<?=$sonuc["id"] ?>&tablo=kullanici" class="btn btn-danger">Sil</a>
      </div>
    </div>
  </div>
</div>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include('inc/afooter.php');
?>