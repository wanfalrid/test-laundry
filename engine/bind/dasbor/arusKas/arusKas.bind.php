<div id='divDataTransaksi'>
    <div style='margin-bottom:15px;'>
    </div>
   
    <table id='tblArusKas' class='table table-hover'>
        <thead>
            <tr>
                <th>Kd Transaksi</th>
                <th>Waktu</th>
                <th>Asal</th>
                <th>Arus</th>
                <th>Total</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $saldoAwal = $data['saldo'];
            $saldoTemp = $saldoAwal;
                foreach($data['arusKas'] as $as) : 
                    $kdTransaksi    = $as['kd_tracking'];
                    $asal           = $as['asal'];
                    $total          = $as['jumlah'];
                    if($asal == 'pembayaran_cucian'){
                        $asalCap = "Pembayaran cucian";
                    }else{
                        $asalCap = "Pengeluaran laundry";
                    }
                    $arus = $as['arus'];
                    if($arus == 'masuk'){
                        $saldoTemp = $saldoTemp + $total;
                    }else{
                        $saldoTemp = $saldoTemp - $total;
                    }
                    
                    $waktu = $as['waktu'];
            ?>
            <tr>
                <td><?=$kdTransaksi; ?></td>
                <td><?=$waktu; ?></td>
                <td><?=$asalCap; ?></td>
                <td><?=$arus; ?></td>
                <td>Rp. <?=number_format($total); ?></td>
                <td>Rp. <?=number_format($saldoTemp); ?></td>
            </tr>
            <?php 
                endforeach;
            ?>
            <!-- href='dataTransaksi/cetak/ -->
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Saldo awal</td>
                <td>Rp. <?=number_format($saldoAwal); ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/arusKas.js"></script>