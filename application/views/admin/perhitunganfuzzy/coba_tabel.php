<table id="datatable" class="table table-striped table-bordered">
                    
                    <thead>
                     <th>No</th>
                     <th>Kecamatan</th>
                     <th>Kemiskinan</th>
                     <th>Ketelantaran</th>
                     <th>Kecacatan</th>
                     <th>Hasil Fuzzy</th>
                     <th>Aksi</th>
                     <th>Aksi</th>
                     <th>Aksi</th>
                     <th>Aksi</th>
                    </thead>
            
                    <tbody>
                                  <?php $no=1;
                                //->result()
                              //  if ($pecah->num_rows()>0) {
                                $sum=0;
                                  foreach ($pecah as $f) : ?>
                                    <tr>
                                      <td><?php echo $no++ ?></td>
                                      <td><?php echo $f->nama_kecamatan ?></td>
                                      <td><?php echo $f->kemiskinan ?></td> 
                                      <td><?php echo $f->ketelantaran ?></td>
                                      <td><?php echo $f->kecacatan ?></td>
                                      <td><?php echo $f->hasil_kemiskinan ?></td>

                                      <!-- <td>php echo $f->nama_variabel ?></td>
                                      <td>php echo $f->nama ?></td>
                                      <td>php echo $f->variabel_id ?></td>
                                      <td>php echo $f->sub_id ?></td>
                                      <td>php echo $f->sub_variabel_id ?></td> -->
                                    </tr>

                                    <?php  $sum += $f->kemiskinan;
                                    endforeach; 
                                    
                               // }return false; ?>
                                  
                                    </tbody>
                                </table>
<br>
<br>
<br>
                                <td><?php echo $sum ?></td>