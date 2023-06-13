@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
@include('layanan_surat.kbaik')
<div class="content-wrapper">
    <div class="content-header">
<section class="content">
   <a href="/admin" class="">Dashboard</a>/
   <a href="/lanyanansurat" class="">Layanan Surat</a>/
   <a href="/kbaik" class="">Arsib Surat skb</a>

            <head>
               <title>SURAT KELAKUAN BAIK</title>
               <!-- <table  align="center"  style="width:900px; height:900%;">
                     </table> -->
                     
                     <br>
                     
                     <table align="center">
                     <tr>
                        <td><img src="img/del.jpg" alt="" style="width:100px; height:100px;"></td>
                        <td>
                              <font size="5">PEMERINTAH KABUPATEN TOLIKARA</font><br>
                              <font size="5"><b>DINAS KOMUNIKASI DAN INFORMASI</b></font><br>
                              <font size="2"><i>Jln.Trans.Papua No.01 wenam telp.083782642</i></font><br>
                        </td>
                  </tr>
                  </table>
                  <hr style="height:3px;border-width:0;color:gray;background-color:gray">
                  <td colspan="2"><b> <font size="4"><center> SURAT KETERAGAN KELAKUAN BAIK</center></font></b><hr style="width:400px;"></td>
                  <table>  
                     <tr>
                        <td colspan="2"></td> 
                        </tr>
                        <tr>
                     <td><hr></td>
                  </tr>
               </table>

               <table align="center"  width="900">
                     <tr>
                        <td >Nama</td>
                        <td > :</td>
                        <td width="1000"><b>{{$item->nama}}</b></td>
                     </tr>
                     <tr>
                        <td>Jenis Kelamin</td>
                        <td > :</td>
                        <td width="1000">Perempuan</td>
                     </tr>
                     <tr>
                        <td>Pendidikan Terakhir</td>
                        <td > :</td>
                        <td width="1000">S1</td>
                     </tr>
                     <tr>
                        <td>Status Perkawinan</td>
                        <td > :</td>
                        <td width="1000">Belum </td>
                     </tr>
                     <tr>
                        <td>Pekerjaan</td>
                        <td > :</td>
                        <td width="1000">Staff Desa</td>
                     </tr>
                     <tr>
                        <td>RT/RW</td>
                        <td > :</td>
                        <td width="1000">01/09</td>
                     </tr>
                     <tr>
                        <td>No. KTP</td>
                        <td > :</td>
                        <td width="1000">19902327462</td>
                     </tr>
                     <tr>
                        <td height="9" colspan="3"></td>
                     </tr>
                     <tr>
                        <td colspan="3"style="line-height:2;" >Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur necessitatibus nemo sequi possimus <br> labore laboriosam mollitia aperiam nobis fuga!
                                 Soluta voluptatibus, aliquid rem qui earum doloremque est <br> corrupti odio cum?
                              Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, ea dolore quia non <br> necessitatibus atque ipsam nemo, 
                              beatae omnis ex distinctio cum placeat voluptatibus rem, facilis modi <br> numquam. Voluptate, atque?</td>
                     </tr>
               </table>

               <br>
               
            </head>
            <body>
           
            <table align="center">
                  <tr >
                     <td width="100" >CAMAT</td>
                     <td width="100" ></td>
                     <td width="100" ></td>
                     <td width="100" ></td>
                     <td width="100" >KEPALA DESA</td>
                  </tr>
                  <tr>
                     <td  height="70"></td>
                  </tr>
                  <tr>
                     <td>............................</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>............................</td>
                  </tr>
               </table>

@include('layouts.footer')

