<?php
$sayfa="Ürünler";
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
                                <a href="portfolyoEkle.php" class="btn btn-primary">Ürün Ekle</a>
                            
                            </div>
                            <div class="card-body">
                                <table id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Küçük Foto</th>
                                            <th>Başlık</th>
                                            <th>Tanım</th>
                                            <th>Tarih</th>
                                            <th>Fiyat</th>
                                            <th>Açıklama</th>
                                            <th>İçerik</th>
                                            <th>Sıra</th>
                                            <th>Aktif</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                    <?php
                                    $sorgu=$baglanti->prepare("select * from portfolyolar");
                                    $sorgu->execute();
                                    while($sonuc=$sorgu->fetch())
                                    {
                                    ?>
                                        <tr>
                                            <td><?=$sonuc["id"]?></td>
                                            <td><img width="50" src="../assets/img/portfolio/<?=$sonuc["kfoto"]?>" alt=""></td>
                                            <td><?=$sonuc["baslik"]?></td>
                                            <td><?=$sonuc["client"]?></td>
                                            <td><?=$sonuc["date"]?></td>
                                            <td><?=$sonuc["category"]?></td>
                                            <td><?=$sonuc["aciklama"]?></td>
                                            <td><?=$sonuc["icerik"]?></td>
                                            <td><?=$sonuc["sira"]?></td>
                                            <td><span class="fa fa-2x fa-<?= $sonuc["aktif"]=="1" ?"check text-success":"times text-danger" ?>"></span></td>
                                            <td><a href="portfolyoGuncelle.php?id=<?=$sonuc["id"]?>">
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
<img width="50" src="../assets/img/portfolio/<?=$sonuc["kfoto"]?>" alt="">
Silmek istediğinizden emin misiniz?
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
<a href="sil.php?id=<?=$sonuc["id"] ?>&tablo=portfolyolar" class="btn btn-danger">Sil</a>
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