<?php
$loaidb=new loaidb();
$listallloai= $loaidb->getallloai();


?> 

<?php foreach($listallloai as $loai) {?>
    <div class="hero__categories">
        <div class="hero__categories__all">
            <span><?php echo $loai->gettenloai() ?></span>
        </div>
        <ul class="sub-categories">
            <?php $hangdb = new hangdb();
            $listloai2 = $hangdb->gethangbyloai($loai->getidloai());
            foreach ($listloai2 as $loai2) { ?>
                <li>
                    <a href="shop.php?idloai=<?php echo $loai->getidloai() ?>&idhang=<?php echo $loai2['idhang'] ?>"><?php echo $loai2['tenhang']?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } ?>


