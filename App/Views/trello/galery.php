 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

     <!-- Main content -->
     <section class="content mt-4">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12">
                     <div class="card card-primary">
                         <div class="card-header">
                             <h4 class="card-title">Картинки использованние в задачах</h4>
                         </div>
                         <div class="card-body">

                             <div>
                                 <div class="filter-container p-0 row">

                                     <?php

                                        foreach ($models as $images) { ?>
                                         <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                             <a href="<?= $images->image ?>" data-toggle="lightbox" data-title="sample 1 - white">
                                                 <img src="<?= $images->image?>" style="height:130px; width:200px;  border-radius:10px" class="img-fluid mb-2" alt="white sample" />
                                             </a>
                                             <p class="text-center" style="font-family:Georgia, 'Times New Roman', Times, serif"><?=$images->id?></p>
                                         </div>
                                     <?php }

                                        ?>



                                 </div>
                             </div>

                         </div>
                     </div>
                 </div>

             </div>
         </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->