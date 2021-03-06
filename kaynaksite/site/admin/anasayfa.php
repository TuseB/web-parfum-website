<?php
$sayfa="Ana Sayfa";
include('inc/ahead.php');
$sorgu=$baglanti->prepare("select * from anasayfa");
$sorgu->execute();
$sonuc=$sorgu->fetch();
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ana Sayfa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Ana Sayfa</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            
                            </div>
                            <div class="card-body">
                                <table id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Üst Başlık</th>
                                            <th>Alt Başlık</th>
                                            <th>Link Metin</th>
                                            <th>Link</th>
                                            <th>Tanımlama</th>
                                            <th>Anahtar</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
                                            <td><?=$sonuc["ustBaslik"]?></td>
                                            <td><?=$sonuc["altBaslik"]?></td>
                                            <td><?=$sonuc["linkMetin"]?></td>
                                            <td><?=$sonuc["link"]?></td>
                                            <td><?=$sonuc["tanimlama"]?></td>
                                            <td><?=$sonuc["keyy"]?></td>
                                            <td class="text-center"><a href="anasayfaGuncelle.php?id=<?=$sonuc["id"]?>">
                                                <span class="fa fa-edit fa-2x"></span>
                                                </a></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include('inc/afooter.php');
?>