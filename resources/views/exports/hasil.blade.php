<table>
    <thead>
        <tr style="border: 1px solid #000000;">
            <th style="width: 50px; background-color: #5db9e3; border: 1px solid #000000;">NIM</th>
            <th style="width: 50px; background-color: #5db9e3; border: 1px solid #000000;">Nama</th>
            <th style="width: 50px; background-color: #5db9e3; border: 1px solid #000000;">No telp</th>
            <th style="width: 50px; background-color: #5db9e3; border: 1px solid #000000;">Alamat</th>
            <th style="width: 50px; background-color: #5db9e3; border: 1px solid #000000;">Karakter</th>
        </tr>
    </thead>

    @foreach($hasil as $keg)
    <tbody>
        <tr style="border: 1px solid #000000;">
            <td style="border: 1px solid #000000;width: 15px;">{{$keg->NIM}}</td>
            <td style="border: 1px solid #000000;width: 20px;text-align: center;">{{$keg->NM_MHS}}</td>
            <td style="border: 1px solid #000000;width: 15px;">{{$keg->NO_TELP}}</td>
            <td style="border: 1px solid #000000;width: 30px;">{{$keg->ALAMAT}}</td>
            <?php 
                $kat = DB::SELECT("select S1, count(S1) as jum from jawab where NIM = '$keg->NIM' and S1 NOT LIKE '-' group by S1 order by count(S1) DESC limit 1");
                foreach($kat as $kat){
            ?>
            <td style="border: 1px solid #000000;width: 10px;text-align: center;">{{$kat->S1}}</td>
        <?php } ?>
        </tr>
    </tbody>
    @endforeach    
</table>